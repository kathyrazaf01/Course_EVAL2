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


        $admin = DB::table('admin')
            ->where('nomadmin', $login)
            ->where('nomadmin', $password)
            ->first();

        if (empty($admin)) {
            return redirect()->back()->with('error', 'wrong password or email');
        }

        if($admin) {
            Session::put('idadmin', $admin->idadmin);
            return redirect('indexadmin');
        }


        //   if ($admin) {
        //         Session::put('idequipe', $user->idadmin);
        //         return redirect('indexadmin');

        // }
        // else {
        //     // L'utilisateur n'existe pas, redirigez vers la page de connexion avec un message d'erreur
        //     return redirect()->back()->with('error', 'wrong password or email');
        // }

         // if ($user) {
        //     if($user->statu == 1) {
        //         Session::put('idequipe', $user->idequipe);
        //         return redirect('indexclient');
        //     }elseif ($user->statu == 0) {
        //         Session::put('idadmin', $user->idadmin);
        //         return redirect('indexadmin');
        //     }
        // }
        // else {
        //     // L'utilisateur n'existe pas, redirigez vers la page de connexion avec un message d'erreur
        //     return redirect()->back()->with('error', 'wrong password or email');
        // }

        // if(!$user) {
        //     $user = DB::table('equipe')
        //         ->where('nomequipe', $login)
        //         ->where('motdepasse', $password)
        //         ->first();
        // }

        // if(!$user) {
        //     return redirect()->back()->with('error', 'wrong password or email');
        // }
        // $admin = DB::table('admin')
        //     ->where('nomadmin', $login)
        //     ->first();
        
        // $equipe = DB::table('equipe')
        //     ->where('nomequipe', $login)
        //     ->first();

        // if ($admin || $equipe) {
        //     if($us->statu == 1) {
        //         //         Session::put('idequipe', $user->idequipe);
        //         //         return redirect('indexclient');
        //         //     }elseif ($user->statu == 0) {
        //         //         Session::put('idadmin', $user->idadmin);
        //         //         return redirect('indexadmin');
        // }
        

        // if ($user) {
        //     if($user->statu == 1) {
        //         Session::put('idequipe', $user->idequipe);
        //         return redirect('indexclient');
        //     }elseif ($user->statu == 0) {
        //         Session::put('idadmin', $user->idadmin);
        //         return redirect('indexadmin');
        //     }
        // }
        // else {
        //     // L'utilisateur n'existe pas, redirigez vers la page de connexion avec un message d'erreur
        //     return redirect()->back()->with('error', 'wrong password or email');
        // }
    }
}
