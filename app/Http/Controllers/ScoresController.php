<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Score;
use phpDocumentor\Reflection\PseudoTypes\True_;

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

        if (\Auth::user()->auth == 'User' && \Auth::id() != $request->user_id) {
            return redirect(route('index'));
        }

        if ($request->id == null) {
            return redirect(route('user.index'));
        }

        $scores = Score::where('user_id', $request->id)->get()->sortByDesc('id');
        $user = User::find($request->id);
        if ($request->page == null) {
            $page = 1;
        } else {
            $page = $request->page;
        }

        return view('user.score.show', [
            'scores' => $scores,
            'id' => $request->id,
            'user' => $user,
            'page' => $page,
        ]);
    }

    public function create(Request $request) {
        if (!\Auth::check()) {
            return redirect(route('index'));
        } else if (\Auth::user()->auth == 'User') {
            return redirect(['route' => ['user.score.show', 'id' => \Auth::user()->id]]);
        }

        $this->validate($request, [
            'id' => 'required',
            'subject' => 'required|max:191',
            'score' => ['required', 'regex:/^(100|[1-9]?[0-9])$/'],                   //0-100点までしか想定していません
        ]);

        $user = User::find($request->id);

        $score = new Score();
        $score->user_id = $request->id;
        $score->subject = $request->subject;
        $score->score = $request->score;
        $score->save();

        return redirect(route('user.score.show', [
            'id' => $request->id,
            'user' => $user,
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

        $this->validate($request, [
            'subject' => 'required|max:191',
            'score' => ['required', 'regex:/^(100|[1-9]?[0-9])$/'],
        ]);

        $score = Score::find($request->id);
        $score->subject = $request->subject;
        $score->score = $request->score;
        $score->save();

        $user = User::find($score->user->id);

        return redirect(route('user.score.show', [
            'id' => $score->user_id,
            'user' => $user,
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
