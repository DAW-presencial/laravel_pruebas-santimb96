<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $table = 'vehiculo';

    protected $primaryKey = 'id';

    protected $fillable = ['nombre', 'color'];

    protected $visible = ['id', 'nombre', 'color'];

    public function superheroe() {
        return $this->belongsTo(Superheroe::class);
    }
}
