<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use function view;

/**
 * This component handles all about login and creating new users
 */
class Login extends Component
{
    /** @var int states which the component can be in */
    const StateLogin = 1;
    const StateCreateAccount = 2;

    /** @var int the current of the component */
    public int $state = self::StateLogin;

    /** @var string the user name */
    public string $name = '';
    /** @var string the user email */
    public string $email = '';
    /** @var string the user password */
    public string $password = '';

    /** @var string[] rules for email and password, should be in the Model/User */
    protected array $rules = [
        'email' => 'required|email',
        'password' => 'required|string|min:2',
    ];

    /**
     * The login of the user with provider credentials. Signal parent component on success
     * @return void
     */
    public function login()
    {
        $this->validate();
        $authenticated = Auth::attempt(['email' => $this->email, 'password' => $this->password], true);
        if (!$authenticated) {
            $this->addError('authorize', 'Authentication failed');
        }
        else {
            $this->emitUp('loginDone');
        }
    }

    /**
     * Change state to create account
     * @return void
     */
    public function createAccount()
    {
        $this->state = self::StateCreateAccount;
    }

    /**
     * Persistent and login the new user and signal to parent component the success of this
     * @return void
     */
    public function save()
    {
        $this->validate(['name' => 'required|string|min:2']);
        $this->validate();

        if (User::where('email', $this->email)->count() >= 1) {
            $this->add('email', 'Email already exists');
            return;
        }

        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->save();
        $user->refresh();
        Auth::login($user, true);
        $this->emitUp('loginDone');
        $this->state = self::StateLogin;
        $this->name = $this->email = $this->password = '';
    }

    /**
     * Change state back to login
     * @return void
     */
    public function cancel()
    {
        $this->state = self::StateLogin;
        $this->name = $this->email = $this->password = '';
    }

    /**
     * Render according to state
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        if ($this->state == self::StateCreateAccount) {
            return view('livewire.create-account');
        }
        return view('livewire.login');
    }
}
