<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Product extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $price;
    public $discountper;
    public $discountprice;
    public $image;
    public $id;



    public function __construct($id="0", $name, $price, $discountper=false, $discountprice=false, $image="assets/img/cafe3.jpg")
    {
        $this->name = $name;
        $this->price = $price;
        $this->discountper = $discountper;
        $this->discountprice = $discountprice;
        $this->image = $image;
        $this->id = $id;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product');
    }
}
