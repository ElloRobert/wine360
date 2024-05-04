<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->is_active == 1) {
            return redirect()->intended($this->redirectPath());
        } else {
            $this->guard()->logout();
            $request->session()->invalidate();
            return redirect('/login')->withErrors(['active' => 'Vaš račun nije aktivan.']);
        }
    }
}
