<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class RencontreSite extends Mailable
{
    use Queueable, SerializesModels;

    public $content;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content)
    {
       $this->content = $content;
    Log::info('LAHIKI --------  Mailable RencontreSite constructed');  
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        Log::info('LAHIKI --------  Mailable RencontreSite build');  
        return  $this->subject('[Lahiki] : Accueil de { ' . $this->content['prenom_accueilli'] .' ' . $this->content['nom_accueilli']
            . '} - Le ' . $this->content['date_rencontre'] . ' sur www.lahiki.fr')
            ->markdown('mails.rencontre')
            ->with('content', $this->content);
    }
}
