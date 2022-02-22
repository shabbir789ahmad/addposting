<?php

namespace App\View\Components;

use Illuminate\View\Component;

class product-component extends Component
{
    $users;
    $data;
    $type;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($data,$user,$type)
    {
        $this->data=$data;
        $this->users=$users;
        $this->type=$type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product-component');
    }
}
