<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pdo;

class pdoController extends Controller
{
    public function pdo()
    {

        return view('pdo.pdo');
    }

    public function subir(Request $request)
    {



        $Pdo = new Pdo();

        $file1                            = $request->file('Ticket');
        $extension1                       = strtolower($file1->getclientoriginalextension());
        $nombreunicoarchivo1              = uniqid().'.'.$extension1;
        $bytes                            = \File::size($file1);
        $Pdo->size                 = $bytes;
        $Pdo->archivo              = $file1->getClientOriginalName();
        $Pdo->nombreunico          = $nombreunicoarchivo1;

        $Pdo = new Pdo();
        $Pdo->id_usuario = Auth::user()->id;
        $Pdo->serial = $request->serial;
        $Pdo->id_cliente = $request->id_cliente;
        $Pdo->ruta_archivo = $nombreunicoarchivo1;


        \Storage::disk('Pdo')->put($nombreunicoarchivo1,  \File::get($file1));
        $Pdo->save();



    }

}
