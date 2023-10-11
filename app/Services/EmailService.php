<?php

namespace App\Services;

use App\Mail\ContactEmail;
use Illuminate\Support\Facades\Mail;

class EmailService
{
    public function send(array $data): void
    {
        $ownEmail = config('mail.own_email');
        Mail::to($ownEmail)->send(new ContactEmail($data));
    }
}
