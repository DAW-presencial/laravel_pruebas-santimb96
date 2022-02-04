<?php

namespace Database\Seeders;

use App\Models\Superheroe;
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

        //QUERYBUILDER
        DB::table('superheroe')->insert([
            'nombre'=> 'Spiderman',
            'edad'=> 23,
            'fecha_nacimiento' => Carbon::parse('1999-01-01'),
            'poderes'=> json_encode(['superfuerza', 'rapidez']),
            'genero' => 'hombre',
            'descripcion' => 'El hombre araña',
            'vengador' => "SI",
            'vehiculo_id' => 1
        ]);

        DB::table('superheroe')->insert([
            'nombre'=> 'Thor',
            'edad'=> 500,
            'fecha_nacimiento' => Carbon::parse('1400-01-01'),
            'poderes'=> json_encode(['superfuerza']),
            'genero' => 'hombre',
            'descripcion' => 'Dios del trueno',
            'vengador' => "SI",
            'vehiculo_id' => 2
        ]);

        //ELOQUENT

        $superheroe = new Superheroe;

        $superheroe->nombre = 'Loki';
        $superheroe->edad = 100;
        $superheroe->fecha_nacimiento = Carbon::parse('1000-01-01');
        $superheroe->poderes = json_encode(['superfuerza', 'rapidez']);
        $superheroe->genero = 'hombre';
        $superheroe->descripcion = 'Un buen villano';
        $superheroe->vengador = 'SI';
        $superheroe->vehiculo_id = 3;
        $superheroe->save();

        //RAW (SQL BASIC INSERT)

        $poderesBatman = json_encode(['superfuerza', 'rapidez']);

        DB::unprepared("insert into superheroe (nombre, edad, fecha_nacimiento, poderes, genero, descripcion, vengador, vehiculo_id)
        values('Batman', 23, '1999-01-01', '$poderesBatman' , 'hombre', 'Un tío rico', 'NO', 4)");
    }
}
