<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $table = 'vehiculos';
    protected $primaryKey = 'id';

    protected $fillable = ['nombre', 'modelo', 'color', 'km'];
    protected $visible = ['id', 'nombre', 'modelo', 'color', 'km'];
}
