<?php

namespace Database\Seeders;

use App\Models\Vehiculo;
use Illuminate\Database\Seeder;

class VehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $v = new Vehiculo;

        $v->nombre = 'Renault';
        $v->modelo = 'R25';
        $v->color = 'azul';
        $v->km = 40;
        $v->user_id = 1;
        $v->save();
    }
}
