<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Flash;
use Illuminate\Http\Request;
use Socialite;

class AuthController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function login(Request $request, $provider)
    {
        if ($request->error) {
            Flash::error("Fail to authenticate using {$provider}: " . $request->error);

            return redirect('/');
        }

        $remoteUser = Socialite::driver($provider)->user();

        $user = User::where('email', '=', $remoteUser->email)->first();

        if (is_null($user)) {
            $user = User::create([
                'name'   => $remoteUser->name,
                'email'  => $remoteUser->email,
                'avatar' => $remoteUser->avatar,
            ]);
        }

        Auth::login($user);

        return redirect()->route('documents.index');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
