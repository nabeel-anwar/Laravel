<?php

namespace App\View\Components;

use Illuminate\View\Component;

class userComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $title;
    public $body;
    public $footer;
    public function __construct($title,  $body, $footer)
    {
        $this->title = $title;
        $this->body = $body;
        $this->footer = $footer;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user-component');
    }

    public function addition($var) {
        return $var + 10;
    }
}
