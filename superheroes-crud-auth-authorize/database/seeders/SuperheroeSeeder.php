<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SuperheroeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('personaje')->insert([
        //            'nombre'=> 'Spiderman',
        //            'edad' => 23,
        //            'nacionalidad'=> 'USA',
        //            "created_at" =>  date('Y-m-d H:i:s'),
        //            "updated_at" => date('Y-m-d H:i:s')
        //        ]);

        DB::table('superheroe')->insert([
            'nombre'=> 'Spiderman',
            'edad'=> 23,
            'fecha_nacimiento' => Carbon::parse('1999-01-01'),
            'poderes'=> json_encode(['superfuerza', 'rapidez']),
            'genero' => 'hombre',
            'descripcion' => 'El hombre araña',
            'vengador' => "SI"
        ]);

        DB::table('superheroe')->insert([
            'nombre'=> 'Thor',
            'edad'=> 500,
            'fecha_nacimiento' => Carbon::parse('1400-01-01'),
            'poderes'=> json_encode(['superfuerza']),
            'genero' => 'hombre',
            'descripcion' => 'Dios del trueno',
            'vengador' => "SI"
        ]);
    }
}
