<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Utilisateur;
use App\Ville;
use App\Actualite;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        
        // store old
        $request->flash();

        // get image fond
        $actualite = Actualite::where('is_accueil', 1)->first();




        if (Auth::check()) {


            $idVille = Input::get('ville_id');
            if ($idVille == null) {
                $idVille = Input::get('cp_id');
            }
            if ($idVille == null) {
                $idVille = Input::get('etablissement_id');
            }
            $idUtilisateur = Input::get('membre_id');

            if ($idUtilisateur != null) {
                // get all the nerds
                $utilisateurs = Utilisateur::where('id', $idUtilisateur)->get();
            } elseif ($idVille != null){
                    $utilisateurs = Utilisateur::where('ville_id', $idVille)->get();
                
            } else {

                $utilisateurs = Utilisateur::all();

            }

            // load the view and pass the nerds
            return view('site.index')
                ->with('utilisateurs', $utilisateurs)
                ->with('actualite', $actualite);
        } else {

            // ville to get
            
            $idVille = Input::get('ville_id');
            if ($idVille == null) {
                $idVille = Input::get('cp_id');
            }
            if ($idVille == null) {
                $idVille = Input::get('etablissement_id');
            }


            // Search by ville_id
            if ($idVille != null) {
                $villeAccueils = Ville::whereHas('utilisateurs', function($q){
                    $q->where('is_accueilleur', '>=', 'true');
                })
                ->where('ville.id', $idVille)
                ->orderBy(DB::raw('photo is null asc, nom'))
                ->get();
            } else {
                $villeAccueils = Ville::whereHas('utilisateurs', function($q){
                    $q->where('is_accueilleur', '>=', 'true');
                })
                ->orderBy(DB::raw('photo is null asc, nom'))
                ->get();
            }
            

            // load the view and pass the nerds
            return view('site.index')
                ->with('villeAccueils', $villeAccueils)
                ->with('actualite', $actualite);

        }

    }

    public function autocompleteVille(){
        $term = Input::get('phrase');
        
        $results = array();
        
        $villes = DB::table('ville')->select('id', 'nom as name')
            ->whereRaw('upper(nom) like "%'. strtoupper(trim($term)) .'%"')
            ->orderBy('nom', 'asc')
            ->get();

        return response()->json($villes->toArray());
    }

    public function autocompleteVilleAccueil(){


        $term = Input::get('phrase');
        
        $results = array();


        $villes = DB::table('ville')
                ->join('utilisateur', function ($join) {
                    $join->on('utilisateur.ville_id', '=', 'ville.id')
                    ->whereRaw('upper(ville.nom) like "%'. strtoupper(trim(Input::get('phrase'))) .'%"');
                })
                ->select('ville.id as id', 'ville.nom as name')
                ->distinct()
                ->orderBy('ville.nom', 'asc')
                ->get();


        return response()->json($villes->toArray());
    }


    
    public function autocompleteCodePostalAccueil(){


        $term = Input::get('phrase');
        
        $results = array();


        $villes = DB::table('ville')
                ->join('utilisateur', function ($join) {
                    $join->on('utilisateur.ville_id', '=', 'ville.id')
                    ->whereRaw('upper(ville.code_postal) like "%'. strtoupper(trim(Input::get('phrase'))) .'%"');
                })
                ->select('ville.id as id', DB::raw('concat(ville.code_postal, " - ", ville.nom) as name'))                
                ->distinct()
                ->orderBy('name', 'asc')
                ->get();


        return response()->json($villes->toArray());
    }



    public function autocompleteEtablissementAccueil(){


        $term = Input::get('phrase');
        
        $results = array();


        $villes = DB::table('ville')
                ->join('utilisateur', function ($join) {
                    $join->on('utilisateur.ville_id', '=', 'ville.id');
                })
                ->join('etablissement', function ($join) {
                    $join->on('etablissement.cp', '=', 'ville.code_postal')
                    ->whereRaw('upper(etablissement.nom) like "%'. strtoupper(trim(Input::get('phrase'))) .'%"');
                })
                ->select('ville.id as id', DB::raw('concat(ville.nom, " - ", etablissement.nom) as name'))
                ->distinct()
                ->orderBy('name', 'asc')
                ->get();


        return response()->json($villes->toArray());
    }

    public function autocompleteMembreAccueil(){


        $term = Input::get('phrase');
        
        $results = array();


        $utilisateur = DB::table('utilisateur')                
                ->whereRaw('is_accueilleur=1 and (upper(utilisateur.nom) like "%'. strtoupper(trim(Input::get('phrase'))) .'%" or upper(utilisateur.prenom) like "%'. strtoupper(trim(Input::get('phrase'))) .'%")')
                ->select('utilisateur.id as id', DB::raw('concat(utilisateur.nom, " ", utilisateur.prenom) as name'))
                ->distinct()
                ->orderBy('name', 'asc')
                ->get();


        return response()->json($utilisateur->toArray());
    }

}
