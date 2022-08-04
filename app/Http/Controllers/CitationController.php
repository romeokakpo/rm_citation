<?php

namespace App\Http\Controllers;

use App\Models\Citation;
use App\Models\Recent;
use Exception;
use Illuminate\Http\Request;

class CitationController extends Controller
{
    public function index(){ 
        $citations = Citation::orderBy('id','desc')->get();
        return view('admin.citations', compact('citations'));
    }

    public function index_public(){
        $citation = Citation::where('today',1)->first();
        $citations = Citation::where('today',0)->orderBy('id','desc')->get();
        return view('citation', compact('citations','citation'));
    }
    public function download(Request $request)
    {
        $max = Citation::count();
        try {
            $request->validate([
                'id' => 'bail|numeric|required|min:0|max:'.$max.''
            ]);
            $citation = Citation::where('id', $request->id)->first();
            $citation->increment('download');
            Recent::create(['type'=>'success','content'=>'La citation '.$citation->id.' a été téléchargée '.$citation->download.' fois.']);
           return response()->json([
                'success' => true,
                'data' => [
                    'download' => $citation->download,
                ],
                'message' => 'DONE'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }
    public function create(){
        return view('admin.citation_create');
    }
}
