<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    protected $table = 'ubicaciones';

    public  function getByubicacion($ubicacion)
    {
        return $this->where('ubicacion', '=', $ubicacion)->first();
    }
}
