@extends('layouts.app')

@section('content')
<div class="container">
    <div class="titulo">
        <h4>Manutenção de Responsável </h4>
        <a class="btn btn-sm btn-danger" href="{{route('responsavel.index')}}">Voltar</a>
    </div>
    <hr>
    {!! Form::open(['name' => 'form-search', 'route' => 'responsavel.store', 'method' => 'post']) !!}
    <div class="col-md-6">
        <div class="form-group input-group col-md-12">
            <label for="responsavel_id">Nome Responsável</label>
            {!! Form::text('nm_responsavel', null, ['class'=> 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group input-group">
            <label for="nr_inicial">N° Iicial</label>
            {!! Form::number('nr_inicial', null, ['class'=> 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group input-group">
            <label for="nr_final">N° Final</label>
            {!! Form::number('nr_final', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <span class="input-group-btn"><button class="btn btn-success" type="submit">Cadastrar</button></span></div>
    {!! Form::close() !!}

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