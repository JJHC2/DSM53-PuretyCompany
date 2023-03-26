<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requerimiento extends Model
{
    use HasFactory;
    protected $table='requerimientos';
    protected $fillable=[
        'sensor_id',
        'PPM',
    ];
}
