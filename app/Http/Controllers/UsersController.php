<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index() {
        if (\Auth::check()) {
            return view('user.index');
        } else {
            return redirect(route('index'));
        }
    }

    public function auth() {
        if (!\Auth::check() || \Auth::user()->auth != 'Admin') {
            return view('user.index');
        }

        $users = User::all();

        return view('user.auth.index', [
            'users' => $users,
        ]);
    }

    public function show(Request $request) {
        if (!\Auth::check() || \Auth::user()->auth != 'Admin') {
            return view('user.index');
        }
        if ($request->id == null) {
            return redirect(route('user.auth'));
        }

        $user = User::find($request->id);

        return view('user.auth.show', [
            'user' => $user,
        ]);
    }

    public function store(Request $request) {
        if (!\Auth::check() || \Auth::user()->auth != 'Admin') {
            return view('user.index');
        }
        if ($request->id == null) {
            return redirect(route('user.auth'));
        }

        $user = User::find($request->id);
        $user->auth = $request->auth;
        $user->save();

        return redirect(route('user.auth'));
    }

    public function destroy($id) {
        if (!\Auth::check() || \Auth::user()->auth != 'Admin') {
            return view('user.index');
        }
        if ($request->id == null) {
            return redirect(route('user.auth'));
        }

        $user = User::find($id);
        $user->delete();

        return direct(route('user.auth'));
    }
}
