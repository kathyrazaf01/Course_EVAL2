<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin';
    protected $primaryKey = 'idadmin';
    protected $fillable = ['idadmin', 'nomadmin','idlogin'];

    public function showequipeetape($idetape)
    {
       
        $equipe = DB::select('select idequipe,nomequipe from viewadminetape where idetape ='.$idetape.' group by idequipe,nomequipe');
        return $equipe;
    }

    public function showcoureurs($idetape)
    {
       
        $coureurs = DB::select('select idequipe,nomequipe,idcoureur,nomcoureur,numero from viewadminetape where idetape ='.$idetape.' group by idequipe,nomequipe,idcoureur,nomcoureur,numero');
        return $coureurs;
    }

    public function updatetempscoureur($heuredepard,$heurearrivée,$idcoureur){
        
        // $temps = DB::update("UPDATE public.etapeequipe 
        // SET heuredepart = '?', heurearrive = '?' 
        // WHERE idcoureur = ?", [$heuredepard, $heurearrivée, $idcoureur]);
        // return $temps;
    }

  
}
