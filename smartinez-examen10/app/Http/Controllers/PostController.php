<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Pokemon;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::select('*')->orderBy('id')->get()->toJson();
        $post = json_decode($post);

        return view('post.index', compact('post'));
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

        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostRequest $request)
    {
        $p = new Post;

        $p->titulo = $request->input('titulo');
        $p->extracto = $request->input('extracto');
        $p->contenido = $request->input('contenido');
        $p->caducable = $request->input('caducable') !== null ?$request->input('caducable'): false;
        $p->comentable = $request->input('comentable') !== null ?$request->input('comentable'): false;
        $p->acceso = $request->input('acceso');
        $p->fecha_publicacion = $request->input('fecha_publicacion');
        $p->user_id = Auth::user()->id;
        $p->save();

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        $post = Post::where('id', $id)->first();

        if(Auth::user()->id == $post->user_id){
            return view('post.edit', compact('post'));
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
    public function update(PostRequest $request, $id)
    {
        $p = Post::find($id);

        $p->titulo = $request->input('titulo');
        $p->extracto = $request->input('extracto');
        $p->contenido = $request->input('contenido');
        $p->caducable = $request->input('caducable') !== null ?$request->input('caducable'): false;
        $p->comentable = $request->input('comentable') !== null ?$request->input('comentable'): false;
        $p->acceso = $request->input('acceso');
        $p->fecha_publicacion = $request->input('fecha_publicacion');
        $p->user_id = Auth::user()->id;
        $p->save();

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Post::destroy($id);

        return redirect()->route('post.index');
    }
}
