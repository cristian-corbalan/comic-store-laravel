window.addEventListener('DoMContentLoaded', function () {
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
});
