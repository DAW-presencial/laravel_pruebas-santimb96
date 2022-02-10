<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $table = 'alumnos';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'edad'];
    protected $visible = ['id','nombre', 'edad'];

    public function profesores(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
            return $this->belongsToMany(Profesor::class);
    }
}
