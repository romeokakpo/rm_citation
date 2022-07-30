<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MusiqueController extends Controller
{
    public function index(){
        return view('admin.music');
    }
    public function index_public(){
        return view('musique');
    }
    public function create(){
        return view('admin.music_create');
    }
}
