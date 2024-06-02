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
        
        DB::select('INSERT INTO public.etapeequipe(idequipe, idcoureur, idetape)
        select idequipe,idcoureur,'.$idetape.' from viewequipecoureur where idcoureur in ('.$idcoureurimp.')');

        $nbrcoureur = DB::select('select nbcoureur from etape where idetape ='.$idetape);
        $countcoureur = DB::select('select count(idcoureur) from etapeequipe where idequipe ='.$idequipe.' group by idequipe ');

        if ($nbrcoureur[0]->nbcoureur != $countcoureur[0]->count){ 
            DB::select('delete from etapeequipe where idequipe ='.$idequipe);
            return false;
        }else{
            return true;
        }
    }
}
