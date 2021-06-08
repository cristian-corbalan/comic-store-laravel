<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panel de control - Comic store</title>

    {{--Icons--}}
    <link rel="stylesheet" href="{{url('css/icomoon.css')}}">

    {{--Styles--}}
    <link rel="stylesheet" href="{{url('css/bulma.min.css')}}">
    <link rel="stylesheet" href="{{url('css/control-panel.css')}}">
</head>
<body>
<div id="container-all">
    {{--@if(Session::has('message'))
        <x-general.notification message="{{Session::get('message')}}" type="{{Session::get('message_type') ?? 'is-danger'}}"></x-general.notification>
    @endif--}}
    <header id="side-nav">
        <div>
            <h1 id="logo" lang="en">Comic store</h1>

            <a href="#" class="menu-sh-btn icon-only"><span class="icon-close"></span>Cerrar menú</a>
        </div>


        <nav>
            <p>Administración</p>

            <ul>
                @foreach(config('arrays.controlPanelLinksAdmin') as $link)
                    <li>
                        <a href="{{route($link['routeName'])}}">
                            <span class="{{$link['iconClass']}}"></span>
                            {{$link['text']}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </header>

    <main>
        <header id="top-bar">
            <div>
                <a href="#" class="menu-sh-btn icon-only"><span class="icon-bars"></span>Abrir menú</a>
                <h2>@yield('sectionTitle', 'Tablero')</h2>
            </div>

            <div class="dropdown is-right is-small" id="user-dropdown">
                <div class="dropdown-trigger">
                    <button class="button" aria-haspopup="true" aria-controls="dropdown-menu6">
                        <span>Opciones</span>
                        <span class="icon-cheveron-down"></span>
                    </button>
                </div>

                <div class="dropdown-menu" id="dropdown-menu6" role="menu">
                    <div class="dropdown-content">
                        <a href="{{route('home')}}" class="dropdown-item">Ir a la tienda</a>

                        <hr class="dropdown-divider">

                        <a href="#" class="dropdown-item has-text-danger is-flex is-align-items-center">
                            <span class="icon is-small mr-2">
                                <span class="icon-logout"></span>
                            </span>
                            Salir
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <div id="content" class="@yield('contentClass', 'default')">
            @yield('content')
        </div>
    </main>
</div>

<script src="{{url('js/control-panel-main.js')}}"></script>
</body>
</html>
