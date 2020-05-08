<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistema Mplan</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <topo titulo="Sistema Mplan" url="{{ url('/plano/principal') }}">            
            <li >
                <li>
                    <a href="{{ route('tblusu.index') }}">
                        USUÁRIOS
                    </a>                       
                </li>    
                <li>
                    <a href="#"  >
                        {{ auth()->guard('plano')->user()->usunome }} 
                    </a>
                </li>
                <li>
                    <a href="{{ route('login.logout') }}">
                        SAIR
                    </a>                       
                </li>
            </li>
        </topo>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>