<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(LoginRequest $request)
    {
        $request->authenticate('admin');

        $request->session()->regenerate();

        if ($request->user()->role == 'admin') {
            return redirect()->route('admin.user.index');
        }

        return redirect()->intended(route('admin.user.index'));
    }
}
