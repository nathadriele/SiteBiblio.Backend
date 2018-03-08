@extends('layouts.admin.index')

@section('conteudo')
    @if(Session::has('create_post'))
        <p class="bg-success">{{session('create_post')}}</p>
    @endif

    @if(Session::has('update_post'))
        <p class="bg-success">{{session('update_post')}}</p>
    @endif

    @if(Session::has('deleted_post'))
        <p class="bg-success">{{session('deleted_post')}}</p>
    @endif

    <div class="btn-my-criar">
        <a href="{{route('admin.postsblog.create')}}"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#criarpost">Criar novo post</button></a>
    </div>

    <table class="table table-responsive-sm table-bordered">
        <thead>
        <tr class="top">
            <th scope="col"><i class="fa fa-address-book" aria-hidden="true"></i></th>
            <th scope="col">Autor</th>
            {{--<th scope="col">Categoria</th>--}}
            <th scope="col">Categoria</th>
            <th scope="col">Mídia</th>
            <th scope="col">Título</th>
            <th scope="col">Post</th>
            <th scope="col">Criação</th>
            <th scope="col">Alterar/Deletar</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    {{--<td><a href="{{route('admin.postsblog.edit', $post->id)}}">{{$post->user->name}}</a></td>--}}
                    <td>{{$post->user->name}}</td>
                    {{--<td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>--}}
                    <td>{{$post->categoria->name}}</td>
                    <td><img height="50" src="{{$post->foto ? $post->foto->file : 'http://placehold.it/400x400' }} " alt=""></td>
                    <td>{{$post->title}}</td>
                    {{--<td>{{str_limit($post->body, 30)}}</td>--}}
                    <td><a href="{{--{{route('home.post', $post->slug)}}--}}">Ver Post</a></td>
                    <td>{{$post->created_at->diffForhumans()}}</td>
                    {{--<td>{{$post->updated_at->diffForhumans()}}</td>--}}
                    <td>
                        <a href="{{route('admin.postsblog.edit', $post->id)}}"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editarpost"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#excluirpost"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
        {{$posts->render()}}
    </div>

    </section>
    <!-- /.content -->

    <!-- Modal -->
    <div class="modal fade" id="excluirpost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Excluir Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    Você realmente deseja excluir o post!
                </div>
                <div class="modal-footer">
                    {{--<button type="button" class="btn btn-danger btn-sm">Excluir Usuário</button>--}}
                    {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminPostsController@destroy', $post->id]]) !!}
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                        {!! Form::submit('Excluir Usuário', ['class'=>'btn btn-danger btn-sm']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop