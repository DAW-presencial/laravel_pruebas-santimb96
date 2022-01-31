<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AgendaCronoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacto')->insert([
            'nombre'=> 'Belén',
            'edad'=> 22,
            'genero' => 'femenino',
            'fdn'=> Carbon::parse('1999-06-17')
        ]);
    }
}
