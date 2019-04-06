@extends('layouts.app')

@section('content')
    <div class="container">
        <h4>Cadastro de cartões</h4>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {!! Form::open(['name' => 'form-post', 'route'=>'cartao.store']) !!}
                    <div class="input-group ">
                        <input type="text" class="form-control" placeholder="Informe a quantidade Máxima de Cartões" name="nrCartao" autofocus>
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