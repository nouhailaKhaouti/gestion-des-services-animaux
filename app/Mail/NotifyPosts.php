<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyPosts extends Mailable
{
    use Queueable, SerializesModels;

    public $user,$titre;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$titre)
    {
        $this->user = $user;
        $this->titre = $titre;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('user.email')->with(['user'=>$this->user,'titre'=>$this->titre]);
    }
}
