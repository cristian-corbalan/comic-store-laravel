<?php

namespace App\Http\Controllers;

use App\Repositories\HistoryRepository;

class ControlPanelController extends Controller
{
    protected $historyRepository;

    public function __construct(HistoryRepository $historyRepository){
        $this->historyRepository = $historyRepository;
    }

    public function home()
    {
        $history = $this->historyRepository->getAll(10);

        return view('control-panel.index', compact('history'));
    }
}
