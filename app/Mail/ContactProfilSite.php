<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class ContactProfilSite extends Mailable
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
    Log::info('LAHIKI --------  Mailable ContactProfilSite constructed');  
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        Log::info('LAHIKI --------  Mailable ContactProfil build');  
        return $this->subject('[Lahiki] : Message envoyé par ' . $this->content['fromNom'])
            ->markdown('mails.contactprofil')
            ->with('content', $this->content);
    }
}
