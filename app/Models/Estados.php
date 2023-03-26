<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    use HasFactory;
    protected $table='estados';
    protected $primarykey='id';
    protected $fillable=[
        'nombre_e',
    ];

    protected $hidden=[
        'create_at',
        'update_at',
    ];
    public function municipios()
    {
        return $this->hasMany(Municipios::class, 'id_estado', 'id');
    }
    public function ubicacion()
{
    return $this->hasOne(Ubicacion::class);
}
}
