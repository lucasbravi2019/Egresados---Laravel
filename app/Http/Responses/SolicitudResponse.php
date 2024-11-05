<?php

namespace App\Http\Responses;

use Illuminate\Database\Eloquent\Collection;


class SolicitudResponse
{

    public $aprobadas;
    public $rechazadas;
    public $pendientes;

    public function __construct()
    {
        $this->aprobadas = new Collection([]);
        $this->rechazadas = new Collection([]);
        $this->pendientes = new Collection([]);
    }

    public function setAprobadas($aprobadas)
    {
        $this->aprobadas = $this->aprobadas->merge($aprobadas);
    }

    public function setRechazadas($rechazadas)
    {
        $this->rechazadas = $this->rechazadas->merge($rechazadas);
    }

    public function setPendientes($pendientes)
    {
        $this->pendientes = $this->pendientes->merge($pendientes);
    }

}
