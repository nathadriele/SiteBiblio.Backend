<?php

namespace App\Http\Controllers;

use App\Foto;
use App\Http\Requests\UsersEditRequest;
use App\Http\Requests\UsersRequest;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /* retorna a view do index de users. */
    public function index()
    {
        //$users = User::all();
        $users = User::paginate(3);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','id')->all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $input = $request->all();
        // User::create($request->all());
        // return redirect('/admin/users');

        if($file = $request->file('foto_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $foto = Foto::create(['file'=>$name]);
            $input['foto_id'] = $foto->id;
        }

        $input['password'] = bcrypt($request->password);
        User::create($input);

        Session::flash('create_user','O usuário foi criado!');
        return redirect('/admin/users');
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
        $user = User::findOrFail($id);
        $roles = Role::pluck('name','id')->all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        $user = User::findOrFail($id);

        if(trim($request->password) == ''){
            $input = $request->except('password');
        } else{
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }

        if($file = $request->file('foto_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $foto = Foto::create(['file'=>$name]);
            $input['foto_id'] = $foto->id;
        }

        $user->update($input);
        Session::flash('update_user','O usuário foi editado!');
        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        unlink(public_path() . $user->foto->file);
        $user->delete();
        Session::flash('deleted_user','O usuário foi excluido!');
        return redirect('/admin/users');
    }
}
