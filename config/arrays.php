<?php

return [
    'controlPanelLinksAdmin' => [
        [
            'routeName' => 'control-panel.home',
            'text' => 'Tablero',
            'iconClass' => 'icon-dashboard',
        ],
        [
            'routeName' => 'control-panel.comics.list',
            'text' => 'Comics',
            'iconClass' => 'icon-comics',
        ],
        [
            'routeName' => 'control-panel.users.list',
            'text' => 'Usuarios',
            'iconClass' => 'icon-users',
            'can' => 'view users',
        ],
    ],
    'websiteNavLinks' => [
        [
            'routeName' => 'home',
            'text' => 'Inicio'
        ],
        [
            'routeName' => 'comics.list',
            'text' => 'Comics'
        ],
        [
            'routeName' => 'control-panel.home',
            'text' => 'Intranet',
            'authRequired' => true,
            'can' => 'view control panel',
        ],
    ],
    'homeBannerImages' => [
        [
            'src' => 'banner_1.jpg',
            'alt' => 'Increíbles descuentos hasta fin de semana',
            'routeName' => 'comics.list',
        ],
//        [
//            'src' => 'banner_2.jpg',
//            'alt' => '70% de descuento en el comic Batman: Urban Legends #1',
//        ],
    ],
    'paymentMethods' => [
        [
            'src' => 'american_express.png',
            'alt' => 'Tarjeta American express',
        ],
        [
            'src' => 'banelco.png',
            'alt' => 'Tarjeta Banelco',
        ],
        [
            'src' => 'cabal.png',
            'alt' => 'Tarjeta Cabal',
        ],
        [
            'src' => 'cencosud.png',
            'alt' => 'Tarjeta Cencosud',
        ],
        [
            'src' => 'diners_club.png',
            'alt' => 'Tarjeta Diners club',
        ],
        [
            'src' => 'mastercard.png',
            'alt' => 'Tarjeta Mastercard',
        ],
        [
            'src' => 'mercado_pago.png',
            'alt' => 'Tarjeta Mercado pago',
        ],
        [
            'src' => 'naranja.png',
            'alt' => 'Tarjeta Naranja',
        ],
        [
            'src' => 'pago_facil.png',
            'alt' => 'Tarjeta Pago fácil',
        ],
        [
            'src' => 'rapipago.png',
            'alt' => 'Tarjeta Rapipago',
        ],
        [
            'src' => 'shopping.png',
            'alt' => 'Tarjeta Shopping',
        ],
        [
            'src' => 'visa.png',
            'alt' => 'Tarjeta Visa',
        ],
    ],
    'shippingMethods' => [
        [
            'src' => 'correo_argentino.png',
            'alt' => 'Correo argentino',
        ],
        [
            'src' => 'oca.png',
            'alt' => 'OCA',
        ],
    ],
];
