<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminHomeController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.home.index', ['users' => $users]);
    }
}
