<?php

namespace App\Http\Controllers;

use App\Http\Requests\PokemonRequest;
use App\Models\Pokemon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $pokemon = Pokemon::select('*')->orderBy('id')->get()->toJson();
        $pokemon = json_decode($pokemon);

        return view('pokemon.index', [
            'pokemon'=>$pokemon
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('pokemon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PokemonRequest $request)
    {
        $pokemon = new Pokemon;

        $pokemon->nombre = $request->input('nombre');
        $pokemon->nivel = $request->input('nivel');
        $pokemon->fecha_capturado = $request->input('fecha_capturado');
        $pokemon->tipo = json_encode($request->input('tipo'));
        $pokemon->genero = $request->input('genero');
        $pokemon->descripcion = $request->input('descripcion');
        $pokemon->shiny = $request->input('shiny');
        $pokemon->user_id = Auth::user()->id;
        $pokemon->save();

        return redirect()->route('pokemons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $pokemon = Pokemon::where('id', $id)->get();

        return view ('pokemon.show', [
            'pokemon'=>$pokemon
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pokemon = Pokemon::where('id', $id)->first();

        return view('pokemon.edit', [
            'pokemon'=>$pokemon
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PokemonRequest $request, $id)
    {

        $pokemon = Pokemon::find($id);

        $pokemon->nombre = $request->input('nombre');
        $pokemon->nivel = $request->input('nivel');
        $pokemon->fecha_capturado = $request->input('fecha_capturado');
        $pokemon->tipo = json_encode($request->input('tipo'));
        $pokemon->genero = $request->input('genero');
        $pokemon->descripcion = $request->input('descripcion');
        $pokemon->shiny = $request->input('shiny');
        $pokemon->user_id = Auth::user()->id;
        $pokemon->save();

        return redirect()->route('pokemons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $pokemon = Pokemon::find($id);

        $pokemon->delete();

        return redirect()->route('pokemons.index');
    }
}
