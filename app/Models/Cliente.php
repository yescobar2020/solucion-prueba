<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'nombre',
        'imagen',
        'cedula',
        'correo',
        'telefono',
        'observaciones',
        'created_at',
        'updated_at'
    ];

    //relacion muchos a muchos entre clientes y detalles por medio de tabla pivot
    public function detalles(){
        return $this->belongsToMany(Detalle::class);
    }
}
