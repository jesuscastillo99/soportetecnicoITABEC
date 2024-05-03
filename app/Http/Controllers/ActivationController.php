<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Redirector;

class ActivationController extends Controller
{
    public function activate($token)
    {
        $user = Usuario::where('act_token', $token)->first();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Token de activación inválido.');
        }

        $user->update([
            'activo' => 1,
            'act_token' => 0,
        ]);

        auth()->login($user);

        return view('layouts-form.form0'); // Vista después de la activación
    }
}