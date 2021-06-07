<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comic store</title>

    {{--Icons--}}
    <link rel="stylesheet" href="{{url('css/icomoon.css')}}">

    <link rel="stylesheet" href="<?=url('css/website.css')?>">
    <link rel="stylesheet" href="<?=url('css/bulma.min.css')?>">
</head>
<body>
<header>
    <div>
        <div>
            <a href="#" class="menu-sh-btn icon-only"><span class="icon-bars"></span>Abrir</a>

            <h1 id="logo">Comic store</h1>
        </div>

        @auth()
            <a href="#" class="button">Registrarse</a>
        @else
            <a href="#" class="button">Ingresar</a>
        @endauth
    </div>

    <nav>
        <a href="#" class="menu-sh-btn icon-only"><span class="icon-close"></span>Cerrar</a>

        <a class="logo">Comic store</a>

        <ul>
            @foreach(config('arrays.websiteNavLinks') as $link)
                <li><a href="{{route($link['routeName'])}}">{{$link['text']}}</a></li>
            @endforeach
        </ul>
    </nav>
</header>

@yield('content')

<footer>
    <div class="columns">
        <nav class="column">
            <p class="title is-6">Navegación</p>

            <ul>
                <li><a href="{{route('home')}}">Inicio</a></li>
                <li><a href="{{route('home')}}">Comics</a></li>
            </ul>
        </nav>

        <div class="column">
            <div class="mb-3">
                <p class="title is-6">Formas de pago</p>
                <ul class="images">
                    @foreach(config('arrays.paymentMethods') as $paymentMethod)
                        <li>
                            <img
                                src="{{url('img/payment-methods/'.$paymentMethod["src"])}}"
                                alt="{{$paymentMethod['alt']}}"/>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div>
                <p class="title is-6">Formas de envío</p>
                <ul class="images">
                    @foreach(config('arrays.shippingMethods') as $shippingMethods)
                        <li>
                            <img
                                src="{{url('img/shipping-methods/'.$shippingMethods["src"])}}"
                                alt="{{$shippingMethods['alt']}}"/>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="column">
            <p class="title is-6">Contacto</p>
            <ul class="contacto">
                <li>
                    <span class="icon-whatsapp"></span>
                    <span class="bold">Teléfono: </span>
                    <a href="#">15 11 3031-4041</a>
                </li>
                <li>
                    <span class="icon-email"></span>
                    <span class="bold">Email: </span>
                    <a href="#">comic.store@gmail.com</a>
                </li>
                <li>
                    <span class="icon-location"></span>
                    <span class="bold">Dirección: </span>
                    Av. Calle falsa 246 Buenos Aires - Argentina
                </li>
            </ul>
        </div>

        <div class="column">
            <p class="title is-5">Seguimos conectados</p>
            <ul class="social-networks">
                <li>
                    <a href="#" class="icon-only">
                        <span class="icon-twitter"></span>
                        Twitter
                    </a>
                </li>
                <li>
                    <a href="#" class="icon-only">
                        <span class="icon-facebook"></span>
                        Facebook
                    </a>
                </li>
                <li>
                    <a href="#" class="icon-only">
                        <span class="icon-instagram"></span>
                        Instagram
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div>
        <p>Copyright © Comics Store - 2021. Todos los derechos reservados</p>
    </div>
</footer>

<script src="{{url('js/main.js')}}"></script>
</body>
</html>
