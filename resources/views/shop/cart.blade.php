@php
    /** @var \MercadoPago\Preference $preference */
    /** @var \App\Models\Comic[]|array $comics */
    /** @var \App\ShoppingCart\Cart $cart */
@endphp

@extends('layouts.website')

@push('js')
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        const mp = new MercadoPago('TEST-0a058d83-fd7f-4cf6-905b-0c736ea75640', {
            locale: 'es-AR'
        });

        mp.checkout({
            preference: {
                // MUY IMPORTANTE: No se olviden de poner las comillas alrededor del php.
                id: '{{ $preference->id }}'
            },
            render: {
                container: '#cart-btn',
                label: 'Comprar'
            }
        });
    </script>
@endpush

@section('content')
    <main id="main-cart">
        <section>
            <h2 class="title">Carrito de compras</h2>

            @if(count($cart->getItems()) > 0)
                <p class="subtitle">Listado de productos</p>

                <ul>
                    @foreach($cart->getItems() as $item)
                        <li>
                            <h3>
                                <a href="{{route('comics.details', ['comic' => $item->getProduct()->id])}}">{{$item->getProduct()->title}}</a>
                            </h3>

                            <p>Subtotal: USD ${{$item->getSubtotal()}}</p>

                            <form action="{{route('shop.set-quantity')}}" method="POST">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="id" value="{{$item->getProduct()->id}}">

                                <div class="field has-addons">
                                    <div class="control">
                                        <div class="select">
                                            <label>
                                                <span class="sr-only">Cantidad: </span>

                                                <select name="quantity">
                                                    <option>Seleccionar cantidad</option>
                                                    @for($i = 1; $i <= $item->getProduct()->stock; $i++)
                                                        <option value="{{$i}}"
                                                                @if($item->getQuantity() == $i) selected @endif >{{$i}}</option>
                                                    @endfor
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="control">
                                        <button class="button is-info">
                                            Aplicar
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <form action="{{route('shop.remove')}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <input type="hidden" name="id" value="{{$item->getProduct()->id}}">

                                <button class="button is-danger is-outlined">
                                    <span class="sr-only">Quitar producto</span>
                                    <span class="icon-trash"></span>
                                </button>
                            </form>
                        </li>
                    @endforeach
                </ul>

                <p class="total">Total a pagar: ${{$cart->getTotalAmount()}}</p>

                <div id="cart-btn"></div>

                <p class="empty"><a href="{{route('shop.empty')}}" class="has-text-grey">Vaciar carrito</a></p>

            @else
                <p>No hay productos agregados todavía</p>
            @endif
        </section>
    </main>
@endsection
