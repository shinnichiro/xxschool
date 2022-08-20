<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Score;

class ScoresController extends Controller
{
    public function index() {
        if (!\Auth::check()) {
            return redirect(route('index'));
        } else if (\Auth::user()->auth == 'User') {
            return redirect(['route' => ['user.score.show', 'id' => \Auth::user()->id]]);
        }

        $users = User::all();

        return view('user.score.index', [
            'users' => $users,
        ]);
    }

    public function show(Request $request) {
        if (!\Auth::check()) {
            return redirect(route('index'));
        }

        $scores = Score::where('user_id', $request->id)->get()->sortByDesc('id');
        $user = User::find($request->id);

        return view('user.score.show', [
            'scores' => $scores,
            'id' => $request->id,
            'user' => $user,
        ]);
    }

    public function create(Request $request) {
        if (!\Auth::check()) {
            return redirect(route('index'));
        } else if (\Auth::user()->auth == 'User') {
            return redirect(['route' => ['user.score.show', 'id' => \Auth::user()->id]]);
        }

        $score = new Score();
        $score->user_id = $request->id;
        $score->subject = $request->subject;
        $score->score = $request->score;
        $score->save();

        return redirect(route('user.score.show', [
            'id' => $request->id,
        ]));
    }

    public function edit($id) {
        if (!\Auth::check()) {
            return redirect(route('index'));
        } else if (\Auth::user()->auth == 'User') {
            return redirect(['route' => ['user.score.show', 'id' => \Auth::user()->id]]);
        }

        $score = Score::find($id);

        return view('user.score.edit', [
            'score' => $score,
        ]);
    }

    public function store(Request $request) {
        if (!\Auth::check()) {
            return redirect(route('index'));
        } else if (\Auth::user()->auth == 'User') {
            return redirect(['route' => ['user.score.show', 'id' => \Auth::user()->id]]);
        }

        $score = Score::find($request->id);
        $score->subject = $request->subject;
        $score->score = $request->score;
        $score->save();

        return redirect(route('user.score.show', [
            'id' => $score->user_id,
        ]));
    }

    public function destroy($id) {
        if (!\Auth::check()) {
            return redirect(route('index'));
        } else if (\Auth::user()->auth == 'User') {
            return redirect(['route' => ['user.score.show', 'id' => \Auth::user()->id]]);
        }

        $score = Score::find($id);
        $user_id = $score->user_id;
        $score->delete();

        return redirect(route('user.score.show', [
            'id' => $user_id,
        ]));
    }
}
