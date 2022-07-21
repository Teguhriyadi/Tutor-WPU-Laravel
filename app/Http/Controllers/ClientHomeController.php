<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ClientHomeController extends Controller
{
    public function index()
    {
        return view('client.home.index', ['user' => Auth::user()]);
    }
}
