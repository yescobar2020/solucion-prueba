<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'nombre',
        'imagen',
        'tipo_id',
        'fechaInicio',
        'fechaFin',
        'observaciones',
        'created_at',
        'updated_at'
    ];

    //relacion entre detalles y tipo de servicio

    public function tipo(){
        return $this->belongsTo(Tipo::class);
    }

    //relacion muchos a muchos entre detalles y clientes por medio de tabla pivot
    public function clientes(){
        return $this->belongsToMany(Cliente::class);
    }
}
