@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="titulo">
            <h4>Listagem de Cartões </h4>
            <a class="btn btn-sm btn-primary" href="{{route('cartao.create')}}">Gera Cartão</a>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        Total de Cartões Lidos
                    </div>
                    <div class="panel-body">
                        <p class="card-text">{{$totalCartaoBaixado}} de {{$totalCartao}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        Últimos 3 cartões lidos
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-sm">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Código Barra</th>
                                <th>Data/Hora Leitura</th>
                                <th class="text-center">Retornar</th>
                            </tr>
                            </thead>
                            @forelse($ultimosLidos as $ultimo)
                                <tbody>
                                <tr>
                                    <td>{{$ultimo->id}}</td>
                                    <td>{{$ultimo->codg_barra}}</td>
                                    <td>{{\Carbon\Carbon::parse($ultimo->updated_at)->format('d/m/Y H:i:s')}}</td>
                                    <td class="text-center"><a title="Retorna o cartão para status de 'Não Lido' "
                                                               href="{{route('cartao.restore', $ultimo->id)}}"> <i
                                                    class="fas fa-undo-alt" aria-hidden="true"></i> </a></td>
                                </tr>
                                </tbody>
                            @empty
                                <tfoot>
                                <td class="text-danger" colspan="4">Não existem registros</td>
                                </tfoot>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="well well-sm">
                    {!! Form::open(['name' => 'form-search', 'route' => 'cartao.edit']) !!}
                    <div class="input-group">

                        {!! Form::text('filtro', null, ['class' => 'form-control', 'placeholder' => 'Insira o Código de Barras', 'required']) !!}
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="submit">Ler Cartão</button>
                        </span>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


    {{--
        <div class="container-fluid">
            <div class="row">
                @foreach($cartoes as $cartao)
                    <div class="col-lg-3">
                        <div class="panel">
                            <div class="panel-body">
                                <p class="panel-title text-center">{{$cartao->id}}</p>
                                <p class="text-center">{!! DNS1D::getBarcodeHTML($cartao->codg_barra, "EAN13") !!}</p>
                                <p class="text-center">{{$cartao->codg_barra}}</p>
                                <p class="text-center">{{$cartao->status == 'NL' ? 'Não Lido' : 'Lido'}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $cartoes->links()}}
        </div>--}}
@endsection