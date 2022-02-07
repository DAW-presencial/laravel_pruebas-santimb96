<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $table = 'vehiculos';
    protected $primaryKey = 'id';

    protected $fillable = ['nombre', 'modelo', 'color', 'km', 'user_id'];
    protected $visible = ['id', 'nombre', 'modelo', 'color', 'km', 'user_id'];

    public function users (): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
