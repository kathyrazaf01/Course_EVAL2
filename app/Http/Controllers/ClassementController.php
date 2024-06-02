<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Classement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClassementController extends Controller
{
    private $classement;

    public function __construct(Classement $classement)
    {
        $this->classement = $classement;
    }

    public function classementdetailetape($idetape){

        $classementdetails = $this->classement->showClassementEtape($idetape);

        $etape = DB::table('etape')
                ->select('nometape')
                ->where('idetape', $idetape)
                ->first();


        return view('classement.classementdetailetape', compact('classementdetails', 'etape'));
    }

    public function classementbyequipe(){
        $classementequipes = $this->classement->showClassementEquipe();

        return view('classement.classementbyequipe', compact('classementequipes'));
    }

}
