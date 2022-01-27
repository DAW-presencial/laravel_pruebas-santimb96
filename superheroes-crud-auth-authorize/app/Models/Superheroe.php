<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Superheroe extends Model
{
    use HasFactory;

    protected $table = 'superheroe';

    protected $primaryKey= 'id';

    protected $fillable = ['nombre', 'edad', 'fecha_nacimiento', 'poderes','genero','descripcion', 'vengador'];

    protected $visible = ['id','nombre', 'edad', 'fecha_nacimiento', 'poderes','genero','descripcion', 'vengador'];
}
