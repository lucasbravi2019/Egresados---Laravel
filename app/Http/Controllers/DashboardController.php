<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\SolicitudService;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    private $solicitudService;

    public function __construct(SolicitudService $solicitudService)
    {
        $this->solicitudService = $solicitudService;
    }

    public function showDashboard()
    {
        $user = Auth::user();
        $isAdmin = $user->admin;
        $solicitudes = $this->solicitudService->getSolicitudes($user);

        return view('dashboard', [
            'isAdmin' => $isAdmin,
            'solicitudes' => $solicitudes
        ]);
    }


}
