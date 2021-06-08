<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class ControlPanelController extends Controller
{
    public function home()
    {
        $history = History::with('user')->take(10)->get();

        return view('control-panel.index', compact('history'));
    }
}
