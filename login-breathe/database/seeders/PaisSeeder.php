<?php

namespace Database\Seeders;

//use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*DB::table('paises')->insert([
            'codigoISO3'=> 'PRU',
            'codigoISO2'=> 'PR',
            'cod_numerico' => 00,
            'nombre' => 'Pruebas'
        ]);*/
        //$path = public_path('paises.sql');

        $sql = database_path('paises.sql');

        DB::unprepared(file_get_contents($sql));
    }
}
