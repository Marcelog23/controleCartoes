@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="titulo">
            <h4>Listagem de Cartões e Responsável</h4>
        </div>
        <hr>
        <table class="table table-responsive table-striped table-sm">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Cod. Barra</th>
                    <th>Responsável</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            @forelse($cartoes as $cartao)
                <tr>
                    <td>{{$cartao->id}}</td>
                    <td>{{$cartao->codg_barra}}</td>
                    <td>{{$cartao->responsavel->nm_responsavel}}</td>
                    <td>{{$cartao->status == 'NL' ? 'Não Lido' : 'Lido'}}</td>
                </tr>
            @empty
                <td colspan="4">Não existem registros</td>
            @endforelse
            </tbody>
        </table>
        {{$cartoes->links()}}
    </div>
@endsection





