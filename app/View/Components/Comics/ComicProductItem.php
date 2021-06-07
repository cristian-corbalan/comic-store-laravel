<?php

namespace App\View\Components\Comics;

use Illuminate\View\Component;

class ComicProductItem extends Component
{
    public $comic;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($comic)
    {
        $this->comic = $comic;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.comics.comic-product-item');
    }
}
