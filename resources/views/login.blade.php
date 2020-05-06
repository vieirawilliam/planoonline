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
            <painel titulo="LOGIN">
                <div>
                    <div>
                        <form class="" action="{{route('login.login')}}" method="post">
                            {{ csrf_field() }}

                            <div class="input-field">
                                <input type="text" name="usunome">
                                <label>Usuário</label>
                            </div>

                            <div class="input-field">
                                <input type="password" name="ususenha">
                                <label>Senha</label>
                            </div>

                            <button class="btn blue"> Entrar </button>
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