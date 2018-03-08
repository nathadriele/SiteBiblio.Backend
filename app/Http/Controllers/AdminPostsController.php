<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Foto;
use App\Http\Requests\PostsCreateRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(3);
        return view('admin.postsblog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::pluck('name','id')->all();
        return view('admin.postsblog.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        $input = $request->all();
        $user = Auth::user();

        if($file = $request->file('foto_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $foto = Foto::create(['file'=>$name]);
            $input['foto_id'] = $foto->id;
        }

        $user->posts()->create($input);
        Session::flash('create_post','O Post foi criado!');
        return redirect('/admin/postsblog');
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categorias = Categoria::pluck('name','id')->all();
        return view('admin.postsblog.edit', compact('post','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        if($file = $request->file('foto_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $foto = Foto::create(['file'=>$name]);
            $input['foto_id'] = $foto->id;
        }

        Auth::user()->posts()->whereId($id)->first()->update($input);

        Session::flash('update_post','O Post foi editado!');
        return redirect('/admin/postsblog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        unlink(public_path() . $post->foto->file);
        $post->delete();
        Session::flash('deleted_post','O Post foi excluido!');
        return redirect('/admin/postsblog');
    }

    public function post($slug){
        $post = Post::findBySlugOrFail($slug);
        return view('post', compact('post'));
    }
}
