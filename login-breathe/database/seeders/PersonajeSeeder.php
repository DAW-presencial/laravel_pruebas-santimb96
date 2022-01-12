<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class PersonajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personaje')->insert([
            'nombre'=> 'Spiderman',
            'edad' => 23,
            'nacionalidad'=> 'USA',
            "created_at" =>  date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s')
        ]);
    }
}
