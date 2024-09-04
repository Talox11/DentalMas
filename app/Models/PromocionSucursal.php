<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromocionSucursal extends Model
{
    use HasFactory;
    

    protected $table = 'promocion_sucursal';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'id_sucursal',
        'id_servicio',
        'precio_descuento',
        'id_imagen',
        'estatus',
    ];
}
