<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactSite;

use Illuminate\Support\Facades\Log;
use Mail;
use App\Actualite;

class ContactController extends Controller
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

        // get image fond
        $actualite = Actualite::where('is_accueil', 1)->first();
        
        return view('site.contact')
            ->with('actualite', $actualite);
    }


    public function contactsite(Request $request)
    {
        
        /**
        *public $nom;
        *public $email;
        *public $telephone;
        *public $sujet;
        *public $message;
        */
        Log::info('LAHIKI --------  start contactsite');  
        $content = [
            'nom'=> $request['nom'],
            'email'=> $request['email'],
            'telephone'=> $request['telephone'],
            'sujet'=> $request['sujet'],
            'message'=> $request['message']
            ];

        //$receiverAddress = 'contact@lahiki.net';
        $copyAddress = 'contact.lahiki@gmail.com';
        $serverAddress = 'contact@lahiki.net';
        $receiverAddress = 'larahiki.api@gmail.com';

        Log::info('LAHIKI --------  sending');  
        Mail::to($receiverAddress)
        ->bcc($copyAddress)        
        ->bcc($serverAddress)
        ->send(new ContactSite($content));

        Log::info('LAHIKI --------  end sending');  

        return redirect()->route('contact')
            ->with('message', 'Votre message a bien été envoyé !');
    }


}
