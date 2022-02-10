<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;

/*Schema::create('profesores', function (Blueprint $table) {
    $table->increments('id');
    $table->string('nombre');
    $table->string('asignatura');
    $table->boolean('contrato');
    $table->timestamps();
});*/

    protected $table = 'profesores';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'asignatura', 'contrato'];
    protected $visible = ['id','nombre', 'asignatura', 'contrato'];

    public function alumnos(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Alumno::class, 'profesor_alumno', 'profesor_id', 'alumno_id');
    }
}
