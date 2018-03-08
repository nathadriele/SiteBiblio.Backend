@extends('layouts.admin.index')

@section('conteudo')
    <h1>Categorias</h1>

    <div class="col-sm-6 mycol">
        {!! Form::model($categoria, ['method'=>'PATCH', 'action'=> ['AdminCategoriasController@update', $categoria->id]]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nome:') !!}
            {!! Form::text('name', null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::submit('Editar Categoria', ['class'=>'btn btn-primary btn-sm col-sm-6 ']) !!}
        </div>
        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminCategoriasController@destroy', $categoria->id]]) !!}

        <div class="form-group">
            {!! Form::submit('Excuir Categoria', ['class'=>'btn btn-danger btn-sm col-sm-6']) !!}
        </div>
        {!! Form::close() !!}
    </div>

    <div class="col-sm-6"></div>
@stop