<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Numeros_parte;
use App\UnidadMedida;
use App\Inventario;
use App\Ubicacion;
use App\historialMovimientosNumeroParte;
use Auth;
use Illuminate\Support\Facades\DB;

class numeroParteController extends Controller
{
    private $numerosParte;

    public function __construct()
    {
        
    }
    public function numerosParte()
    {
        $Unidades = (new UnidadMedida());
        $Unidades = $Unidades->all();
        $numerosParte  =  new Numeros_parte();
        $numerosParte = $numerosParte->all();
        return view('numerosParte.numerosParte', compact('numerosParte', 'Unidades'));
    }

    public function nuevo(Request $request)
    {
        $nuevaParte =  new Numeros_parte();
        $nuevaParte->gin = $request->Numero; 
        $nuevaParte->descripcion = $request->Descripcion; 
        $nuevaParte->area = $request->Area; 
        $nuevaParte->id_unidad_medida = $request->unidadMedida; 
        $nuevaParte->id_sucursal = 1; 

        $nuevaParte->save();
        \Session::flash('Guardado','Se Guardo el número de parte correctamente');
        return redirect()->route("numerosParte"); 
    }

    public function unidadMedida()
    {
        $Unidades = (new UnidadMedida());
        $Unidades = $Unidades->all();
        return view('numerosParte.UnidadesMedida', compact('Unidades'));

    }

    public function nuevaUnidadMedida(Request $request)
    {
        $unidad = new UnidadMedida();
        $unidad->nombre =       $request->Nombre;
        $unidad->descripcion =  $request->Descripcion;
        $unidad->abreviatura =  $request->Abreviatura;
        $unidad->save();
         \Session::flash('Guardado',"Se guardo la unidad correctamente");
        return redirect()->route("unidadMedida"); 
        //$this->returnMessage('Guardado', , );
    }

    public function cambioArea()
    {
        $ubicaciones =  new Ubicacion;
        $ubicaciones = $ubicaciones->all();

        if(Auth::user()->isAdmin())
        {
            $inventario = 
            DB::table('inventarios')
            ->join("numeros_partes", "numeros_partes.gin", "=", "inventarios.gin" )
            ->leftjoin('sucursales', "inventarios.id_sucursal", "=", "sucursales.id")
            ->where('inventarios.cantidad', '>', '0')
            ->select("inventarios.*", "numeros_partes.Descripcion" , "sucursales.id as id_sucursal", "sucursales.nombre as nombre_sucursal")
            ->get();
        
        return view('numerosParte.CambioArea', compact('inventario', 'ubicaciones'));
        }
        else
        {
            
            $inventario = 
            DB::table('inventarios')
            ->join("numeros_partes", "numeros_partes.gin", "=", "inventarios.gin" )
            ->leftjoin('sucursales', "inventarios.id_sucursal", "=", "sucursales.id")
            ->where('inventarios.cantidad', '>', '0')
            ->where('inventarios.id_sucursal', '=', Auth::User()->id_sucursal)
            ->select("inventarios.*", "numeros_partes.Descripcion" , "sucursales.id as id_sucursal", "sucursales.nombre as nombre_sucursal")
            ->get();
        
        return view('numerosParte.CambioArea', compact('inventario', 'ubicaciones'));
        }
    }

