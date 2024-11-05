<?php

namespace App\Services;

use App\Mail\SolicitudSent;
use Illuminate\Support\Facades\Mail;


class EmailSenderService
{

    public function sendToAdminEmails($emails, $solicitud)
    {
        foreach ($emails as $email) {
            Mail::to($email)->send(new SolicitudSent($solicitud));
        }
    }

}
