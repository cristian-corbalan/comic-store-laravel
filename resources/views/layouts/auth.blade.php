<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comic store</title>

    {{--Icons--}}
    <link rel="stylesheet" href="{{url('css/icomoon.css')}}">

    <link rel="stylesheet" href="{{url('css/bulma.min.css')}}">
    <link rel="stylesheet" href="{{url('css/auth.css')}}">
</head>
<body>
<div id="container-all">
    <div id="section-left">
        <div>
            <h1 id="logo">Comic Store</h1>
            <p>Grandes historias te esperan</p>
            <p>Amamos los comics, y sabemos que tú también lo haces. Apúntate y no te pierdas de nada</p>
        </div>

        <div class="img-container">
            @if(Route::currentRouteName() === 'auth.login')
            <img src="{{url('img/auth/robin.png')}}" alt="Robin esquivando un ataque enemigo">
            @else
            <img src="{{url('img/auth/iron_man.png')}}" alt="Robin esquivando un ataque enemigo">
            @endif
        </div>
    </div>

    <main id="section-right">
        <h2 class="sr-only">@yield('sectionTitle', 'Ingresar')</h2>

        @yield('content')
    </main>
</div>
</body>
</html>
