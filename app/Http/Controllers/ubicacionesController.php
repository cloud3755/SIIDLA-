<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ubicacion;
use Yajra\Datatables\Datatables;//Prueba dataTables Ajax

class ubicacionesController extends Controller
{
    public function ubicaciones()
    {

        $ubicaciones =  new Ubicacion;
        $ubicaciones = $ubicaciones->all();
        return view('numerosParte.Ubicaciones');
    }

    public function nuevaUbicacion(Request $request)
    {   
        $ubicaciontext = $request->ubicacion;
        $chkRango = $request->chkRango;
        $warnings = 0;
        
        if($chkRango =="on")
        {
            $inferior = $request->inferior;
            $superior = $request->superior;

            for($i = $inferior; $i <= $superior; $i++)
            {
                $ubicacion = new Ubicacion;
                $ubicacion->ubicacion = $ubicaciontext.$i;
                $ubicacion->descripcion="";
                $ubicacion->capacidad = 0;
                $ubicacion->save();
                $ubicacion= null;
            }
        }
        else
        {
            $ubicacion = new Ubicacion;
            $ubicacion->ubicacion = $ubicaciontext;
            $ubicacion->capacidad = 0;
            $ubicacion->descripcion="";
            $ubicacion->save();
        }
       
        \Session::flash('Guardado','Se guardaron las ubicaciones correctamente');
        return redirect()->route("ubicaciones"); 
    }


    public function getJsonUbicaciones()
    {
        return Datatables::of(Ubicacion::all())->make(true);
    }
}
