<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pdo;
use Illuminate\Support\Facades\DB;
use Response;
use ZipArchive;

class pdoController extends Controller
{
    public function pdo()
    {

        return view('pdo.pdo');
    }

    public function historial(Request $request)
    {


        $fechaIni = $request->fechaIni;
        $fechaFinal = $request->fechaFinal;

        $historial = DB::table('pdos')
            ->whereBetween('created_at', [$fechaIni, $fechaFinal])
            ->get();


        return view("pdo.pdoHistorial", compact('historial'));
    }


    public function getDownload($id){




        $descarga = DB::table('pdos')
            ->where('id', $id)
            ->value('ruta_archivo');
                $file= $descarga;

        return response()->download(storage_path("/Pdo/".$descarga.""));
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



    $path = "storage/Pdo/Cliente1/".$file1->getClientOriginalName();
        $Pdo = new Pdo();
        $Pdo->id_usuario = Auth::user()->id;
        $Pdo->serial = $request->serial;
        $Pdo->id_cliente = $request->id_cliente;
        $Pdo->ruta_archivo = $nombreunicoarchivo1;


         \Storage::disk('Pdo')->put($nombreunicoarchivo1,  \File::get($file1));

        $file1->move(base_path('storage/Pdo/Cliente1'),$file1->getClientOriginalName());


        $Pdo->save();

        return view("pdo.pdo");

    }


    public function zip(Request $request)
    {
        $rutas = $request->input('cbox');
        foreach ($rutas as $key => $value){
            $files[$key] = glob(storage_path("/Pdo/".$value.""));
        }
        $archivos = call_user_func_array('array_merge', $files);

        $archiveFile = storage_path("/Pdo/files.zip");
        $archive = new ZipArchive();
        if ($archive->open($archiveFile, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {



            foreach ($archivos as $file) {
                if ($archive->addFile($file, basename($file))) {

                    continue;
                } else {
                    throw new Exception("file `{$file}` could not be added to the zip file: " . $archive->getStatusString());
                }
            }


            if ($archive->close()) {

                return response()->download($archiveFile, basename($archiveFile))->deleteFileAfterSend(true);
            } else {
                throw new Exception("could not close zip file: " . $archive->getStatusString());
            }
        } else {
            throw new Exception("zip file could not be created: " . $archive->getStatusString());
        }
    }

}
