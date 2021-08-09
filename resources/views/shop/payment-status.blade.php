@extends('layouts.website')

@section('content')
    <main id="main-payment-status">
        <section>
            @switch($status)
                @case('success')
                <h2>Compra realizada con éxito</h2>
                <p>Muchas gracias por confiar en nosotros, esperamos que nos sigas seleccionando en el futuro</p>
                <a href="{{route('home')}}" class="button">Volver al inicio</a>
                @break

                @case('pending')
                <h2>Pago todavía pendiente</h2>
                <p>Aun no recibimos el pago, pero lo estamos esperando 😎</p>
                <p>Mientras tanto puedes ver otros productos pulsando el botón de aquí abajo</p>
                <a href="{{route('comics.list')}}" class="button">Ir al listado de cómics</a>
                @break

                @case('failed')
                <h2>Hubo un error</h2>
                <p>No pudimos procesar el pago, inténtelo de nuevo más tarde.</p>
                <a href="{{route('home')}}" class="button">Volver al inicio</a>
                @break
            @endswitch
        </section>
    </main>
@endsection
