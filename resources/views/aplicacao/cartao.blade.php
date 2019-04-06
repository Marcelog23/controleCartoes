<!doctype html>
<html lang=pt-BR>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista dos Cartões</title>

</head>
    <body>

        <div class="row">
            @foreach($cartoes as $cartao)
                <img src="{{ asset('image/cartao.jpeg') }}"  style="width: 341px; height: 189px;"  />
                <div>
                    <p>{!! DNS1D::getBarcodeHTML($cartao->codg_barra, "EAN13") !!}</p>
                    <p>{{ $cartao->codg_barra }}</p>
                </div>
            @endforeach
        </div>

    </body>
</html>