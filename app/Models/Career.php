<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{

    protected $fillable = ['description'];

    public function career()
    {
        return $this->hasOne(Solicitud::class);
    }

}
