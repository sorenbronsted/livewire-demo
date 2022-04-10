<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

/**
 * This components controls the whole application at the top level
 */
class Index extends Component
{
    private string $currentComponent;

    /** @var string[]  */
    protected $listeners = ['loginDone'];

    /**
     * Signal that the login is done and successful
     * @return void
     */
    public function loginDone()
    {
        $this->currentComponent = Main::class;
    }

    /**
     * This is only called once
     * @return void
     */
    public function mount()
    {
        $this->setComponent();
    }

    /**
     * This is called on every request
     * @return void
     */
    public function hydrate()
    {
        $this->setComponent();
    }

    /**
     * The component render
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.index', ["component" => $this->currentComponent]);
    }

    /**
     * Set component according to state of the user
     * @return void
     */
    private function setComponent()
    {
        if (Auth::check()) {
            $this->currentComponent = Main::class;
        }
        else {
            $this->currentComponent = Login::class;
        }
    }
}
