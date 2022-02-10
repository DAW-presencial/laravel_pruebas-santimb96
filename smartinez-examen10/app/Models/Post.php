<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

/*Schema::create('posts', function (Blueprint $table) {
    $table->increments('id');
    $table->string('titulo');
    $table->string('extracto');
    $table->string('contenido');
    $table->boolean('caducable');
    $table->boolean('comentable');
    $table->enum('acceso',['privado','publico']);
    $table->date('fecha_publicacion');
    $table->timestamps();
    $table->integer('user_id')->unsigned();
    $table->foreign('user_id')
        ->references('id')->on('users')
        ->onDelete('cascade');
});*/

    protected $table = 'posts';
    protected $primaryKey = 'id';

    protected $fillable = ['titulo', 'extracto', 'contenido', 'caducable', 'comentable', 'acceso', 'fecha_publicacion'];
    protected $visible = ['id', 'titulo', 'extracto', 'contenido', 'caducable', 'comentable', 'acceso', 'fecha_publicacion', 'user_id'];

    public function users () {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
