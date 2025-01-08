<?php

namespace App\View\Components\Auth;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\View\Component;

class Navbar extends Component
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
        return view('components.auth.navbar', [
            'pending' => User::whereNull('email_verified_at')->count(),
        ]);
    }
}
