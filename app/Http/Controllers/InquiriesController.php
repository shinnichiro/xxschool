<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;

class InquiriesController extends Controller
{
    public function index() {
        return view('inquiry.form');
    }

    public function create(Request $request) {
        $inquiry = new Inquiry();

        $inquiry->name = $request->name;
        $inquiry->email = $request->email;
        $inquiry->phone = $request->phone;
        $inquiry->content = $request->content;
        $inquiry->save();

        return view('inquiry.confirm',[
            'inquiry' => $inquiry,
        ]);
    }
}
