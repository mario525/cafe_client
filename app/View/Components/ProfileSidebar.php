<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProfileSidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $name;
    public $url;
    public $url2;
    public $href;

    public function __construct($url, $name, $href, $url2="nada")
    {
        $this->name = $name;
        $this->url = $url;
        $this->href = $href;
        $this->url2 = $url2;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.profile-sidebar');
    }
}
