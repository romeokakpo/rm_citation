<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatnerController extends Controller
{
    public function index(){
        return view('admin.patner');
    }
    public function index_public(){
        return view('patner');
    }
    public function create(){
        return view('admin.patner_create');
    }
}
