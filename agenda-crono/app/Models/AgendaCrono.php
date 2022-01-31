<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaCrono extends Model
{
    use HasFactory;

    protected $table = 'contacto';
    protected $primaryKey = 'id';

    protected $fillable = ['nombre', 'edad', 'genero', 'fdn'];
    protected $visible = ['id', 'nombre', 'edad', 'genero', 'fdn'];
}
