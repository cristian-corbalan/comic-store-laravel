<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function home(){
        $comics = Comic::with('cover', 'brand')->take(5)->get();

        return view('index', compact('comics'));
    }
}
