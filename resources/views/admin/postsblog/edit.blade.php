@extends('layouts.admin.index')

@section('conteudo')
    @include('includes.form-alert')

    <!-- Modal -->
    <div class="content-crud">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar Post</h5>
        </div>
        <div class="modal-body my">
            {!! Form::model($post, ['method'=>'PATCH', 'action'=> ['AdminPostsController@update', $post->id], 'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('categoria_id', 'Categoria:') !!}
                {!! Form::select('categoria_id', [''=>'Escolha a Categoria'] + $categorias, null, ['class'=>'form-control'])!!}
                {{--  {!! Form::select('category_id', array(1=>'Php', 0=>'javascript'), null, ['class'=>'form-control'])!!}  --}}
            </div>
            <div class="form-group">
                {!! Form::label('foto_id', 'Foto:') !!}
                {!! Form::file('foto_id', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('title', 'Título:') !!}
                {!! Form::text('title', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('body', 'Texto:') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control'])!!}
            </div>
            <div class="modal-footer">
                <a href="{{route('admin.postsblog.index')}}"><button type="button" class="btn btn-secondary btn-sm">Cancelar</button></a>
                {!! Form::submit('Editar Post', ['class'=>'btn btn-primary btn-sm']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </section>
    <!-- /.content -->

@stop