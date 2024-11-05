<?php

namespace App\Services;

use App\Models\User;
use App\Models\Career;
use App\Models\Solicitud;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Responses\SolicitudResponse;

class SolicitudService
{

    private $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function saveSolicitud($user, $careerId)
    {
        $solicitud = new Solicitud();
        $career = Career::find($careerId);
        $solicitud->career()->associate($career);
        $solicitud->user()->associate($user);
        $solicitud->approved = false;
        $solicitud->save();

        $this->emailService->sendNotificationEmail($solicitud);
    }

    public function getSolicitudes($user)
    {
        $solicitudes = new SolicitudResponse();

        if ($user->admin)
        {
            $aprobadas = $this->mapSolicitudes(Solicitud::where('approved', true)->with('user')->with('career')->get());
            $rechazadas = $this->mapSolicitudes(Solicitud::where('rejected', true)->with('user')->with('career')->get());
            $pendientes = $this->mapSolicitudes(Solicitud::where('approved', false)->where('rejected', false)->with('user')->with('career')->get());
            $solicitudes->setAprobadas($aprobadas);
            $solicitudes->setRechazadas($rechazadas);
            $solicitudes->setPendientes($pendientes);
        } else
        {
            $solicitud = Solicitud::where('user_id', $user->id)->with('user')->with('career')->first();
            $collection = $this->mapSolicitudes(new Collection([$solicitud]));
            if (!$solicitud->approved && !$solicitud->rejected)
            {
                $solicitudes->setPendientes($collection);
            } else if ($solicitud->approved)
            {
                $solicitudes->setAprobadas($collection);
            } else
            {
                $solicitudes->setRechazadas($collection);
            }
        }

        return $solicitudes;
    }

    public function approveOrReject($approve, $id)
    {
        $solicitud = Solicitud::findOrFail($id);
        if ($approve)
        {
            $solicitud->approved = true;
        } else
        {
            $solicitud->rejected = true;
        }

        $solicitud->save();
    }

    private function getStatus($solicitud)
    {
        if (!$solicitud->approved && !$solicitud->rejected)
        {
            return 'Pendiente';
        } else if ($solicitud->approved)
        {
            return 'Aprobada';
        } else
        {
            return 'Rechazada';
        }
    }

    private function mapSolicitudes($solicitudes)
    {
        return $solicitudes->map(function (Solicitud $item) {
            $item->status = $this->getStatus($item);
            return $item;
        });
    }

}
