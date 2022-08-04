<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index(){
        $videos = Video::all();
        return view('admin.videos', compact('videos'));
    }
    public function index_public(){
        $videos = Video::all();
        return view('video', compact('videos'));
    }
    public function create(){
        return view('admin.video_create');
    }
}
