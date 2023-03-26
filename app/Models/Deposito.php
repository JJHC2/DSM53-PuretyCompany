<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposito extends Model
{
    use HasFactory;
    protected $table='deposito';
    protected $fillable=[
        'codigo',
        'capacidad',
        'Lugar',
        'usuario_id',
    ];
    public function Usuario()
	{
		return $this->belongsTo(Usuario::class);
	}
    public function Sensor()
	{
		return $this->hasOne(Sensor::class);
	}
}
