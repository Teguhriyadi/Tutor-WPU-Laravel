<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        $appKey = config('app.key');
        $appName = preg_replace('/[^A-Za-z0-9\-]/', '', config('app.name'));
        // expire : 60 minute
        $expire = Carbon::now()->addMinute(60);
        $verifyUrl = URL::temporarySignedRoute('verification.verify', $expire, [
            'id' => $this->user->getKey(),
            'hash' => sha1($this->user->getEmailForVerification()),
        ]);
        // Create code
        // format code : appName/userId/emailUser/expire/signature
        $plainText = implode("/", [$appName, $this->user->id, sha1($this->user->getEmailForVerification()), $expire->getTimestamp()]);
        $signature = hash_hmac('sha256', $plainText, $appKey);
        $verifyUrl = implode("/", [$plainText, $signature]);

        $address = config('mail.from.address');
        $name = config('mail.from.name');
        $subject = 'Email verification';
        return $this->to($this->user)
            ->subject($subject)
            ->from($address, $name)
            ->markdown('emails.email-verification', [
                'url' => $verifyUrl,
                'user' => $this->user,
                'expire' => $expire->isoFormat("dddd, D MMMM Y H:mm:ss")
            ]);
    }
}
