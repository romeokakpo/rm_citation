<?php

namespace App\Http\Controllers;

use App\Models\Citation;
use App\Models\Recent;
use Exception;
use Illuminate\Http\Request;

class CitationController extends Controller
{
    public function index()
    {
        $citations = Citation::orderBy('id', 'desc')->get();
        return view('admin.citations', compact('citations'));
    }

    public function index_public($n = 1)
    {
        $n = intval($n);
        if ($n <= 0) return back();

        $all = ceil((Citation::count() - 1) / 10);
        if ($n > $all)
            $n = $all;

        $citation = Citation::where('today', 1)->first();
        $citations = Citation::where('today', 0)->orderBy('id', 'desc')->offset(($n - 1) * 10)->limit(10)->get();
        return view('citation', compact('citations', 'citation', 'n', 'all'));
    }

    public function download(Request $request)
    {
        $max = Citation::orderBy('id', 'desc')->first()->id;
        try {
            $request->validate([
                'id' => 'bail|numeric|required|min:1|max:' . $max . ''
            ]);
            $citation = Citation::where('id', $request->id)->first();
            $citation->increment('download');
            Recent::create(['type' => 'success', 'content' => 'La citation ' . $citation->id . ' a été téléchargée ' . $citation->download . ' fois.']);
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

    public function create()
    {
        return view('admin.citation_create');
    }

    public function store(Request $request)
    {
        try {
            $citation = new Citation;

            $citation->texte = $request->texte ?? '';

            if ($request->today) {
                Citation::where('today', 1)->first()->update(['today' => 0]);
                $citation->today =  1;
            }
            $filename = 'rm_citation_' . now()->format('Y-m-d_H-i-s.') . $request->image->extension();

            $citation->file = '/storage/' . $request->image->storeAs(config('citations.path'), $filename, 'public');

            $citation->save();
            Recent::create(['type' => 'success', 'content' => 'Vous avez ajouté une citation.']);
            return back()->with('success', true);
        } catch (Exception $e) {
            return back()->with('error', true);
        }
    }

    public function delete_quote(Request $request)
    {
        try {
            if (Citation::count() == 1) {
                //Une citation restante
                return response()->json([
                    'success' => false
                ], 400);
            }
            $citation = Citation::where('id', $request->id)->first();
            $filename = $citation->file;

            if ($citation->today) {
                Citation::where('today', 0)->orderBy('id', 'desc')->first()->update(['today' => 1]);
            }

            //Supprimer du serveur
            unlink(public_path($filename));

            $citation->delete();
            Recent::create(['type' => 'danger', 'content' => 'Suppression d\'une citation.']);

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
