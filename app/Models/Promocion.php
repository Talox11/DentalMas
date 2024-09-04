<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    use HasFactory;

    protected $table = 'promociones';
      protected $primaryKey = 'id';
      const CREATED_AT = 'created_at';
      const UPDATED_AT = 'updated_at';

      
  
      protected $fillable = [
        'tipo',
        'codigo',
        'terminos',
        'inv_inicial',
        'descuento_cupon',
        'chk_vigencia',
        'chk_agotar_exist',
        'inicio',
        'fin',
        'estatus',
      ];
}
