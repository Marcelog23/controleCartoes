{{--@extends('aplicacao.template')--}}
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
                    @forelse($ultimosLidos as $ultimo)
                        <ul>
                            <li>Id : {{$ultimo->id}}</li>
                            <li>Código Barra : {{$ultimo->codg_barra}}</li>
                            <li>Hora da leitura : {{\Carbon\Carbon::parse($ultimo->updated_at)->format('d/m/Y h:i:s')}}</li>
                        </ul>
                    @empty
                        <p class="text-danger">Não existem registros</p>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['name' => 'form-search', 'route'=>'cartao.index']) !!}
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Insira o Código de Barras"
                       aria-label="Recipient's username" aria-describedby="button-addon2" name="filtro" autofocus>
                <span class="input-group-btn">
                       <button class="btn btn-success" type="submit">Ler Cartão</button>
                </span>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>


<div class="container-fluid">

    <div class="row">
        @foreach($cartoes as $cartao)
            <div class="col-lg-3">
                <div class="panel text-center">
                    <div class="panel-body">
                        <h5 class="panel-title">{{$cartao->id}}</h5>
                        <p class="text-center">
                            {!! DNS1D::getBarcodeHTML($cartao->codg_barra, "EAN13") !!}
                        </p>
                        <p>
                            {{$cartao->codg_barra}}
                        </p>

                        <p class="text-center ">{{$cartao->status == 'NL' ? 'Não Lido' : 'Lido'}}</p>

                    </div>
                </div>
            </div>
        @endforeach

    </div>
    {{ $cartoes->links()}}
</div>

@endsection
