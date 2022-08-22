<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Models\Topic;

class InquiriesController extends Controller
{
    public function home() {
        $topics = Topic::all()->sortByDesc('id');

        return view('index', [
            'topics' => $topics,
        ]);
    }

    public function topics() {
        $topics = Topic::all()->sortByDesc('id');

        return view('topics', [
            'topics' => $topics,
        ]);
    }

    public function index() {
        return view('inquiry.form');
    }

    public function create(Request $request) {
        $this->validate($request, [
            'name' => 'max:191|required',
            'email' => 'max:191|required',
            'content' => 'max:191|required',
        ]);

        $inquiry = new Inquiry();

        $inquiry->name = $request->name;
        $inquiry->email = $request->email;
        $inquiry->content = $request->content;
        $inquiry->closed = false;
        $inquiry->save();

        return view('inquiry.confirm',[
            'inquiry' => $inquiry,
        ]);
    }

    public function show() {
        if (\Auth::user()->auth != 'Admin') {
            return redirect(route('user.index'));
        }

        $inquiries = Inquiry::all()->sortby('closed');

        return view('user.inquiry.show', [
            'inquiries' => $inquiries,
        ]);
    }

    public function store($id) {
        if (\Auth::user()->auth != 'Admin') {
            return redirect(route('user.index'));
        }

        $inquiry = Inquiry::find($id);
        $inquiry->closed = true;
        $inquiry->save();

        return back();
    }
}
