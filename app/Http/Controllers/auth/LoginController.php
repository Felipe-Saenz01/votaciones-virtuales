<?php

namespace App\Http\Controllers\Auth;

use Laravel\Jetstream\Http\Controllers\Auth\LoginController as JetstreamLoginController;

class LoginController extends JetstreamLoginController
{
    protected function authenticated(Request $request, $user)
    {
        if ($user instanceof Sufragante) {
            return redirect()->route('sufragante.dashboard');
        }

        return redirect()->intended($this->redirectPath());
    }
}