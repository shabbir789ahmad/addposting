<?php

namespace App\View\Components\card;

use Illuminate\View\Component;

class card2 extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $product;
    public function __construct($product)
    {
        $this->product=$product;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

       $product= $this->product;
        return view('components.card.card2',compact('product'));
    }
}
