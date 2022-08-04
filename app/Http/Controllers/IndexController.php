<?php

namespace App\Http\Controllers;

use App\Models\Citation;
use App\Models\Message;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $citations = Citation::orderBy('id','desc')->paginate(4);
        return view('home', compact('citations'));
    }

    public function newsletter(Request $request){
        
        Newsletter::firstOrCreate([
            'email' => $request->email,
        ]);
        return back()->with('success','true');
    }
}
