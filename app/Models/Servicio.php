<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
      //
      protected $table = 'servicios';
      protected $primaryKey = 'id';
      const CREATED_AT = 'created_at';
      const UPDATED_AT = 'updated_at';
  
      protected $fillable = [
          'nombre',
          'precio_base',
          'descripcion',
          'contenido',
          'url_dentalink',
          'id_imagen',
          'estatus'
      ];
  
      
}
