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
        $vehiculo = new Vehiculo;

        $vehiculo->nombre = 'Renault';
        $vehiculo->color = 'azul';
        $vehiculo->save();

        $vehiculo1 = new Vehiculo;

        $vehiculo1->nombre = 'Ferrari';
        $vehiculo1->color = 'rojo';
        $vehiculo1->save();

        $vehiculo2 = new Vehiculo;

        $vehiculo2->nombre = 'Alpine';
        $vehiculo2->color = 'azul';
        $vehiculo2->save();

        $vehiculo3 = new Vehiculo;

        $vehiculo3->nombre = 'Mercedes';
        $vehiculo3->color = 'negro';
        $vehiculo3->save();

    }
}
