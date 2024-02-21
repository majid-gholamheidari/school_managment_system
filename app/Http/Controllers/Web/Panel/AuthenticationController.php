<?php

namespace App\Http\Controllers\Web\Panel;

use App\Http\Requests\Panel\Auth\SignInRequest;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends MainController
{

    public function signIn()
    {
        if (Auth::check())
            return redirect()->route('panel.sa.dashboard');
        return view('panel.authentication.sign-in');
    }

    public function doSignIn(SignInRequest $request)
    {
        if (!Auth::attempt(['username' => $request->username, 'password' => $request->password]))
            return redirect()->back()->withErrors('اطلاعات وارد شده صحیح نمی باشد.');

        return $this->redirectToUserDashboard();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.sign-in');
    }
}
