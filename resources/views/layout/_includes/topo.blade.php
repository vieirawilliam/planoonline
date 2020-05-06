<!DOCTYPE html>
<html>

<head>
    <title>@yield('titulo')</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Meu CSS proprio -->
    <link rel="stylesheet" href="{{ url('site/css/style.css')}}">
</head>

<body>
    <header>
        <nav class="blue">
            <div class="nav-wrapper container">
                <a href="" class="brand-logo">Sistema MPLAN</a>
                <a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="/">Home</a></li>                                            
                    <li><a href=""> </a></li>
                    <li><a href="">Sair</a></li>
                </ul>
            </div>
        </nav>

        <ul class="sidenav" id="mobile">
            <li><a href="/">Home</a></li>
            
        </ul>

    </header>