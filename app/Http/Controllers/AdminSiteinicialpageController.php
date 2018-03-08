<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inicial;
use App\Foto;
use App\Banner;
use App\Http\Requests\SiteInicialPageRequest;
use Illuminate\Support\Facades\Auth;

class AdminSiteinicialpageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $frente = Inicial::all();
        return view('admin.siteinicialpage.index', compact('frente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        if($file = $request->file('foto_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $foto = Foto::create(['file'=>$name]);
            $input['foto_id'] = $foto->id;
        }

        Inicial::create($input);
        Banner::create($input);
        return redirect('/admin/siteinicialpage');
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
        $frentes = Inicial::findOrFail($id);
        $banners = Banner::findOrFail($id);
        return view('admin.siteinicialpage.edit', compact('frentes', 'banners'));
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

        $frentes = Inicial::findOrFail($id);
        $banners = Banner::findOrFail($id);

        if($file = $request->file('foto_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $foto = Foto::create(['file'=>$name]);
            $input['foto_id'] = $foto->id;
        }

        $frentes->update($input);
        $banners->update($input);
        return redirect('/admin/siteinicialpage/1/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
