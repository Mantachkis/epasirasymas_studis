<?php

namespace App\Mail;

use App\Models\Esp\MasterInfo;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MastersInviteMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Priėmimas į studijas')
            ->to($this->email)
            ->view('emailContent.mastersAgreementInvite');
    }
}
