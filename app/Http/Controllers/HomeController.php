<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ubicacion;
use App\Numeros_parte;
use \App\Inventario;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

     public function entradas()
    {

        $ubicaciones =  new Ubicacion;
        $ubica = $ubicaciones->all();

        $numeros = new Numeros_parte;
        $num = $numeros->all();

        return view('entradas',compact('ubica','num'));
    }
     public function salidas()
    {
        $inventario = 
            DB::table('inventarios')
            ->join("numeros_partes", "numeros_partes.Numero", "=", "inventarios.gin" )
            ->where('inventarios.cantidad', '>', '0')
            ->select("inventarios.*", "numeros_partes.Descripcion")
            ->get();
        
        return view('salidas', compact('inventario'));
    }
/*
    public function login()
    {
        return view('auth/login');
    }

*/
}
