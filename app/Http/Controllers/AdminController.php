<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Etape;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    private $admin;

    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }
    public function logoutadmin()
    {
        Session::forget('idadmin');
        return redirect('');
    }

    public function equipebyetape($idetape){
        $equipedetails = $this->admin->showequipeetape($idetape);
        return view('admin.equipebyetape', compact('equipedetails')); // Remplacez 'your_view_name' par le nom réel de votre vue 
    }

    public function coureurbyequipe($idequipe){
        $coureurdetails = $this->admin->showcoureurs($idequipe);
        return view('admin.coureurbyequipe', compact('coureurdetails')); // Remplacez 'your_view_name' par le nom réel de votre vue 
    }

    public function insertempscoureur(Request $request){

        $heuredepart =  $request->input('heuredepart');
        $heurearrive = $request->input('heurearrive');
        $idcoureur = $request->input('idcoureur');
        
        // $inserttime =$this->admin->insertioncoureur($heuredepart,$heurearrive,$idcoureur);

        // echo "Heure de départ : " . $heuredepart . "<br>";
        // echo "Heure d'arrivée : " . $heurearrive . "<br>";

        $heuredepart = $request->input('heuredepart');
        $heurearrive = $request->input('heurearrive');
        $idcoureur = $request->input('idcoureur');

        $hours=DB::select('select * from etapeequipe  where idcoureur ='.$idcoureur);
        echo '<pre>';
        print_r($hours);
        echo '</pre>';

        if ($hours[0]->heuredepart == null || $hours[0]->heuredepart == '00:00:00' && $hours[0]->heurearrive == null || $hours[0]->heurearrive == '00:00:00'){ 
            DB::update('UPDATE public.etapeequipe SET heuredepart = ?, heurearrive = ? WHERE idcoureur = ?', [$heuredepart, $heurearrive, $idcoureur]);
            return redirect()->back()->with('success', 'hours added with succes');
        }else{
            return response()->json(['error' => 'already have smth']);
        }   
            //         return response()->json(['error' => 'Les données fournies ne sont pas cohérentes.']);
        //     if (($hour->heuredepart === null || $hour->heuredepart == '00:00:00') || ($hour->heurearrive === null || $hour->heurearrive == '00:00:00')){
            
        //             foreach ($idcoureur as $index => $id) {
        //                 DB::update('UPDATE public.etapeequipe
        //                             SET heuredepart = ?, heurearrive = ?
        //                             WHERE idcoureur = ?', 
        //                             [$heuredepart[$index], $heurearrive[$index], $id]);
        //             }
    
        //         return response()->json(['success' => 'Les heures ont été mises à jour avec succès.']);
        //     }  else {
        //         return response()->json(['error' => 'Les données fournies ne sont pas cohérentes.']);
        //     }    
        // }


    }

    public function categorygenerate(){
        $male = DB::select("SELECT distinct genre FROM coureur where genre = 'M'");
        $female = DB::select("SELECT distinct genre FROM coureur where genre = 'F'");

        $insertgenre = DB::select("insert into categorie (nomcate) select distinct genre from coureur where genre not in(select nomcate from categorie)");

        $senior = DB::table('categorie')
        ->where('nomcate','senior')
        ->first();

        $junior = DB::table('categorie')
        ->where('nomcate','junior')
        ->first();

        if($senior || $junior) {
          echo "Catégorie déja existante";
        }
        
        if(!$senior || !$junior) {
            DB::select("insert into categorie (nomcate) values ('senior'), ('junior')");
            return back()->with('succes', 'Catégorie insérée avec succes');
        } 
        
    }
}
