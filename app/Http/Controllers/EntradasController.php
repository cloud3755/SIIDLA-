<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ubicacion;
use App\Numeros_parte;
use App\Inventario;
use App\Sucursal;
use App\Entrada;
use App\EntradaDetalle;
use Auth;
use Illuminate\Support\Facades\DB;

class EntradasController extends Controller
{
    public function __construct()
    {
        $this->middleware('rol:any');
    }

    public function subirarchivo(Request $request)
    {
      $file1 = $request->archivo;

      \Storage::disk('Pod')->put('Pod',  \File::get($file1));
      return view('entradas.entradas');
    }

    public function entradas()
    {

        $ubicaciones =  new Ubicacion;
        $ubica = $ubicaciones->all();

        $numeros = new Numeros_parte;
        $num = $numeros->all();

        $sucursales = new Sucursal;
        $sucursales = $sucursales->all();



        return view('entradas.entradas',compact('ubica','num', 'sucursales'));
    }
    public function nuevaEntrada(Request $request)
    {
        $fechaHora = date("Y-m-d H:i:s");
        $entradas = \json_decode($request->datosEntrada);
        $id_sucursal = $request->id_sucursal;

        $Entrada = new Entrada();
        $Entrada->id_usuario = Auth::user()->id;
        $Entrada->id_sucursal = Auth::user()->isAdmin() ? $id_sucursal : Auth::user()->id_sucursal;
        $Entrada->fecha_Entrada = $fechaHora;
        $Entrada->save();

        $id_entrada = $Entrada->id;

        foreach($entradas as $entrada)
        {
          //  $inventario = Inventario::where
            $inventario             = new Inventario();
            $entradaDetalle         = new EntradaDetalle();
            $entradaDetalle->id_entrada = $inventario->id_entrada = $id_entrada;
            $inventario->gin        = $entradaDetalle->gin = $entrada->gin;
            $inventario->ubicacion  = $entradaDetalle->ubicacion = $entrada->ubicacion;
            $inventario->lote       = $entradaDetalle->lote =   $entrada->lote;
            $inventario->cantidad   = $entradaDetalle->cantidad =   $entrada->cantidad;
            $inventario->fecha_caducidad = $entradaDetalle->fecha_caducidad = $entrada->fecha_caducidad;
            $inventario->fechaHora_entrada  = $fechaHora;
            $inventario->id_usuario  = Auth::user()->id;
            $inventario->id_sucursal  = $id_sucursal;
           // $var .= $entrada->ubicacion;
            $inventario->save();
            $entradaDetalle->save();
            $entradaDetalle = null;
            $inventario=null;
        }
        //var_dump($var);
        \Session::flash('Guardado','Se guardaron correctamente las entradas');
        return redirect()->route("entradas");
    }

    public function showEntradas()
    {
        $entradas = DB::table('entradas')
                    ->leftjoin('users', "entradas.id_usuario", "=", "users.id")
                    ->leftjoin('sucursales', "entradas.id_sucursal", "=", "sucursales.id")
                    ->select("entradas.id" , "entradas.fecha_entrada", "users.name as usuario", "sucursales.nombre as sucursal" )
                    ->orderBy('entradas.fecha_entrada', 'desc')
                    ->get();

        return view("entradas.mostrarEntradas", compact('entradas'));
    }

     public function showEntradasDetalle($id)
    {
        $entradaMaster = DB::table('entradas')
                    ->leftjoin('users', "entradas.id_usuario", "=", "users.id")
                    ->leftjoin('sucursales', "entradas.id_sucursal", "=", "sucursales.id")
                    ->where("entradas.id", "=" , $id)
                    ->select("entradas.id" , "entradas.fecha_entrada", "users.name as usuario", "sucursales.nombre as sucursal" )
                    ->first();
      //  echo $entradaMaster->id;
      //  dd($entradaMaster);
        $entradaDetalle = DB::table('entradas')
                    ->join('entrada_detalles', "entradas.id", "=", "entrada_detalles.id_entrada")
                    ->leftjoin('sucursales', "entradas.id_sucursal", "=", "sucursales.id")
                    ->where("entradas.id", "=" , $id)
                    ->select("entrada_detalles.*")
                    ->get();
        return view("entradas.mostrarEntradasDetalle", compact(['entradaMaster','entradaDetalle' ]));
    }
}