    public function nuevoCambioArea(Request $request)
    {
        $cambiosArea = \json_decode($request->datosCambioArea);
        $fechaHora = date("Y-m-d H:i:s");
        $count = count($cambiosArea);
        //dd($count);
        foreach($cambiosArea as $cambios)
        {
            $inventario             = new Inventario();
            $gin = $cambios->gin;
            $areaAnterior = $cambios->areaAnterior;
            $nuevaArea = $cambios->nuevaArea;
            $cantidad = $cambios->cantidad;
            $id_sucursal = $cambios->id_sucursal;
            if($inventario->existsByGinArea($gin, $nuevaArea))
            {
                $inventario->updateAddStockByGinArea($gin, $nuevaArea, $cantidad);
            }
            else
            {
                $lote = $cambios->lote;
                $fecha_caducidad = $cambios->fecha_caducidad;
                $fechaHora_entrada = $cambios->fecha_caducidad;
                $inventario             = new Inventario();
            
                $inventario->gin        = $gin;
                $inventario->ubicacion  = $nuevaArea;
                $inventario->lote       = $lote;
                $inventario->cantidad   = $cantidad;
                $inventario->fecha_caducidad = $fecha_caducidad;
                $inventario->fechaHora_entrada  = $fechaHora_entrada;
                $inventario->id_usuario  = Auth::user()->id;
                $inventario->id_sucursal  = $id_sucursal;
                
                $inventario->save();
                $inventario = null;
            }
            $historial = new historialMovimientosNumeroParte();
            $historial->gin = $gin;
            $historial->id_usuario = Auth::user()->id;
            $historial->area_anterior = $areaAnterior;
            $historial->nueva_area = $nuevaArea;
            $historial->fecha_movimiento = $fechaHora;
            $historial->save();
            $historial = null;
        }

        \Session::flash('Guardado',"Se Cambiaron ".$count." areas correctamente");
        return redirect()->route("cambioArea"); 
    }

    public function showNumerosParteHistorialResumen()
    {
        if(Auth::user()->isAdmin())
        {
            /*
            $inventario = 
            DB::table('inventarios')
            ->join("numeros_partes", "numeros_partes.Numero as num", "=", "inventarios.gin" )
            ->leftjoin('sucursales', "inventarios.id_sucursal", "=", "sucursales.id")
            ->leftjoin(
                DB::raw('( SELECT 
                numero_parte,
                id_usuario, 
                area_anterior,
                nueva_area, 
                fechaMovimiento 
                FROM historial_movimientos_numero_partes    
                WHERE num = historial_movimientos_numero_partes.numero_parte  LIMIT 1) historialParte '),

            function($join)
            {
                $join->on('inventarios.gin', '=', 'historialParte.numero_parte');
            }

            )
            ->select(
                "inventarios.*", "numeros_partes.Descripcion" , "sucursales.id as id_sucursal", "sucursales.nombre as nombre_sucursal",
                "historialParte.*"
            )
            ->toSql();
            dd($inventario);
        
        return view('numerosParte.CambioArea', compact('inventario', 'ubicaciones'));
        */

         $inventario = 
            DB::table('inventarios')
            ->join("numeros_partes", "numeros_partes.gin", "=", "inventarios.gin" )
            ->select("inventarios.*", "numeros_partes.Descripcion")
            ->get();
        
        return view('numerosParte.CambioAreaHistorialResumen', compact('inventario'));
        }
        else
        {
            
            $inventario = 
            DB::table('inventarios')
            ->join("numeros_partes", "numeros_partes.gin", "=", "inventarios.gin" )
            ->leftjoin('sucursales', "inventarios.id_sucursal", "=", "sucursales.id")
            ->where('inventarios.cantidad', '>', '0')
            ->where('inventarios.id_sucursal', '=', Auth::User()->id_sucursal)
            ->select("inventarios.*", "numeros_partes.Descripcion" , "sucursales.id as id_sucursal", "sucursales.nombre as nombre_sucursal")
            ->get();
        
        return view('numerosParte.CambioArea', compact('inventario', 'ubicaciones'));
        }
    }

    public function showNumeroParteHistorial($numeroParte)
    {
        $numerosParte = 
        DB::table('historial_movimientos_numero_partes as hist')
        ->join('users', "hist.id_usuario", "=", "users.id")
        ->where("hist.gin", "=", $numeroParte)
        ->select("hist.*", "users.name as usuario", "users.id as id_usuario")
        ->get();
        return view('numerosParte.CambioAreaHistorialNumeroParte', compact('numerosParte'));
    }

}
