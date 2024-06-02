<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Etape;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class EquipeController extends Controller
{
    private $etape;

    public function __construct(Etape $etape)
    {
        $this->etape = $etape;
    }

    public function logoutequipe()
    {
        Session::forget('idequipe');
        return redirect('');
    }

    public function equipedetailetape($idequipe)
    {
        $etapedetails = $this->etape->showdetails($idequipe);
        return view('equipe.equipedetailetape', compact('etapedetails')); 
    }

    public function insertetapecoureur(Request $request)
    {
        $request->validate([
            'idetape' => 'required|numeric',
            'coureurs' => 'required|array',
        ]);

        $idetape = $request->idetape;
        $idcoureur = $request->coureurs;
        $idequipe = session('idequipe');

        $insertfunction =$this->etape->insertioncoureur($idetape,$idcoureur,$idequipe);
        $nbrcoureur = DB::select('select nbcoureur from etape where idetape ='.$idetape);

        if ($insertfunction == true) {
            return redirect()->route('indexclient')->with('success', 'Runners added with succes');
        } else {
            return redirect()->route('indexclient')->with('error', 'Should insert '.$nbrcoureur[0]->nbcoureur.' Runners ');
        }
       
    }
}
