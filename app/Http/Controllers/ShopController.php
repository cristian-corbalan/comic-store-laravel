<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class ShopController extends Controller
{
    /**
     * Redirects to the originating site with a message.
     *
     * @return RedirectResponse
     */
    public function add(): RedirectResponse
    {
        return redirect()->back()
            ->with('message', 'Petición realizada con éxito.')
            ->with('message_type', 'is-success');
    }
}
