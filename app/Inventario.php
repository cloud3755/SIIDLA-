<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    
    public function existsByGinArea($gin, $ubicacion)
    {
        return !($this->getByGinArea($gin, $ubicacion) === null);
    }

    public  function updateAddStockByGinArea($gin, $ubicacion, $cantidad)
    {
        $model = $this->getByGinArea($gin, $ubicacion);
        if($model)
        {
            $model->cantidad = $model->cantidad + $cantidad;
            $model->save();
        }
    }

    private  function getByGinArea($gin, $ubicacion)
    {
        return $this->where('gin', '=', $gin)
        ->where('ubicacion', '=', $ubicacion)->first();
    }
}
