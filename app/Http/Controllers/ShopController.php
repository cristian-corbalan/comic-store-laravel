<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class ShopController extends Controller
{
    public function add(): RedirectResponse
    {

        return redirect()->back()
            ->with('message', 'Petición realizada con éxito.')
            ->with('message_type', 'is-info');
    }
}
