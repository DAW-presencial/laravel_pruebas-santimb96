<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relacion extends Model
{
    use HasFactory;

    protected $table = 'profesor_alumno';
    protected $primaryKey = null;
    public $incrementing = false;

    protected $fillable = ['profesor_id', 'alumno_id'];
}
