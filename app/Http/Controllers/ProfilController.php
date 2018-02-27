<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

use App\Mail\RegisterSite;
use App\Mail\RencontreSite;
use App\Mail\ContactProfilSite;
use App\Utilisateur;
use App\Rencontre;
use Mail;

class ProfilController extends Controller
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

        if (Auth::check()) {
            // The user is logged in...

            $id_utilisateur = Auth::id();
            $show = "self";            

            if($request['id'] != null && $request['id'] != $id_utilisateur) {            
                $id_utilisateur = $request['id'];
                $show = "member" ;   
               
            } 
            $utilisateur = Utilisateur::find($id_utilisateur);            

            return view('site.profil',compact('utilisateur','show'));

        } else {

            return redirect()->route('home');   
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function inscription(Request $request)
    {
        // store old
        $request->flash();

        $this->validate($request, [
            'nom' => 'required',
            'email' => 'required|string|email|max:255|unique:utilisateur',            
            'password'  => 'required'           
        ]);        

        $user = Utilisateur::create([
            'nom' => $request['nom'],
            'prenom' => $request['prenom'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'avatar' => $request['avatar'],
            'adresse' => $request['adresse'],
            'tel_fixe' => $request['tel_fixe'],
            'tel_portable' => $request['tel_portable'],
            'is_accueilleur' => $request['is_accueilleur'],
            'ville_id' => $request['ville_id']
        ]);

        // authenticate

        $content = [
            'nom'=> $request['nom'],
            'prenom'=> $request['prenom']
            ];

        $copyAddress = 'contact.lahiki@gmail.com';
        $serverAddress = 'contact@lahiki.net';
        $receiverAddress = $request['email'];

        Log::info('LAHIKI --------  sending register mail');  
        Mail::to($receiverAddress)
        ->bcc($copyAddress)        
        ->bcc($serverAddress)
        ->send(new RegisterSite($content));

        // authenticate here
        if (Auth::attempt( ['email' => $request['email'], 'password' => $request['password']])) {
            Log::info('LAHIKI --------  OK passed');  
            // Authentication passed...                       
            return redirect()->route('profiledit', [$user]);       
        } else {

            Log::info('LAHIKI --------  NOT passed');  
       
            return redirect()->route('home')
                ->withErrors('Adresse mail ou mot de passe incorrects !');
        }
       

    }


    /**
     * connect
     *
     * @return \Illuminate\Http\Response
     */
    public function connexion(Request $request)
    {

        // store old
        $request->flash();

        $this->validate($request, [
            'email' => 'required|string|email|max:255',            
            'password'  => 'required'           
        ]);  

      Log::info('LAHIKI --------  start Auth');  
       Log::info('LAHIKI --------  ' . $request['email'] . '/' . $request['password'] . '####' . bcrypt($request['password']) );  

       if (Auth::attempt( ['email' => $request['email'], 'password' => $request['password']])) {
            Log::info('LAHIKI --------  OK passed');  
            // Authentication passed...            
            return redirect()->route('home');        
       } else {

            Log::info('LAHIKI --------  NOT passed');  
       
            return redirect()->route('home')
                ->withErrors('Adresse mail ou mot de passe incorrects !');
        }      
             

        Log::info('LAHIKI --------  end');  
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function profiledit()
    {
        if (Auth::check()) {
            // The user is logged in...

            $id_utilisateur = Auth::id();
            $utilisateur = Utilisateur::find($id_utilisateur);

            return view('site.profiledit',compact('utilisateur'));
            
        } else {

            return redirect()->route('home');   
        }
    }



    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function updateprofil(Request $request)
    {
        // store old
        $request->flash();
        if (Auth::check()) {
            // The user is logged in...

            $id_utilisateur = Auth::id();
            $utilisateur = Utilisateur::find($id_utilisateur);

            if($request['profil-section'] == 'basique') {

                $this->validate($request, [
                    'nom' => 'required',
                    'email' => 'required|string|email|max:255'
                ]); 
                
                Log::info('AVATAR ' . $request['avatar']);  


                $utilisateur->update([
                    'nom' => $request['nom'],
                    'prenom' => $request['prenom'],
                    'email' => $request['email'],
                    
                    'adresse' => $request['adresse'],
                    'tel_fixe' => $request['tel_fixe'],
                    'tel_portable' => $request['tel_portable'],
                    'is_accueilleur' => $request['is_accueilleur'],
                    'ville_id' => $request['ville_id']
                ]);

                if ($request['avatar'] != null && strlen($request['avatar']) > 3 ) {
                    $utilisateur->update([
                        'avatar' => $request['avatar']                    
                    ]);
                }

            } 
            elseif ($request['profil-section'] == 'password'){

                $this->validate($request, [                          
                    'password'  => 'required'           
                ]);  

                $utilisateur->update([                    
                    'password' => bcrypt($request['password'])
                ]);
            } 
            elseif ($request['profil-section'] == 'about'){
                $utilisateur->update([                    
                    'apropos' => $request['apropos']
                ]);

            }

            return redirect()->route('profil');   

        } else {

            return redirect()->route('home');   
        }

    }
 





    /**
     * profil contact
     *
     * @return Response
     */
    public function contactprofil(Request $request)
    {
        // store old
        $request->flash();
        if (Auth::check()) {
            // The user is logged in...
           
            $fromUser = Auth::user();
            $toUser = Utilisateur::find($request['id']);


            if($fromUser != null and $toUser != null) {

                $this->validate($request, [
                    'message' => 'required'
                ]); 
                
                Log::info('CONTACT USER to USER ' . $request['id'] . '-' . Auth::id());  

                $content = [
                    'fromNom'=> $fromUser->prenom 
                        . ' ' . $fromUser->nom,
                    'toNom'=> $toUser->prenom . ' ' 
                        . $toUser->nom,
                    'message' => $request['message'],
                    'fromId' => $fromUser->id
                ];

                $copyAddress = 'contact.lahiki@gmail.com';
                $serverAddress = 'contact@lahiki.net';

                $emailsTo = [$toUser->email];
                $emailsBcc = [$serverAddress, $copyAddress, $fromUser->email];

                Log::info('LAHIKI --------  sending register mail');  
                Mail::to($emailsTo)
                ->bcc($emailsBcc)
                ->send(new ContactProfilSite($content));

               

            }             

            return redirect()->route('profil');   

        } else {

            return redirect()->route('home');   
        }

    }















    public function deconnexion()
    {
        Auth::logout();

        return redirect()->route('home');   
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function profilrencontre(Request $request)
    {
        if (Auth::check() and $request['id'] != null) {
            // The user is logged in...
            $utilisateur = Auth::user();

            // get the rencontre
            if ($request['id'] != null)
                $rencontre = Rencontre::find($request['id']);

            if ($rencontre != null and ( $rencontre->accueilli_id == $utilisateur->id or $rencontre->acceuillant_id == $utilisateur->id) ) {

                return view('site.profilrencontre')
                    ->with('utilisateur', $utilisateur)
                    ->with('rencontre', $rencontre);
            } else {

                return redirect()->route('home');       
            }
            
        } else {

            return redirect()->route('home');   
        }
    }



    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function createrencontre(Request $request)
    {
        
        
        if (Auth::check()) {
            // The user is logged in...

            $accueilli_id = Auth::id();
            $accueillant_id = $request['accueillant_id'];

            // store old
            $request->flash();

            $this->validate($request, [
                'date_rencontre' => 'required|date_format:Y-m-d',            
                'heure_rencontre' => 'required|date_format:H:i',            
                'lieu_rencontre' => 'required|string',
                'ville_text' => 'required|string'
            ]);        

            $rencontre = Rencontre::create([
                'date_rencontre' => $request['date_rencontre'] . ' ' . $request['heure_rencontre'],
                'lieu_rencontre' => $request['lieu_rencontre'],
                'ville_id' => $request['ville_id'],
                'accueilli_id' => $accueilli_id,
                'acceuillant_id' => $accueillant_id,
                'gps_x' => $request['gps_x'],
                'gps_y' => $request['gps_y']
            ]);

            // Notification

            $content = [
                'date_rencontre' => date('d/m/Y', strtotime($rencontre->date_rencontre)),
                'heure_rencontre' => $request['heure_rencontre'],
                'lieu_rencontre' => $request['lieu_rencontre'],
                'prenom_accueillant' => $rencontre->accueillant->prenom,
                'nom_accueillant' => $rencontre->accueillant->nom,
                'prenom_accueilli' => $rencontre->accueilli->prenom,
                'nom_accueilli' => $rencontre->accueilli->nom,            
                'ville_rencontre' => $request['ville_text'],
                'id_accueillant' => $rencontre->accueillant->id,
                'id_accueilli' => $rencontre->accueilli->id,
            ];

           
            $serverAddress = 'contact@lahiki.net';
            $copyAddress = 'contact.lahiki@gmail.com';
            $receiverAddress = $rencontre->accueillant->email;            
            $AccueilliAdresse = $rencontre->accueilli->email;
            $emailsTo = [$receiverAddress, $AccueilliAdresse];
            $emailsBcc = [$serverAddress, $copyAddress];

            Log::info('LAHIKI --------  sending rencontre mail');  
            Mail::to($emailsTo)   
            ->bcc($emailsBcc)
            ->send(new RencontreSite($content));

            return redirect()->route('profilrencontre', ['id' =>  $rencontre->id]);

        } else {

            return redirect()->route('home');   
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function updaterencontre(Request $request)
    {
        


        $this->validate($request, [
            'id' => 'required' ,
            'acceuillant_id' => 'required' ,
            'accueilli_id' => 'required',
            'date_rencontre' => 'required',
            'heure_rencontre' => 'required',
            'lieu_rencontre' => 'required',

            'heure_rencontre' => 'required',
            'ville_id' => 'required'                       
        ]);

        $id = $request['id'];

        $rencontre = Rencontre::find($id);
            
          
        $rencontre->update([
            'date_rencontre' => $request['date_rencontre'] . ' ' . $request['heure_rencontre'],
            'lieu_rencontre' => $request['lieu_rencontre'],
            'ville_id' => $request['ville_id'],
            'gps_x' => $rencontre->ville->gps_y,
            'gps_y' => $rencontre->ville->gps_x,
            'commentaire' => $request['commentaire'],
            'is_accueilli' => $request['is_accueilli'],
            'note' => $request['note']
        ]);

        // Notification

        $content = [
            'date_rencontre' =>  date('d/m/Y', strtotime($rencontre->date_rencontre)),
            'heure_rencontre' => $request['heure_rencontre'],
            'lieu_rencontre' => $request['lieu_rencontre'],
            'prenom_accueillant' => $rencontre->accueillant->prenom,
            'nom_accueillant' => $rencontre->accueillant->nom,
            'prenom_accueilli' => $rencontre->accueilli->prenom,
            'nom_accueilli' => $rencontre->accueilli->nom,            
            'ville_rencontre' => $request['ville_text']
        ];

       
        $serverAddress = 'contact@lahiki.net';
        $copyAddress = 'contact.lahiki@gmail.com';
        $receiverAddress = $rencontre->accueillant->email;            
        $AccueilliAdresse = $rencontre->accueilli->email;
        $emailsTo = [$receiverAddress, $AccueilliAdresse];
        $emailsBcc = [$serverAddress, $copyAddress];

        Log::info('LAHIKI --------  sending rencontre mail');  
        Mail::to($emailsTo)   
        ->bcc($emailsBcc)
        ->send(new RencontreSite($content));




        return redirect()->route('profil')
                        ->with('success','La rencontre a bien été modifiée !');
    }

}
