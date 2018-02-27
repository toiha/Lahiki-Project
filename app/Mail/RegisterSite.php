<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class RegisterSite extends Mailable
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
    Log::info('LAHIKI --------  Mailable RegisterSite constructed');  
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        Log::info('LAHIKI --------  Mailable RegisterSite build');  
        return $this->subject('[Lahiki] : Votre inscription sur www.lahiki.fr')
            ->markdown('mails.register')
            ->with('content', $this->content);
    }
}
