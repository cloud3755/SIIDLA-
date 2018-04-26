<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Inventario;
use Illuminate\Support\Facades\DB;
use App\Salida;
use App\SalidaDetalle;
use Auth;

class SalidasController extends Controller
{
     public function salidas()
    {
        if(Auth::user()->isAdmin())
        {
            $inventario = 
            DB::table('inventarios')
            ->join("numeros_partes", "numeros_partes.Numero", "=", "inventarios.gin" )
            ->leftjoin('sucursales', "inventarios.id_sucursal", "=", "sucursales.id")
            ->where('inventarios.cantidad', '>', '0')
            ->select("inventarios.*", "numeros_partes.Descripcion" , "sucursales.id as id_sucursal", "sucursales.nombre as nombre_sucursal")
            ->get();
        //dd($inventario);
        return view('salidas.salidas', compact('inventario'));
        }
        else
        {
            
            $inventario = 
            DB::table('inventarios')
            ->join("numeros_partes", "numeros_partes.Numero", "=", "inventarios.gin" )
            ->leftjoin('sucursales', "inventarios.id_sucursal", "=", "sucursales.id")
            ->where('inventarios.cantidad', '>', '0')
            ->where('inventarios.id_sucursal', '=', Auth::User()->id_sucursal)
            ->select("inventarios.*", "numeros_partes.Descripcion" , "sucursales.id as id_sucursal", "sucursales.nombre as nombre_sucursal")
            ->get();
        //dd($inventario);
        return view('salidas.salidas', compact('inventario'));
        }
        
    }
    public function nuevaSalida(Request $request)
    {
        $fechaHora = date("Y-m-d H:i:s");
        $salidas = \json_decode($request->datosSalida);
        //dd($salidas);
        $salida = new Salida();
        $salida->id_usuario = Auth::user()->id;
        $salida->fecha_Salida = $fechaHora;
        $salida->save();
        $id_salida = $salida->id;

        //\var_dump($salidas); return;
        foreach($salidas as $salida)
        {
            $salidaDetalle =  new SalidaDetalle();
            $salidaDetalle->id_salida = $id_salida;
            $salidaDetalle->gin = $salida->gin;
            $salidaDetalle->lote = $salida->lote;
            $salidaDetalle->ubicacion = $salida->ubicacion;
            $salidaDetalle->cantidad = $salida->cantidad;
            $salidaDetalle->fecha_caducidad = $salida->fecha_caducidad;
            $salidaDetalle->id_entrada_relacionada = $salida->id_entrada_relacionada;

            $inventario = Inventario::find($salida->id);
            $inventario->cantidad = $inventario->cantidad - $salida->cantidad;
            $inventario->save();
            $salidaDetalle->save();
            $salidaDetalle = null;
            $inventario    = null;
        }
        //var_dump($var);
        \Session::flash('Guardado','Se hicieron las salidas correctamente');
        return redirect()->route("salidas"); 
    }

    public function showSalidas()
    {
        $salidas = DB::table('salidas')
                    ->leftjoin('users', "salidas.id_usuario", "=", "users.id")
                    //->leftjoin('sucursales', "salidas.id_sucursal", "=", "sucursales.id")
                    ->select("salidas.id" , "salidas.fecha_Salida", "users.name as usuario")
                    ->orderBy('salidas.fecha_Salida', 'desc')
                    ->get();
        
        return view("salidas.mostrarSalidas", compact('salidas'));
    }

     public function showSalidasDetalle($id)
    {
        $salidaMaster = DB::table('salidas')
                    ->leftjoin('users', "salidas.id_usuario", "=", "users.id")
                    //->leftjoin('sucursales', "entradas.id_sucursal", "=", "sucursales.id")
                    ->where("salidas.id", "=" , $id)
                    ->select("salidas.id" , "salidas.fecha_Salida", "users.name as usuario")
                    ->first();
      //  echo $entradaMaster->id;
      //  dd($entradaMaster);
        $salidaDetalle = DB::table('salidas')
                    ->join('salida_detalles', "salidas.id", "=", "salida_detalles.id_salida")
                    //->join('entradas', "entradas.id", "=", "salidas.id_entrada_relacionada")
                    ->where("salidas.id", "=" , $id)
                    ->select("salida_detalles.*")
                    ->get();
        return view("salidas.mostrarSalidasDetalle", compact(['salidaMaster','salidaDetalle' ]));
    }
}
