<?php

namespace App\Http\Livewire;

use Livewire\Component;

/**
 * This is the main application which keeps track of the selected menu and render the corresponding component.
 * The menu is found in config/menu.php
 */
class Main extends Component
{
    /** @var int selected menu */
    public int $selected = 0;

    /**
     * Select the menu by idx
     * @param int $idx
     * @return void
     */
    public function select(int $idx)
    {
        $this->selected = $idx;
    }

    /**
     * Render according to selected menu
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.main', ['items' => config('menu')]);
    }
}
