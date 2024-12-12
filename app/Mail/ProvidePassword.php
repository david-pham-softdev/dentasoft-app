<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProvidePassword extends Mailable
{
    use Queueable, SerializesModels;

    protected $password;
    protected $userName;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($password, $userName)
    {
        $this->password = $password;
        $this->userName = $userName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
                    ->subject('Provide your password')
                    ->view('emails.users.provide_password')
                    ->with([
                        'password' => $this->password,
                        'userName' => $this->userName
                    ]);
    }
}
