<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Actualite;
use App\Commentaire;


class BlogController extends Controller
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
    public function index()
    {
        $actualites = Actualite::whereRaw ('( (date_expiration is not null and date_expiration > current_date) or (date_expiration is null) )' .
            ' and ( (date_publication is not null and date_publication <= current_date) or (date_publication is null) )' )
            ->orderBy('created_at', 'desc')
            ->get();

        // Catégories
        $categories = DB::table('actualite')
                ->select('categorie', DB::raw('count(*) as nb_articles'))
                ->groupBy('categorie')
                ->get();


        // populaires
        $populaires =  Actualite::select()
            ->orderBy('nb_vues', 'asc')
            ->take(3)->get();


        return view('site.blog')
        ->with('actualites', $actualites)
        ->with('categories', $categories)
        ->with('populaires', $populaires);
    }

    public function article(Request $request)
    {
        // get article

        $id_actualite = $request['id'];
               
        $actualite = Actualite::find($id_actualite);     


        return view('site.article')
        ->with('actualite', $actualite);
    }

    public function commente(Request $request)
    {
        // store old
        $request->flash();

        $this->validate($request, [
            'contenu' => 'required'       
        ]);        

        $commentaire = Commentaire::create([
            'contenu' => $request['contenu'],
            'id_utilisateur' =>  (Auth::check())
        ]);

       return redirect()->route('profiledit', [$user]);

    }
}
