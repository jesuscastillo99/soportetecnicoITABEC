<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ActivationController extends Controller
{
    public function activate($token)
    {
        $user = User::where('activation_token', $token)->first();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Token de activación inválido.');
        }

        $user->update([
            'active' => true,
            'activation_token' => null,
        ]);

        auth()->login($user);

        return view('auth.activation-success'); // Vista después de la activación
    }
}