<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    use HasFactory;
    protected $table='sensor';
    protected $fillable=[
        'nombre',
        'deposito_id',
    ];
    public function Deposito()
	{
		return $this->belongsTo(Deposito::class);
	}
}
