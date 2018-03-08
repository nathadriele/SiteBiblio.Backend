@extends('layouts.admin.index')

@section('conteudo')
    @if(Session::has('create_user'))
        <p class="bg-success">{{session('create_user')}}</p>
    @endif

    @if(Session::has('update_user'))
        <p class="bg-success">{{session('update_user')}}</p>
    @endif

    @if(Session::has('deleted_user'))
        <p class="bg-success">{{session('deleted_user')}}</p>
    @endif

    <div class="btn-my-criar">
        <a href="{{route('admin.users.create')}}"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#criarusuario">Criar novo usuário </button></a>
    </div>

    <table class="table table-responsive-sm table-bordered">
        <thead>
        <tr class="top">
            <th scope="col"><i class="fa fa-address-book" aria-hidden="true"></i></th>
            <th scope="col">Foto</th>
            <th scope="col">Nome</th>
            <th scope="col">Função</th>
            <th scope="col">Status</th>
            <th scope="col">Alterar/Deletar</th>
        </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users as $user)
                <tr>
                    <td scope="row">{{$user->id}}</td>
                    <td><img height="45" class="img-circle" src="{{$user->foto ? $user->foto->file : 'http://placehold.it/400x400'}}" alt="" ></td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->is_active == 1 ? 'Ativo' : 'Inativo'}}</td>
                    <td>
                        <a href="{{route('admin.users.edit', $user->id)}}"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editarusuario"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#excluirusuario"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>

    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
        {{$users->render()}}
    </div>

    <!-- Modal -->
    <div class="modal fade" id="excluirusuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Excluir Usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    Você realmente deseja excluir usuário!
                </div>
                <div class="modal-footer">
                    {{--<button type="button" class="btn btn-danger btn-sm">Excluir Usuário</button>--}}
                    {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminUsersController@destroy', $user->id]]) !!}
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                        {!! Form::submit('Excluir Post', ['class'=>'btn btn-danger btn-sm']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop