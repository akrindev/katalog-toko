<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Validation\Rules;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


    // update akun
    public function settingAccount()
    {
        $user = Auth::user();

        return view('auth.setting', compact('user'));
    }

    public function updateSettingAccount()
    {
        $user = User::find(auth()->id());

        // update hanya nama dan email user

        $data = request()->validate([
            'name'  => 'required',
            'email' => 'required|string|email'
        ]);

        $user->update($data);

        session()->flash('success', 'Akun di perbarui');

        return \back();
    }

    public function updatePassword()
    {
        $user = User::find(auth()->id());

        request()->validate([
            'current_password' => ['required', Rules\Password::min(8)],
            'password' => ['required', 'confirmed', Rules\Password::min(8)],
        ]);

        if (Auth::attempt(['email' => $user->email, 'password' => request()->current_password])) {
            $user->update([
                'password' => Hash::make(\request()->password),
            ]);
        }

        \request()->session()->regenerate();

        session()->flash('success', 'password telah di ubah');

        return \back();
    }
}
