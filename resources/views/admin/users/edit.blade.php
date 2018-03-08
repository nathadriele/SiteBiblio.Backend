@extends('layouts.admin.index')

@section('conteudo')
    @include('includes.form-alert')

    <div class="content-crud">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar Usuário</h5>
        </div>
        <div class="modal-body my">
            {!! Form::model($user, ['method'=>'PATCH', 'action'=> ['AdminUsersController@update', $user->id],'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('foto_id', 'Foto:') !!}
                {!! Form::file('foto_id', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('name', 'Nome:') !!}
                {!! Form::text('name', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::text('email', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('role_id', 'Função:') !!}
                {!! Form::select('role_id', [''=>'Esconha a Função'] + $roles , null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('is_active', 'Status:') !!}
                {!! Form::select('is_active', array(1 => 'Ativo', 0=> 'Inativo'), null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Senha:') !!}
                {!! Form::password('password', ['class'=>'form-control'])!!}
            </div>
            <div class="modal-footer">
                <a href="{{route('admin.users.index')}}"><button type="button" class="btn btn-secondary btn-sm">Cancelar</button></a>
                {!! Form::submit('Editar Usuário', ['class'=>'btn btn-primary btn-sm']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@stop