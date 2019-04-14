@extends('layouts.app')

@section('content')
    <div class="container ">
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
                                        <td>ID</td>
                                        <td>Código Barra</td>
                                        <td>Data/Hora Leitura</td>
                                        <td class="text-center">Retornar</td>
                                    </tr>
                                </thead>
                                @forelse($ultimosLidos as $ultimo)
                                <tbody>
                                    <tr>
                                        <td>{{$ultimo->id}}</td>
                                        <td>{{$ultimo->codg_barra}}</td>
                                        <td>{{\Carbon\Carbon::parse($ultimo->updated_at)->format('d/m/Y H:i:s')}}</td>
                                        <td class="text-center"> <a title="Retorna o cartão para status de 'Não Lido' " href="{{route('cartao.restore', $ultimo->id)}}"> <i class="fas fa-undo-alt" aria-hidden="true"></i> </a> </td>
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
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="well well-sm">
                    {!! Form::open(['name' => 'form-search', 'route' => 'cartao.edit']) !!}
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Insira o Código de Barras"
                               aria-label="Recipient's username" aria-describedby="button-addon2" name="filtro"
                               autofocus>
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