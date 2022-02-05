<?php

namespace Database\Seeders;

use App\Models\Pokemon;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //['id','nombre', 'nivel', 'fecha_capturado', 'tipo', 'genero', 'descripcion', 'shiny', 'user_id'];

        //ELOQUENT
        $pokemon = new Pokemon;

        $pokemon->nombre = 'Charmander';
        $pokemon->nivel = 5;
        $pokemon->fecha_capturado = Carbon::now('Europe/Madrid');
        $pokemon->tipo = json_encode(['fuego']);
        $pokemon->genero = 'masculino';
        $pokemon->descripcion = 'Pokemon de tipo fuego';
        $pokemon->shiny = false;
        $pokemon->user_id = 1;
        $pokemon->save();

        //QUERYBUILDER

        DB::table('pokemons')->insert([
            'nombre'=>'Empoleon',
            'nivel'=>45,
            'fecha_capturado'=>Carbon::now('Europe/Madrid'),
            'tipo'=>json_encode(['agua', 'acero']),
            'genero'=>'masculino',
            'descripcion'=>'Pokemon de tipo agua y acero',
            'shiny'=>true,
            'user_id'=>1
        ]);
    }
}
