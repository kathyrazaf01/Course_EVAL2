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

        $idcoureurimp = implode(",", $idcoureur);

        echo $idetape;
        echo $idequipe;

        DB::select('INSERT INTO public.etapeequipe(idetape) values('.$idetape.')');

         //insert equipe et coureur
        DB::select('INSERT INTO public.etapeequipe(idequipe, idcoureur)
        select idequipe,idcoureur from viewequipecoureur where idcoureur in ('.$idcoureurimp.')');

        //  //supprimer etape où idequipe est NULL
        // DB::select('DELETE FROM etapeequipe
        // WHERE idetape = '.$idetape.' AND idequipe IS NULL;');

        $nbrcoureur = DB::select('select nbcoureur from etape where idetape ='.$idetape);
        $countcoureur = DB::select('select count(idcoureur) from etapeequipe where idequipe ='.$idequipe.' and idcoureur in ('.$idcoureurimp.') group by idequipe ');

        // if ($nbrcoureur[0]->nbcoureur <= $countcoureur[0]->count ){ 
        //     DB::select('delete from etapeequipe where idequipe ='.$idequipe.' and idcoureur in('.$idcoureurimp.')');
        //     return redirect()->route('indexclient')->with('error', 'Should insert '.$nbrcoureur[0]->nbcoureur.' Runners ');
        // }else{
        //     return redirect()->route('indexclient')->with('success', 'Runners added with succes');
        // }



        // $insertfunction =$this->etape->insertioncoureur($idetape,$idcoureur,$idequipe);


        // if ($insertfunction == true) {
        //     return redirect()->route('indexclient')->with('success', 'Runners added with succes');
        // } else {
        //     return redirect()->route('indexclient')->with('error', 'Should insert '.$nbrcoureur[0]->nbcoureur.' Runners ');
        // }
       
    }
}
