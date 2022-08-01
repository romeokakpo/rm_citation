<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view('home');
    }

    public function newsletter(){
        Newsletter::firstOrCreate([
            'email' => request('email'),
        ]);
        return back()->with('success','true');
    }
}
