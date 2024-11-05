<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\SolicitudService;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{

    private SolicitudService $solicitudService;

    public function __construct(SolicitudService $solicitudService)
    {
        $this->solicitudService = $solicitudService;
    }

    public function approve($id)
    {
        $this->solicitudService->approveOrReject(true, $id);
        return redirect('dashboard')->with('success', 'La solicitud se aprobó');
    }

    public function reject($id)
    {
        $this->solicitudService->approveOrReject(false, $id);
        return redirect('dashboard')->with('success', 'La solicitud se rechazó');
    }

}
