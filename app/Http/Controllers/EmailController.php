<?php

namespace App\Http\Controllers;

use App\Services\EmailService;
use App\Models\Solicitud;
use App\Http\Controllers\Controller;
use App\Mail\SolicitudSent;
use Illuminate\Http\Request;

class EmailController extends Controller
{

    private $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function showEmails()
    {
        return view('email', ['emails' => $this->emailService->getEmails()]);
    }

    public function create()
    {
        return view('email.create');
    }

    public function storeNewEmail(Request $request)
    {
        $this->emailService->create($request);
        return redirect('email');
    }

    public function edit($id)
    {
        $email = $this->emailService->findById($id);
        return view('email.edit', ['email' => $email]);
    }

    public function update(Request $request, $id)
    {
        $this->emailService->update($request, $id);

        return redirect()->route('email')->with('success', 'Email actualizado con éxito');
    }

    public function destroy($id)
    {
        $this->emailService->delete($id);
        return redirect()->route('email')->with('success', 'Email borrado con éxito');
    }

    public function seeEmail()
    {
        $solicitud = Solicitud::find(4);
        return (new SolicitudSent($solicitud))->render();
    }

}
