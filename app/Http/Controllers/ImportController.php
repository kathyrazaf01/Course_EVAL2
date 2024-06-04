<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ImportController extends Controller
{
    public function importdonnee(Request $request){
        if (empty(request()->file('etapefile')) || empty(request()->file('resultfile'))) {
            // Retourne une erreur ou arrête le processus
            return redirect()->back()->withErrors(['emptyfile' => 'there\'s no file']);
        }

        $newetape = $request->file('etapefile');
        $newresult = $request->file('resultfile');
        


        $extensionetape = $newetape->getClientOriginalExtension();
        $extensionresult = $newresult->getClientOriginalExtension();

        if($extensionetape != 'csv' || $extensionresult != 'csv'){
            return redirect()->back()->withErrors(['maison' => 'wrong format']);
        }


        $newEtapeContents = file($newetape->getPathname());
        $newResultContents = file($newresult->getPathname());

        //insert etape
        $rowetape = 0;

        foreach($newEtapeContents as $newEtapeContent){
            $rowetape++;

            if ($rowetape == 1) {
                continue;
            }

        $dataetape= str_getcsv($newEtapeContent, ",");
        $longueur = str_ireplace(',','.',$dataetape[1]);

        $dateetape = Carbon::createFromFormat('d/m/Y', $dataetape[4])->format('Y-m-d');
        $houretape = Carbon::createFromFormat('H:i:s', $dataetape[5])->format('H:i:s');
        

        //Régler le problème d'accent avec l'encodage
        array_walk($dataetape, function(&$value) {
            $value = mb_convert_encoding($value, 'UTF-8', 'Windows-1252');
        });
            $dataetapeInsert[] =[
                'etape' => $dataetape[0],
                'longueur' => $longueur,
                'nbcoureur' => $dataetape[2],
                'rang' => $dataetape[3],
                'date_depart' => $dateetape,
                'heure_depart' => $houretape,
            ];
            
        }
        // echo '<pre>';
        // print_r($dataetapeInsert);
        // echo '</pre>';

        // echo '<pre>';
        // var_dump($datasessionInsert);
        // echo '</pre>';

        $exists = DB::table('importcsvetape')->whereIn('etape', array_column($dataetapeInsert, 'etape'))->pluck('etape');
        $dataetapeInsert = array_filter($dataetapeInsert, function($value) use ($exists) {
            return !in_array($value['etape'], $exists->toArray());
        });
        
        DB::table('importcsvetape')->insert($dataetapeInsert);
        
        //insert etape (nometape)

        $idetape = DB::select('
        WITH new_etapes AS (
            INSERT INTO etape (nometape,longueur,nbcoureur,rangetape,datedepart,heuredepart)
            SELECT DISTINCT et.etape,et.longueur,et.nbcoureur,et.rang,et.date_depart,heure_depart
            FROM importcsvetape et
            WHERE "etape" NOT IN (SELECT nometape FROM etape)
            RETURNING idetape,nometape
        )
        SELECT idetape,nometape FROM new_etapes;');

        //insert result
        $rowresult = 0;

        foreach($newResultContents as $newresultContent){
            $rowresult++;

            if ($rowresult == 1) {
                continue;
            }

        $dataresult= str_getcsv($newresultContent, ",");
        $longueur = str_ireplace(',','.',$dataresult[1]);

        $datenaissance = Carbon::createFromFormat('d/m/Y', $dataresult[4])->format('Y-m-d');
        $datearrive = Carbon::createFromFormat('d/m/Y H:i:s' , $dataresult[6])->format('Y-m-d H:i:s');
        

        //Régler le problème d'accent avec l'encodage
        array_walk($dataresult, function(&$value) {
            $value = mb_convert_encoding($value, 'UTF-8', 'Windows-1252');
        });
            $dataresultInsert[] =[
                'etape_rang' => $dataresult[0],
                'numero_dossard' => $longueur,
                'nom' => $dataresult[2],
                'genre' => $dataresult[3],
                'date_naissance' => $datenaissance,
                'equipe' => $dataresult[5],
                'arrivée' => $datearrive,
            ];
            
            
        }

        foreach ($dataresultInsert as $key =>$value){
            $exist = DB::table('importcsvresultat')
            ->where('etape_rang',$value['etape_rang'])
            ->where('numero_dossard',$value['numero_dossard'])
            ->where('nom',$value['nom'])
            ->where('genre',$value['genre'])
            ->where('date_naissance',$value['date_naissance'])
            ->where('equipe',$value['equipe'])
            ->where('arrivée',$value['arrivée'])
            ->first();
            if ($exist){
                unset($dataresultInsert[$key]);
            }
        }
        // echo '<pre>';
        // print_r($dataresultInsert);
        // echo '</pre>';

        // echo '<pre>';
        // var_dump($dataresultInsert);
        // echo '</pre>';


        
        DB::table('importcsvresultat')->insert($dataresultInsert);
        
        // //insert etape (nometape)
        // $idetape = DB::select('
        // WITH new_etapes AS (
        //     INSERT INTO etape (nometape,longueur,nbcoureur,rang,datedepart,heuredepart)
        //     SELECT DISTINCT et.etape,et.longueur,et.nbcoureur,et.rang,et.date_depart,heure_depart
        //     FROM importcsvetape et
        //     WHERE "etape" NOT IN (SELECT nometape FROM etape)
        //     RETURNING idetape,nometape
        // )
        // SELECT idetape,nometape FROM new_etapes;');

        $idcoureur = DB::select('
        WITH new_coureur AS (
            INSERT INTO coureur (nomcoureur,numero,datedenaissance,genre)
            SELECT DISTINCT rs.nom,rs.numero_dossard,rs.date_naissance,rs.genre
            FROM importcsvresultat rs
            WHERE "nom" NOT IN (SELECT nomcoureur FROM coureur)
            RETURNING idcoureur,nomcoureur
        )
        SELECT idcoureur,nomcoureur FROM new_coureur;');

        $idequipe = DB::select('
            INSERT INTO equipe (nomequipe)
            SELECT DISTINCT rs.equipe
            FROM importcsvresultat rs
            WHERE "equipe" NOT IN (SELECT nomequipe FROM equipe)
            RETURNING idequipe;
        ');

        $idequipe = DB::select('
        INSERT INTO equipe (nomequipe)
        SELECT DISTINCT rs.equipe
        FROM importcsvresultat rs
        WHERE "equipe" NOT IN (SELECT nomequipe FROM equipe)
        RETURNING idequipe;
    ');

    $idequipecoureur = DB::select('
    INSERT INTO equipecoureur (idcoureur, idequipe)
    SELECT c.idcoureur, e.idequipe
    FROM importcsvresultat ir
    JOIN coureur c ON ir.nom = c.nomcoureur
    JOIN equipe e ON ir.equipe = e.nomequipe where idcoureur not in(select idcoureur from equipecoureur);');
    
    $idequipecoureur = DB::select('insert into etapeequipe(idequipe,idcoureur,idetape,arrivee)
    SELECT DISTINCT e.idequipe,c.idcoureur,et.idetape,im.arrivée
            FROM importcsvresultat im
            INNER JOIN coureur c ON c.nomcoureur = im.nom
            INNER JOIN etape et ON et.rang = im.etape_rang
            INNER JOIN equipe e ON e.nomequipe = im.equipe
            WHERE (c.idcoureur,et.idetape) NOT IN (SELECT idcoureur,idetape FROM etapeequipe)');
        
    }

    public function importpoint(Request $request){
        if (empty(request()->file('csv_file'))) {
            // Retourne une erreur ou arrête le processus
            return redirect()->back()->withErrors(['emptyfile' => 'there\'s no file']);
        }

        $newsession = $request->file('csv_file');

        $extension = $newsession->getClientOriginalExtension();
        if($extension != 'csv'){
            return redirect()->back()->withErrors(['maison' => 'wrong format']);
        }

        $newSessionContents = file($newsession->getPathname());

        $rowsession = 0;

        foreach($newSessionContents as $newSessionContent){
            $rowsession++;

            if ($rowsession == 1) {
                continue;
            }

        $datasession= str_getcsv($newSessionContent, ",");


        //Régler le problème d'accent avec l'encodage
        array_walk($datasession, function(&$value) {
            $value = mb_convert_encoding($value, 'UTF-8', 'Windows-1252');
        });
            $datasessionInsert[] =[
                'classement' => $datasession[0],
                'points' => $datasession[1],
            ];
            
        }

        echo '<pre>';
        print_r($datasessionInsert);
        echo '</pre>';

        //vérification doublons
        $exists = DB::table('importcsvpoint')->whereIn('classement', array_column($datasessionInsert, 'classement'))->pluck('classement');
        $datasessionInsert = array_filter($datasessionInsert, function($value) use ($exists) {
            return !in_array($value['classement'], $exists->toArray());
        });
        
        DB::table('importcsvpoint')->insert($datasessionInsert);     
        
        //insertion 
        DB::select('
        INSERT INTO rang (point, rang)
        SELECT DISTINCT imp.points, imp.classement
        FROM importcsvpoint imp
        WHERE imp.classement NOT IN (SELECT rang FROM rang);
        ');

        return back()->with('success', 'new ranks import with success');
        
    }
}
