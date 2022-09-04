<?php

namespace App\Http\Controllers;

use App\Models\Recent;
use App\Models\Video;
use Exception;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        return view('admin.videos', compact('videos'));
    }
    public function index_public()
    {
        $videos = Video::all();
        return view('video', compact('videos'));
    }
    public function create()
    {
        return view('admin.video_create');
    }

    public function store(Request $request)
    {
        Video::create(['link' => $request->link]);
        return back()->with('success', true);
    }

    public function delete_video(Request $request)
    {
        try {
            Video::where('id', $request->id)->delete();
            Recent::create(['type' => 'danger', 'content' => 'Suppression d\'une vidéo.']);
            return response()->json([
                'success' => true
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false
            ], 400);
        }
    }
}
