<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Tag extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $tags;
    public $blog;
    public function __construct($tags, $blog = null)
    {
        $this->tags = $tags;
        $this->blog = $blog;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.tag');
    }
}
