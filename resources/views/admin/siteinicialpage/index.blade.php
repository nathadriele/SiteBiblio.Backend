@extends('layouts.admin.index')

@section('conteudo')

    <table class="table table-responsive-sm table-bordered">
        <thead>
        <tr class="top">
            <th scope="col">Você realmente deseja alterar a página inicial do site!</th>
        </tr>
        </thead>
        <tbody>
        @if($frente)
            @foreach($frente as $frentes)
                <tr>
                    <td>
                        <a href="{{route('admin.siteinicialpage.edit', $frentes->id)}}">
                            <button type="button" class="btn btn-primary btn-sm">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"> Clique para alterar página inicial</i>
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>
@stop