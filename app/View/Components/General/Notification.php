<?php

namespace App\View\Components\General;

use Illuminate\View\Component;

class Notification extends Component
{
    public $message;
    public $type;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($message, $type)
    {
        $this->message = $message;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.general.notification');
    }
}
