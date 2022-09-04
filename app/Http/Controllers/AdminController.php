<?php

namespace App\Http\Controllers;

use App\Models\Citation;
use App\Models\Message;
use App\Models\Music;
use App\Models\Newsletter;
use App\Models\Notification;
use App\Models\Recent;
use App\Models\User;
use App\Models\Video;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        $citations = Citation::count();
        $musiques = Music::count();
        $videos = Video::count();
        $download = Citation::sum('download');
        //$like = Citation::sum('like');
        $messages = Message::orderBy('id', 'desc')->get();
        while (Recent::count() > 10) {
            Recent::first()->delete();
        }
        $recents = Recent::orderBy('id', 'desc')->paginate(10);
        return view('admin.index', compact('citations', 'download', 'musiques', 'videos', 'messages', 'recents'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'bail|email|required',
            'password' => 'bail|required|alpha_num',
        ]);

        $user = User::find(1)->first();
        try {
            if ($user->email == $request->email && Hash::check($request->password, $user->password)) {
                //Identification de la connexion
                Session::put('ADMIN', serialize($user));
                return redirect()->route('admin.home');
            } else
                return back()->with('error', 'Erreur d\'authentification ! Veuiller revoir
                vos identifiants');
        } catch (Exception $e) {
            return back()->with('error', 'Erreur d\'authentification ! Veuiller revoir
            vos identifiants');
        }
    }

    public function read_all()
    {
        while (Message::where('lu', 0)->first()) {
            Message::where('lu', 0)->update(['lu' => 1]);
        }
        return back();
    }

    public function read_one(Request $request)
    {
        try {
            Message::where('id', $request->id)->update(['lu' => 1]);
            return response()->json();
        } catch (Exception $e) {
            return response()->json([], 400);
        }
    }

    public function del_one(Request $request)
    {
        try {
            Message::where('id', $request->id)->delete();
            Recent::create(['type' => 'danger', 'content' => 'Suppression d\'un message.']);
            return response()->json([
                'success' => true
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false
            ], 400);
        }
    }

    public function newsletters()
    {
        $newsletters = Newsletter::orderBy('id', 'desc')->get();
        return view('admin.newsletter', compact('newsletters'));
    }

    public function newsletters_del(Request $request)
    {
        try {
            Newsletter::where('id', $request->id)->delete();
            Recent::create(['type' => 'danger', 'content' => 'Suppression d\'un abonné.']);
            return response()->json([
                'success' => true
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false
            ], 400);
        }
    }

    public function notifications()
    {
        while (Notification::where('lu', 0)->first()) {
            Notification::where('lu', 0)->first()->delete();
        }
        return redirect()->route('newsletters.list');
    }

    public function profil()
    {
        $user = User::find(1)->first();
        return view('admin.profile', compact('user'));
    }

    public function password(Request $request)
    {
        $request->validate([
            'password' => 'bail|required|alpha_num',
            'newPassword' => 'bail|required|alpha_num',
            'renewPassword' => 'bail|required|alpha_num'
        ]);

        $user = User::find(1)->first();
        try {
            if ($user && Hash::check($request->password, $user->password)) {
                if ($request->newPassword != $request->renewPassword) {
                    return back()->with('error', true);
                } else {
                    $user->update(['password' => Hash::make($request->newPassword)]);
                    return back()->with('success', true);
                }
            } else
                return back()->with('error', true);
        } catch (Exception $e) {
            return back()->with('error', true);
        }
    }

    public function profile(Request $request)
    {
        try {
            $request->validate([
                'adresse' => 'required',
                'telephone' => 'required',
                'email' => 'required|email',
                'twitter' => 'required',
                'facebook' => 'required',
                'instagram' => 'required'
            ]);
            $user = User::find(1)->first();
            $user->update([
                'adresse' => $request->adresse,
                'telephone' => $request->telephone,
                'email' => $request->email,
                'twitter' => $request->twitter,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram
            ]);

            return back()->with('success', true);
        } catch (Exception $e) {
            return back()->with('error', true);
        }
    }

    public function logout()
    {
        Session::forget('ADMIN');
        return redirect()->route('home');
    }
}
