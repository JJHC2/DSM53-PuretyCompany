<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    use HasFactory;
    protected $table='tipo_usuario';
    protected $fillable=[
        'nombre_t',
        'usuario_id',
    ];
    public function Usuario()
	{
		return $this->belongsTo(Usuario::class);
	}
}
