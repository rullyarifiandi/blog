<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Navigation extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $navigation = [
            ['nama' => 'Beranda', 'url' => 'posts', 'route' => 'posts.index'],
        ];

        return view('layouts.navigation', compact('navigation'));
    }
}
