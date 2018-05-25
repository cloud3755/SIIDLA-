<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Numeros_parte;
use App\UnidadMedida;
use App\Inventario;
use App\Ubicacion;

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
        $nuevaParte->Numero = $request->Numero; 
        $nuevaParte->Descripcion = $request->Descripcion; 
        $nuevaParte->Area = $request->Area; 
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
        $unidad->Nombre =       $request->Nombre;
        $unidad->Descripcion =  $request->Descripcion;
        $unidad->Abreviatura =  $request->Abreviatura;
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
            ->join("numeros_partes", "numeros_partes.Numero", "=", "inventarios.gin" )
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
            ->join("numeros_partes", "numeros_partes.Numero", "=", "inventarios.gin" )
            ->leftjoin('sucursales', "inventarios.id_sucursal", "=", "sucursales.id")
            ->where('inventarios.cantidad', '>', '0')
            ->where('inventarios.id_sucursal', '=', Auth::User()->id_sucursal)
            ->select("inventarios.*", "numeros_partes.Descripcion" , "sucursales.id as id_sucursal", "sucursales.nombre as nombre_sucursal")
            ->get();
        
        return view('numerosParte.CambioArea', compact('inventario', 'ubicaciones'));
        }
    }

}
