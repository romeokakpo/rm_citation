<?php

namespace App\Http\Controllers;

use App\Models\Citation;
use App\Models\Message;
use App\Models\Music;
use App\Models\Newsletter;
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
        if (!session()->has('ADMIN'))
            return redirect()->route('admin.login');
        $citations = Citation::count();
        $musiques = Music::count();
        $videos = Video::count();
        $download = Citation::sum('download');
        //$like = Citation::sum('like');
        $messages = Message::orderBy('id', 'desc')->paginate(5);
        while(Recent::count() > 10){
            Recent::first()->delete();
        }
        $recents = Recent::orderBy('id', 'desc')->paginate(10);
        return view('admin.index', compact('citations', 'download', 'musiques','videos', 'messages', 'recents'));
    }

    public function login(Request $request)
    {   
        if (session()->has('ADMIN'))
            return redirect()->route('admin.home');
        
        $request->validate([
            'email' => 'bail|email|required',
            'password' => 'bail|required|alpha_num',
        ]);
        $user = User::find(1)->first();
        try {
            if ($user->email == $request->email && Hash::check($request->password, $user->password)){
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

    public function messages()
    {
    }

    public function newsletters()
    {
        $newsletters = Newsletter::all();
        return view('admin.newsletter', compact('newsletters'));
    }

    public function notifications()
    {
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
            'renewPassword' => 'bail|required'
        ]);

        $user = User::find(1)->first();
        try {
            if ($user && Hash::check($request->password, $user->password)) {
                if ($request->newPassword != $request->renewPassword)
                {
                    return back()->with('error', 'Erreur ! Mots de passe incompatibles.');
                }    
                else {
                    $user->update(['password' => Hash::make($request->newPassword)]);
                    return back()->with('info', 'Mot de passe modifié avec succès');
                }
            } else
                return back()->with('error', 'Erreur ! Mot de passe incorrect.');
        } catch (Exception $e) {
            return back()->with('error', 'Une erreur s\'est produite');
        }
    }

    public function logout()
    {
        Session::forget('ADMIN');
        return redirect()->route('home');
    }
}
