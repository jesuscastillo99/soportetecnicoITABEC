<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class Form0Controller extends Controller
{
    public function index(){
       
        return view('layouts-form.form0');
    }
}
