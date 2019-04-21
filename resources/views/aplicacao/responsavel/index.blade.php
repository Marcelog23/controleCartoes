@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="titulo">
            <h4>Listagem de Responsável</h4>
            <a class="btn btn-sm btn-primary" href="{{route('responsavel.create')}}">Gera Responsável</a>
        </div>
        <hr>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>N° Inicial</th>
                    <th>N° Final</th>
                </tr>
            </thead>
            <tbody>
            @forelse($responsaveis as $responsavel)
                <tr>
                    <td>{{$responsavel->id}}</td>
                    <td>{{$responsavel->nm_responsavel}}</td>
                    <td>{{$responsavel->nr_inicial}}</td>
                    <td>{{$responsavel->nr_final}}</td>
                </tr>
            @empty
                <td colspan="4">Não existem registros</td>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection