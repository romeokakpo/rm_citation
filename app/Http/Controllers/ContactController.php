<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{  
    public function abonner(){

        $Newsletter = \App\Models\Newsletter::create([
            'email' => request('email'),
        ]);
        return view('home');
        
    }
    public function contact(){

        $Message = \App\Models\Message::create([
            'pseudo'=> request('pseudo'),
            'email' => request('email'),
            'numero'=> request('numero'),
            'message'=> request('message'),
            
        ]);
        return view('home');
         
    }

    public function index(){
        return view('contact');
    }

    public function messages(Request $request){
        //
        return back()->with('success','true');
    }
}
