<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehiculoRequest;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculo = Vehiculo::select('*')->orderBy('id')->get()->toJson();
        $vehiculo = json_decode($vehiculo);
        return view('vehiculo.index', compact('vehiculo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create($lang = 'es')
    {
        App::setlocale($lang);
        session($lang);

        return view('vehiculo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(VehiculoRequest $request)
    {
        $v = new Vehiculo;

        $v->nombre = $request->input('nombre');
        $v->modelo = $request->input('modelo');
        $v->color = $request->input('color');
        $v->km = $request->input('km');
        $v->save();

        return redirect()->route('vehiculo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehiculo = Vehiculo::where('id', $id)->get();

        return view('vehiculo.show', compact('vehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id, $lang = 'es')
    {
        App::setlocale($lang);
        session($lang);

        $v = Vehiculo::where('id', $id)->first();

        return view('vehiculo.edit', compact('v'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(VehiculoRequest $request, $id)
    {
        $v = Vehiculo::find($id);

        $v->nombre = $request->input('nombre');
        $v->modelo = $request->input('modelo');
        $v->color = $request->input('color');
        $v->km = $request->input('km');
        $v->save();

        return redirect()->route('vehiculo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
         Vehiculo::destroy($id);

        return redirect()->route('vehiculo.index');
    }
}
