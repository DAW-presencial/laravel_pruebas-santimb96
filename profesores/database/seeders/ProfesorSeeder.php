<?php

namespace Database\Seeders;

use App\Models\Profesor;
use Illuminate\Database\Seeder;

class ProfesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        ['nombre', 'asignatura', 'contrato'];

        $p = new Profesor;

        $p->nombre = 'Rafael';
        $p->asignatura = 'Servidor';
        $p->contrato = true;
        $p->save();

        $p2 = new Profesor();

        $p2->nombre = 'Toni';
        $p2->asignatura = 'Cliente';
        $p2->contrato = true;
        $p2->save();
    }
}
