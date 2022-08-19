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
            $mesId = [];
            $myMessages = Message::where('user_id', \Auth::user()->id)->get();
            foreach ($myMessages as $key => $myMessage) {
                $mesId[$key] = $myMessage->id;
            }
            $messages = Message::where('user_id', \Auth::user()->id)->orWhere('notice', '1')->orWhereHas('messageTo',function($q) use($myMessages, $mesId) {
                $q->whereIn('message_to_id.to_id', $mesId);
            })->get()->sortByDesc('id');
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
        if (\Auth::user()->auth == 'User') {
            $message->closed = false;
        } else {
            $message->closed = true;
        }
        $message->save();

        if ($request->to_id != null) {
            $message->reply($request->to_id);
        }

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
        if ($request->closed != null) {
            $message->closed = $request->closed;
        }
        $message->save();

        return redirect(route('user.message.index'));
    }

    public function destroy($id) {
        $message = Message::find($id);
        $message->delete();

        return back();
    }
}
