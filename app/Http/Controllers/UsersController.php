<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {
        if (\Auth::check()) {
            return view('user.index');
        } else {
            return redirect(route('index'));
        }
    }
}
