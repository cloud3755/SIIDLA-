<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pdo extends Model
{
    protected $fillable = ['id_usuario', 'serial', 'id_cliente', 'ruta_archivo'];
}
