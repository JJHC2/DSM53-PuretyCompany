<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table='usuario';
    protected $fillable=[
        'nombre_u',
        'app',
        'apm',
        'email',
        'password',
        'imagen',
        'telefono',
    ];
    public function TipoUsuario()
	{
		return $this->hasOne(TipoUsuario::class);
	}
    public function Usuario()
	{
		return $this->hasOne(TipoUsuario::class);
	}
    public function deposito(){
        return $this->hasOne(Deposito::class);
    }
}
