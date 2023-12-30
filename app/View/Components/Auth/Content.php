<?php

namespace App\View\Components\Auth;

use Illuminate\View\Component;

class Content extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $styleClass;
    public function __construct($class = '')
    {
        $this->styleClass = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.auth.content');
    }
}
