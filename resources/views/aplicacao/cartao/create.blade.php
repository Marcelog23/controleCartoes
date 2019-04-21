@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="titulo">
            <h4>Manutenção de cartões</h4>
            <a class="btn btn-sm btn-danger" href="{{route('cartao.index')}}">Voltar</a>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::open(['name' => 'form-post', 'route'=>'cartao.store']) !!}
                    <div class="input-group ">
                        {!! Form::number('nrCartao', null, ['class'=> 'form-control', 'required', 'placeholder' => 'Informe a quantidade Máxima de Cartões']) !!}
                        <span class="input-group-btn">
                             <button class="btn btn-success" type="submit">Gerar</button>
                         </span>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection