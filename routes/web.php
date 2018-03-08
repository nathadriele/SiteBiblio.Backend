<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/* chama autorização */
Auth::routes();

/* retorna o index do site. */
Route::get('/home', 'HomeController@index')->name('home');

/* grupo de rotas, com o mediador admin. */
Route::group(['middleware'=>'admin'], function(){
    /* retorna o index de admin. */
    Route::get('/admin', function(){
        return view('admin.dashboard.index');
    });

    /* retorna o index de users, seu create e edit. */
    Route::resource('/admin/users', 'AdminUsersController',['names'=>[
        'index'=>'admin.users.index',
        'create'=>'admin.users.create',
        'edit'=>'admin.users.edit'
    ]]);

    /* retorna o index de postsblog, seu create e edit. */
    Route::resource('/admin/postsblog', 'AdminPostsController',['names'=>[
        'index'=>'admin.postsblog.index',
        'create'=>'admin.postsblog.create',
        'edit'=>'admin.postsblog.edit'
    ]]);

    Route::resource('/admin/categorias', 'AdminCategoriasController',['names'=>[
        'index'=>'admin.categorias.index',
        'create'=>'admin.categorias.create',
        'edit'=>'admin.categorias.edit'
    ]]);

    Route::resource('/admin/siteinicialpage', 'AdminSiteinicialpageController',['names'=>[
        'index'=>'admin.siteinicialpage.index',
        'create'=>'admin.siteinicialpage.create',
        'edit'=>'admin.siteinicialpage.edit'
    ]]);
});
