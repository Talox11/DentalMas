<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromocionServicio extends Model
{
    use HasFactory;
    

    protected $table = 'promocion_servicio';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'id_servicios',
        'id_promocion',
        'id_imagen',
    ];
}
