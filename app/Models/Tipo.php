<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'TipoServicio',
        'created_at',
        'updated_at'
    ];

    //relacion con detalles a la inversa
    public function detalle(){
        return $this->belongsTo(Detalle::class);
    }
}
