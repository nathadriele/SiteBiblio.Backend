@extends('layouts.admin.index')

@section('conteudo')
    <h1>Categorias</h1>
    <div class="col-sm-6 mycol">
        {!! Form::open(['method'=>'POST', 'action'=> 'AdminCategoriasController@store']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nome:') !!}
            {!! Form::text('name', null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::submit('Criar Nova Categoria', ['class'=>'btn btn-primary btn-sm']) !!}
            <a href="{{route('admin.postsblog.create')}}"><button type="button" class="btn btn-secondary btn-sm">Cancelar</button></a>
        </div>
        {!! Form::close() !!}
    </div>

    <div class="col-sm-6">
        @if($categorias)
            <table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Nome</th>
                    <th>Criado em:</th>
                </tr>
                </thead>
                <tbody>

                @foreach($categorias as $categoria)
                    <tr>
                        <td>{{$categoria->id}}</td>
                        <td><a href="{{route('admin.categorias.edit', $categoria->id)}}">{{$categoria->name}}</a></td>
                        <td>{{$categoria->created_at ? $categoria->created_at->diffForHumans() : 'no date'}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        @endif
    </div>

@stop