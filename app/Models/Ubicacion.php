<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    use HasFactory;
    protected $table='ubicacion';
    protected $fillable=[
        'ciudad',
        'calle',
        'n_ex',
        'n_int',
        'colonia',
        'estado_id',
        'municipio_id',
        'usuario_id',
    ];
    public function Usuario()
	{
		return $this->belongsTo(Usuario::class);
	}
    public function Estados()
{
    return $this->belongsTo(Estados::class, 'estado_id');
}
public function Municipios()
{
    return $this->belongsTo(Municipios::class,'municipio_id');
}
}
