<?php

namespace Database\Seeders;

use App\Models\Alumno;
use Illuminate\Database\Seeder;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = new Alumno;

        $a->nombre = 'Santi';
        $a->edad = 25;
        $a->save();

        $a2 = new Alumno;

        $a2->nombre = 'Kim';
        $a2->edad = 22;
        $a2->save();
    }
}
