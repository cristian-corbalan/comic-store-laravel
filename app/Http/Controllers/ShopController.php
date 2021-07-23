<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class ShopController extends Controller
{
    public function add(): RedirectResponse
    {
        return redirect()->back()
            ->with('message', 'Petición realizada con éxito.')
            ->with('message_type', 'is-info');
    }
}
