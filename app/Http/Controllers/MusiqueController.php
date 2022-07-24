<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MusiqueController extends Controller
{
    public function index(){
        return view('musique');
    }
}
