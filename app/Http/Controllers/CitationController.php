<?php

namespace App\Http\Controllers;

use App\Models\Citation;
use Illuminate\Http\Request;

class CitationController extends Controller
{
    public function index(){ 
        return view('admin.citations');
    }
    public function index_public(){
        $citation = Citation::where('today',1)->first();
        $citations = Citation::where('today',0)->orderBy('id','desc')->get();
        return view('citation', compact('citations','citation'));
    }
    public function create(){
        return view('admin.citation_create');
    }
}
