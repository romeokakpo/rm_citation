<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CitationController extends Controller
{
    public function index(){
        return view('admin.citations');
    }
    public function index_public(){
        return view('citation');
    }
    public function create(){
        return view('admin.citation_create');
    }
}
