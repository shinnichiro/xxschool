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
        if (!\Auth::check()) {
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
        if (!\Auth::check()) {
            return view('user.index');
        }
        if ($request->id == null) {
            return redirect(route('user.auth'));
        }

        $this->validate($request, [
            'email' => 'regex:/^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/',
            'password' => 'max:191',
        ]);

        $user = User::find($request->id);
        if ($request->auth != null && \Auth::user()->auth == 'Admin') {
            $user->auth = $request->auth;
        }
        if ($request->email != null && \Auth::id() == $request->id) {
            $user->email = $request->email;
        }
        if ($request->password != null && \Auth::id() == $request->id) {
            $user->password = bcrypt($request->password);
        }
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
