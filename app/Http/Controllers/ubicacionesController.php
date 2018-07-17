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
        $ubicacion = $request->ubicacion;
        $chkRango = $request->chkRango;
        $warnings = 0;
        $this->returnMessage("Guardado", "HOLA", "ubicaciones");
        if($chkRango =="on")
        {
            $inferior = $request->inferior;
            $superior = $request->superior;

            for($i = $inferior; $i <= $superior; $i++)
            {
                $ubicacion = new Ubicacion;
                //$ubicacion->
            }
        }
        else
        {

        }
    }


    public function getJsonUbicaciones()
    {
        return Datatables::of(Ubicacion::all())->make(true);
    }
}
