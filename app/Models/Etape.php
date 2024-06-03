<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Etape extends Model
{
    use HasFactory;

    protected $table = 'etape';
    protected $fillable = ['idetape', 'nometape','longueur','nbcoureur'];


    public function showdetails($idetape)
    {
        $detailetape = DB::select('SELECT * FROM etape where idetape = ?',[$idetape]);
        return $detailetape;
    }

    public function insertioncoureur($idetape,$idcoureur,$idequipe){
        $idcoureurimp = implode(",", $idcoureur);

        DB::transaction(function() use ($idetape,$idcoureurimp, $idequipe) {
        
        DB::select('INSERT INTO public.etapeequipe(idetape) values('.$idetape.')');

            //insert equipe et coureur
           DB::select('INSERT INTO public.etapeequipe(idequipe, idcoureur)
           select idequipe,idcoureur from viewequipecoureur where idcoureur in ('.$idcoureurimp.')');
   
            //supprimer etape où idequipe est NULL
           DB::select('DELETE FROM etapeequipe
           WHERE idetape = '.$idetape.' AND idequipe IS NULL;');
   
        });

        $nbrcoureur = DB::select('select nbcoureur from etape where idetape ='.$idetape);
        $countcoureur = DB::select('select count(idcoureur) from etapeequipe where idequipe ='.$idequipe.' and idcoureur in ('.$idcoureurimp.') group by idequipe ');

        if ($nbrcoureur[0]->nbcoureur <= $countcoureur[0]->count ){ 
            DB::select('delete from etapeequipe where idequipe ='.$idequipe.' and idcoureur in('.$idcoureurimp.')');
            return false;
        }else{
            return true;
        }

        
    }
}
