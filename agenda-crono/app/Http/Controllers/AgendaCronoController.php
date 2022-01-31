<?php

namespace App\Http\Controllers;

use App\Models\AgendaCrono;
use Illuminate\Http\Request;

class AgendaCronoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $contacto = AgendaCrono::select('*')->orderBy('id')->get()->toJson();
        $contacto = json_decode($contacto);

        return view('agenda.index', [
            'contacto'=>$contacto
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('agenda.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $contacto = new AgendaCrono;

        $contacto->nombre = $request->input('nombre');
        $contacto->edad = $request->input('edad');
        $contacto->genero = $request->input('genero');
        $contacto->fdn = $request->input('fdn');

        $contacto->save();

        return redirect()->route('agenda.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $contacto = AgendaCrono::where('id', $id)->get();

        return view('agenda.show', [
            'contacto'=> $contacto
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
        $contacto = AgendaCrono::where('id', $id)->first();
        return view('agenda.edit', [
            'contacto'=>$contacto
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $contacto = AgendaCrono::find($id);

        //$contacto = new AgendaCrono;

        $contacto->nombre = $request->input('nombre');
        $contacto->edad = $request->input('edad');
        $contacto->genero = $request->input('genero');
        $contacto->fdn = $request->input('fdn');

        $contacto->save();

        return redirect()->route('agenda.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $contacto = AgendaCrono::where('id', $id)->first();
        $contacto->delete();
        return redirect()->route('agenda.index');
    }
}
