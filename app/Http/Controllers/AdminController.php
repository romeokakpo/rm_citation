<?php

namespace App\Http\Controllers;

use App\Models\Citation;
use App\Models\Message;
use App\Models\Recent;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $citations = Citation::count();
        $download = Citation::sum('download');
        $like = Citation::sum('like');
        $messages = Message::orderBy('id', 'desc')->paginate(5);
        $recents = Recent::orderBy('id', 'desc')->paginate(10);
        return view('admin.index', compact('citations', 'download', 'like', 'messages', 'recents'));
    }

    public function login()
    {

        return view('admin.login');
    }

    public function messages()
    {
    }

    public function newsletters()
    {
        return view('admin.newsletter');
    }

    public function notifications()
    {
    }
    public function profil()
    {
        $user = \App\Models\User::find(1)->first();
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
        return redirect()->route('home');
    }
}
