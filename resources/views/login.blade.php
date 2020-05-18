<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login MPLAN</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <topo titulo="" url="">
        </topo>
        <pagina tamanho="4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif    
            <painel titulo="LOGIN">
                <div>
                    <div>
                        <form class="" action="{{route('login.login')}}" method="post">
                            {{ csrf_field() }}

                            <div class="input-field form-row form-group">
                                
                                <input class="form-control espacoInput" type="text" name="usunome" placeholder="Digite seu usuário" >
                                
                            </div>
                            
                            <div  class="input-field form-row form-group">
                                <input class="form-control espacoInput" type="password" name="ususenha" placeholder="Digite sua senha">
                            </div>
                            
                            <button class="btn btn-primary"> Entrar </button>
                        </form>
                    </div>
                </div>
            </painel>
        </pagina>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>