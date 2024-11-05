<?php

namespace App\Services;

use App\Models\Email;
use App\Services\EmailSenderService;
use Illuminate\Http\Request;

class EmailService
{

    private $emailSenderService;

    public function __construct(EmailSenderService $emailSenderService)
    {
        $this->emailSenderService = $emailSenderService;
    }

    public function getEmails()
    {
        return Email::all();
    }

    public function create(Request $request)
    {
        $request->validate([
            'email' => ['email', 'string', 'required', 'max:255']
        ]);

        Email::create([
            'email' => $request->email
        ]);
    }

    public function findById($id)
    {
        return Email::find($id);
    }

    public function update(Request $request, $id)
    {
        $email = Email::findOrFail($id);
        $request->validate([
            'email' => ['string', 'email', 'max:255']
        ]);

        $email->update($request->only(['email']));
    }

    public function delete($id)
    {
        $email = Email::findOrFail($id);
        $email->delete();
    }

    public function sendNotificationEmail($solicitud)
    {
        $emails = Email::all();
        $this->emailSenderService->sendToAdminEmails($emails, $solicitud);
    }

}
