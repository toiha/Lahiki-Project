<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\SocialAccountService;
use Socialite;

use App\Mail\RegisterSite;
use Mail;





class SocialAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();   
    }   

    public function callback(SocialAccountService $service)
    {
        //$providerUser = \Socialite::driver('facebook')->user();        
        $isNewUser = false;

        $user = $service->createOrGetUser(Socialite::driver('facebook')->stateless()->user(), $isNewUser);

        if ($user != null ) {
            auth()->login($user);
           
            // authenticate
            if ($isNewUser) {

                $content = [
                    'nom'=> ' Facebook ',
                    'prenom'=> ' Membre '
                    ];

                $copyAddress = 'contact.lahiki@gmail.com';
                $serverAddress = 'contact@lahiki.net';
                $receiverAddress = $user->email;

                Log::info('LAHIKI --------  sending facebook register mail');  
                Mail::to($receiverAddress)
                ->bcc($copyAddress)        
                ->bcc($serverAddress)
                ->send(new RegisterSite($content));

               
                // Authentication passed...                       
                return redirect()->route('profiledit', [$user]);       
                
            } else {
                return redirect()->to('/home');
            }
        } else {   
            return redirect()->to('/home')
                ->withErrors('Erreur de communication avec Facebook, Contactez-nous sur notre page contact !');       
        }    
        
        
    }
}
