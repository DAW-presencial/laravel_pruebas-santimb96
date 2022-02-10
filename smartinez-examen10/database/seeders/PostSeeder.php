<?php

namespace Database\Seeders;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

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

        $p = new Post;

        $p->titulo = 'Examen Laravel';
        $p->extracto = 'examen de la segunda eva';
        $p->contenido = 'mucho texto importante';
        $p->caducable = false;
        $p->comentable = false;
        $p->acceso = 'publico';
        $p->fecha_publicacion = Carbon::now('Europe/Madrid');
        $p->user_id = 1;
        $p->save();


        $p2 = new Post;

        $p2->titulo = 'Examen Cliente';
        $p2->extracto = 'examen de la segunda eva cliente';
        $p2->contenido = 'mucho texto no importante';
        $p2->caducable = true;
        $p2->comentable = false;
        $p2->acceso = 'privado';
        $p2->fecha_publicacion = Carbon::now('Europe/Madrid');
        $p2->user_id = 1;
        $p2->save();
    }
}
