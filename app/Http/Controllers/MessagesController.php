<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessagesController extends Controller
{
    public function index() {
        if (\Auth::user()->auth != 'User') {
            $messages = Message::all()->sortByDesc('id');
        } else {
            $messages = Message::where('user_id', \Auth::user()->id)->orWhere('to_id', \Auth::user()->id)->orWhere('notice', '1')->get()->sortByDesc('id');
        }

        return view('user.message.index', [
            'messages' => $messages,
        ]);
    }

    public function create(Request $request) {
        $message = new Message();
        $message->user_id = \Auth::user()->id;
        $message->content = $request->content;
        if ($request->notice == null) {
            $message->notice = false;
        } else {
            $message->notice = $request->notice;
        }
        $message->closed = false;
        $message->to_id = \Auth::user()->id;        //仮
        $message->save();

        return redirect(route('user.message.index'));
    }

    public function show($id) {
        $message = Message::find($id);

        return view('user.message.show', [
            'message' => $message,
        ]);
    }

    public function store(Request $request) {
        $message = Message::find($request->id);
        $message->content = $request->content;
        $message->save();

        return redirect(route('user.message.index'));
    }

    public function destroy($id) {
        $message = Message::find($id);
        $message->delete();

        return back();
    }
}
