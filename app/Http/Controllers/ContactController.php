<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {
        return view('contact');
    }

    public function messages(Request $request)
    {
        if ($request->pseudo) {
            Message::create([
                'pseudo' => $request->pseudo,
                'email' => $request->email,
                'numero' => $request->numero,
                'message' => $request->message,
            ]);
        } else {
            Message::create([
                'email' => $request->email,
                'numero' => $request->numero,
                'message' => $request->message,
            ]);
        }

        return back()->with('success', 'true');
    }
}
