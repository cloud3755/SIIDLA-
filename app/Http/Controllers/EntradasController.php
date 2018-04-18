<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Inventario;

class EntradasController extends Controller
{   
    public function nuevaEntrada(Request $request)
    {
        
        $entradas = \json_decode($request->datosEntrada);
        //$var ="";
        foreach($entradas as $entrada)
        {
            $inventario = new Inventario();
            $inventario->gin = $entrada->gin;
            $inventario->ubicacion = $entrada->ubicacion;
            $inventario->lote = $entrada->lote;
            $inventario->cantidad = $entrada->cantidad;
            $inventario->fecha_caducidad = $entrada->fecha_caducidad;
            $inventario->fechaHora_entrada  = date("Y-m-d H:i:s");
            $inventario->id_usuario  = 1;
            $inventario->id_sucursal  = 1;
           // $var .= $entrada->ubicacion;
            $inventario->save();
            $inventario=null;
        }
        //var_dump($var);
        \Session::flash('Guardado','Se guardaron correctamente las entradas');
        return redirect()->route("entradas");   
    }
}
