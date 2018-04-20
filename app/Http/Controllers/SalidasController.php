<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Inventario;
class SalidasController extends Controller
{
    public function nuevaSalida(Request $request)
    {
        $salidas = \json_decode($request->datosSalida);
        //\var_dump($salidas); return;
        foreach($salidas as $salida)
        {
            $inventario = Inventario::find($salida->id);
            $inventario->cantidad = $inventario->cantidad - $salida->cantidad;
            $inventario->save();
            $inventario=null;
        }
        //var_dump($var);
        \Session::flash('Guardado','Se hicieron las salidas correctamente');
        return redirect()->route("salidas"); 
    }
}
