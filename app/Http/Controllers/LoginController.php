<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function logindata(Request $request)
    {
        // $user = new Utilisateurs;
        $login = $request->input('login');
        $password = $request->input('password');

        if (empty($login) || empty($password)) {
            return redirect()->back()->with('error', 'fill both fields');
        }
        $user = DB::table('viewlogin')
            ->where(function ($query) use ($login) {
                $query->where('nomequipe', $login)
                    ->orWhere('nomadmin', $login);
            })
            ->where('pass', $password)
            ->first();
  

        if ($user) {
            if($user->statu == 1) {
                Session::put('idequipe', $user->idequipe);
                return redirect('indexclient');
            }elseif ($user->statu == 0) {
                Session::put('idadmin', $user->idadmin);
                return redirect('indexadmin');
            }
        }
        else {
            // L'utilisateur n'existe pas, redirigez vers la page de connexion avec un message d'erreur
            return redirect()->back()->with('error', 'wrong password or email');
        }
    }
}
