<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class ContactSite extends Mailable
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
    Log::info('LAHIKI --------  Mailable ContactSite constructed');  
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        Log::info('LAHIKI --------  Mailable ContactSite build');  
        return $this->subject('[Lahiki] : Message de Contact ' . 
            ($this->content['nom'] != null ? ' de ' . $this->content['nom'] : ''))
            ->markdown('mails.contact')
            ->with('content', $this->content);
    }
}
