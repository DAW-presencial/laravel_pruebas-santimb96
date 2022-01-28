<?php

namespace App\Http\Controllers;

use App\Models\Superheroe;
use Illuminate\Http\Request;

class SuperheroeController extends Controller
{
    /*public function __construct(){
        $this->middleware('auth', ['except' => ['index']]);
    }*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $superheroe = Superheroe::select('*')->orderBy('id')->get()->toJson();
        $superheroe = json_decode($superheroe);

        //dd($usuario);

        return view('superheroe.index', [
            'superheroe' => $superheroe
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('superheroe.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $superheroe = new Superheroe;

        return $this->extracted($request, $superheroe);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Superheroe  $superheroe
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $superheroe = Superheroe::where('id', $id)->get();

        return view('superheroe.show', ['superheroe'=>$superheroe]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Superheroe  $superheroe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $superheroe = Superheroe::where('id', $id)->first();

        return view('superheroe.edit', ['superheroe'=>$superheroe]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Superheroe  $superheroe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $superheroe = Superheroe::find($id);


        return $this->extracted($request, $superheroe);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Superheroe  $superheroe
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $superheroe = Superheroe::find($id);

        $superheroe->delete();

        return redirect()->route('home.index');
    }

    /**
     * @param Request $request
     * @param $superheroe
     * @return \Illuminate\Http\RedirectResponse
     */
    public function extracted(Request $request, $superheroe): \Illuminate\Http\RedirectResponse
    {
        $superheroe->nombre = $request->input('nombre');
        $superheroe->edad = $request->input('edad');
        $superheroe->fecha_nacimiento = $request->input('fecha_nacimiento');
        $superheroe->poderes = $request->input('poderes');
        $superheroe->genero = $request->input('genero');
        $superheroe->descripcion = $request->input('descripcion');
        $superheroe->vengador = $request->input('vengador');
        $superheroe->save();

        return redirect()->route('home.index');
    }
}
