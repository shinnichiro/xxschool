<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class TopicsController extends Controller
{
    public function show(Request $request) {
        if(!\Auth::check() || \Auth::user()->auth != 'Admin') {
            return redirect(route('user.index'));
        }

        $topics = Topic::all()->sortByDesc('id');

        if ($request->page == null) {
            $page = 1;
        } else {
            $page = $request->page;
        }

        return view('user.topics.show', [
            'topics' => $topics,
            'page' => $page,
        ]);
    }

    public function edit($id) {
        if(!\Auth::check() || \Auth::user()->auth != 'Admin') {
            return redirect(route('user.index'));
        }

        $topic = Topic::find($id);

        return view('user.topics.edit', [
            'topic' => $topic,
        ]);
    }

    public function store(Request $request) {
        if(!\Auth::check() || \Auth::user()->auth != 'Admin') {
            return redirect(route('user.index'));
        }

        $this->validate($request, [
            'content' => 'required|max:191',
        ]);

        $topic = Topic::find($request->id);
        $topic->content = $request->content;
        $topic->save();

        return redirect(route('user.topics.show'));
    }

    public function create(Request $request) {
        if(!\Auth::check() || \Auth::user()->auth != 'Admin') {
            return redirect(route('user.index'));
        }

        $this->validate($request, [
            'content' => 'required|max:191',
        ]);

        $topic = new Topic();
        $topic->content = $request->content;
        $topic->save();

        return redirect(route('user.topics.show'));
    }

    public function destroy($id) {
        if(!\Auth::check() || \Auth::user()->auth != 'Admin') {
            return redirect(route('user.index'));
        }

        $topic = Topic::find($id);
        $topic->delete();

        return redirect(route('user.topics.show'));
    }
}
