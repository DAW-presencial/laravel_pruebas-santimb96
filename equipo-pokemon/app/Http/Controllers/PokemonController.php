<?php

namespace App\Http\Controllers;

use App\Http\Requests\PokemonRequest;
use App\Models\Pokemon;
use Illuminate\Support\Facades\App;
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
    public function create($lang = 'es')
    {
        App::setLocale($lang);
        session($lang);


           //dd(Auth::user());

           if(Auth::user() || Auth::user() !== null){
               if(Auth::user()->role == 'admin'){
                   return view('pokemon.create');
               } else {
                   abort(401);
               }
           } else {
               abort(401);
           }

        //return view('pokemon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PokemonRequest $request)
    {
        //dd($request->file('fichero')->getClientOriginalName());

        if($request->hasFile('fichero')) {
            $nombre_fichero = $request->file('fichero')->getClientOriginalName();
            $request->file('fichero')->storeAs('public/image', $nombre_fichero);

        $pokemon = new Pokemon;

        $pokemon->nombre = $request->input('nombre');
        $pokemon->nivel = $request->input('nivel');
        $pokemon->fecha_capturado = $request->input('fecha_capturado');
        $pokemon->tipo = json_encode($request->input('tipo'));
        $pokemon->genero = $request->input('genero');
        $pokemon->descripcion = $request->input('descripcion');
        $pokemon->shiny = $request->input('shiny');
        $pokemon->user_id = Auth::user()->id;
        $pokemon->fichero = $nombre_fichero;
        $pokemon->save();


        //RAW
         /*   DB::unprepared("insert into pokemons (nombre, nivel, fecha_capturado, tipo, genero, descripcion, shiny, user_id, fichero)
        values('Batman', 23, '1999-01-01', json_encode($request->input('tipo')) , 'masculino', 'Un tío rico', 'f', Auth::user()->role, $nombre_fichero)");*/

            //QUERYBUILDER

            /*DB::table('pokemons')->insert([
                'nombre'=>'Empoleon',
                'nivel'=>45,
                'fecha_capturado'=>Carbon::now('Europe/Madrid'),
                'tipo'=>json_encode(['agua', 'acero']),
                'genero'=>'masculino',
                'descripcion'=>'Pokemon de tipo agua y acero',
                'shiny'=>true,
                'user_id'=>1
            ]);*/
        return redirect()->route('pokemons.index');
        }
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
        $currentPokemon = Pokemon::find($id);
        $user = $currentPokemon->users;



                return view ('pokemon.show', [
                    'pokemon'=>$pokemon,
                    'user'=>$user
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

        App::setLocale($lang);
        session($lang);

        if(Auth::user() || Auth::user() !== null){
            if(Auth::user()->role == 'admin'){
                $pokemon = Pokemon::where('id', $id)->first();
                return view('pokemon.edit', compact('pokemon'));
            } else {
                abort(401);
            }
        } else {
            abort(401);
        }

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


        if ($request->hasFile('fichero')) {
            $nombre_fichero = $request->file('fichero')->getClientOriginalName();
            $request->file('fichero')->storeAs('public/image', $nombre_fichero);


            $pokemon = Pokemon::find($id);

            $pokemon->nombre = $request->input('nombre');
            $pokemon->nivel = $request->input('nivel');
            $pokemon->fecha_capturado = $request->input('fecha_capturado');
            $pokemon->tipo = json_encode($request->input('tipo'));
            $pokemon->genero = $request->input('genero');
            $pokemon->descripcion = $request->input('descripcion');
            $pokemon->shiny = $request->input('shiny');
            $pokemon->user_id = Auth::user()->id;
            $pokemon->fichero = $nombre_fichero;
            $pokemon->save();

            return redirect()->route('pokemons.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if(Auth::user() || Auth::user() !== null){
            if(Auth::user()->role){
                $pokemon = Pokemon::find($id);
                $pokemon->delete();
                return redirect()->route('pokemons.index');
            } else {
                abort(401);
            }
        } else {
            abort(401);
        }
    }
}
