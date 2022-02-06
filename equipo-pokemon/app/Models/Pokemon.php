<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    protected $table = 'pokemons';
    protected $primaryKey = 'id';

    protected $fillable = ['nombre', 'nivel', 'fecha_capturado', 'tipo', 'genero', 'descripcion', 'shiny', 'user_id', 'fichero'];
    protected $visible = ['id','nombre', 'nivel', 'fecha_capturado', 'tipo', 'genero', 'descripcion', 'shiny', 'user_id', 'fichero'];

    public function users(){
        return $this->belongsTo(User::class);
    }
}
