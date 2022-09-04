<?php

namespace App\Http\Controllers;

use App\Models\Citation;
use App\Models\Newsletter;
use App\Models\Notification;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $citations = Citation::orderBy('id', 'desc')->paginate(4);
        return view('home', compact('citations'));
    }

    public function newsletter(Request $request)
    {
        $follower = Newsletter::where('email', $request->email)->first();

        if (!$follower) {
            $followers = Newsletter::create([
                'email' => $request->email,
            ]);
            //Générer une notification
            Notification::create([
                'description' => 'L\'adresse ' . $followers->email . ' s\'est abonnée à vous'
            ]);
        }
        return back()->with('success', 'true');
    }
}
