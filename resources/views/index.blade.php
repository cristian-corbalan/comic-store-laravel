@extends('layouts.website')


@section('content')
    <main>
        {{--Banner--}}
        {{--NOTE: transform to slider--}}
        <section id="banner">
            <div>
                @foreach(config('arrays.homeBannerImages') as $banner)
                    <img
                        src="{{url('img/banners/'.$banner["src"])}}"
                        alt="{{$banner['alt']}}"/>
                @endforeach
            </div>
        </section>

        {{--Popular products--}}
        {{--NOTE: transform to product carousel--}}
        <section id="popular-products">
            <p class="title is-5">Comics populares</p>
            <ul>
                @foreach($comics as $comic)
                    <li>
                        <x-comics.comic-product-item :comic="$comic"></x-comics.comic-product-item>
                    </li>
                @endforeach
            </ul>
        </section>

        {{--Pills--}}
        <section id="pills">
            <ul class="columns">
                <li class="column">
                    <p class="icon-only"><span class="icon-delivery-truck"></span>Envío</p>
                    <p>Envíos gratis a todo el pais</p>
                    <p>Envíos gratis de todos tus productos sin cargo adicional</p>
                </li>

                <li class="column">
                    <p class="icon-only"><span class="icon-credit-card"></span>Forma de pago</p>
                    <p>Pagos online</p>
                    <p>Aceptamos pagos con tarjeta de crédito y debito</p>
                </li>

                <li class="column">
                    <p class="icon-only"><span class="icon-stay-at-home"></span>Seguridad</p>
                    <p>#QuedateEnCasa</p>
                    <p>Te llevamos tu compra hasta la puerta de tu casa para que no tengas que salir</p>
                </li>
            </ul>
        </section>
    </main>
@endsection
