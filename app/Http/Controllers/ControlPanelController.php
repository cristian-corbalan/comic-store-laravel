<?php

namespace App\Http\Controllers;

use App\Repositories\HistoryRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ControlPanelController extends Controller
{
    /** @var HistoryRepository */
    protected $historyRepository;

    /**
     * ControlPanelController constructor.
     * @param HistoryRepository $historyRepository
     */
    public function __construct(HistoryRepository $historyRepository){
        $this->historyRepository = $historyRepository;
    }

    /**
     * View with control panel home.
     *
     * @return Application|Factory|View
     */
    public function home()
    {
        $history = $this->historyRepository->getAll(10);

        return view('control-panel.index', compact('history'));
    }
}
