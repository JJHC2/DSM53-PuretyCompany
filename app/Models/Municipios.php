<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{
    use HasFactory;
    protected $table='municipios';
    protected $primarykey='id';
    protected $fillable=[
        'id_estado',
        'nombre',
    ];
    public function estado()
    {
        return $this->hasOne(Estados::class, 'id', 'id_estado');
    }
}
