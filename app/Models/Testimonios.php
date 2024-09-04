<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonios extends Model
{
    use HasFactory;

    protected $table = 'testimonios';
      protected $primaryKey = 'id';
      const CREATED_AT = 'created_at';
      const UPDATED_AT = 'updated_at';
  
      protected $fillable = [
          'nombre',
          'fecha',
          'titulo',
          'descripcion',
          'tratamientos',
          'id_imagen',
          'url_video',
          'estatus'
      ];
}
