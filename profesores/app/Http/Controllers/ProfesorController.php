<?php

namespace App\Http\Controllers;

use App\Http\Requests\PokemonRequest;
use App\Http\Requests\ProfesorRequest;
use App\Models\Alumno;
use App\Models\Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Locale;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $profesor = Profesor::select('*')->orderBy('id')->get()->toJson();
        $profesor = json_decode($profesor);
        return view('profesor.index', compact('profesor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create($lang = 'es')
    {
        /*App::setLocale($lang);
        session($lang);*/

        return view ('profesor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProfesorRequest $request)
    {

        $p = new Profesor;

        $p->nombre = $request->input('nombre');
        $p->asignatura = $request->input('asignatura');
        $p->contrato = $request->input('contrato');
        $p->save();

        return redirect()->route('profesor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        //$profesor = new Profesor;

        $profesor = Profesor::where('id', $id)->get();
        $profeAlumno = Profesor::find($id);

        $alumnosProfesor = $this->getAlumnos($profeAlumno);

        return view('profesor.show', [
           'profesor'=>$profesor,
           'alumnos'=>$alumnosProfesor
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id, $lang = 'es')
    {
        /*App::setLocale($lang);
        session($lang);*/

        $profesor = Profesor::where('id', $id)->first();

        return view('profesor.edit', compact('profesor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfesorRequest $request, $id)
    {
        $p = Profesor::find($id);

        $p->nombre = $request->input('nombre');
        $p->asignatura = $request->input('asignatura');
        $p->contrato = $request->input('contrato');
        $p->save();

        return redirect()->route('profesor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Profesor::destroy($id);

        return redirect()->route('profesor.index');
    }
    public function getAlumnos($profesor){
     $alumnos_id = $profesor->alumnos()->allRelatedIds()->toArray();
     $alumnos= [];

     foreach ($alumnos_id as $id){
         array_push($alumnos, Alumno::find($id));
     }
     return $alumnos;
    }

    public function lenguaje (Request $request) {

        App::setLocale($request->input('lengua'));
        session($request->input('lengua'));

        return redirect()->back();
    }
}
