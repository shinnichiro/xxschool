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
}
