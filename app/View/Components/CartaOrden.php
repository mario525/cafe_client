<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CartaOrden extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $value;
    public $href;


    public function __construct($value , $href ="/")
    {
        $this->value = $value;
        $this->href = $href;


    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.carta-orden');
    }
}
