<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Classement extends Model
{
    use HasFactory;

    public function showClassementEtape($idetape)
    {
        $classement = DB::select('
        WITH RankedCoureurs AS (
            SELECT 
                e.idequipe,
                e.idcoureur,
                e.idetape,
                   (e.heurearrive- e.heuredepart) AS duree,
                   rank() OVER (
                    PARTITION BY e.idetape 
                    ORDER BY EXTRACT(EPOCH FROM (e.heurearrive::time - e.heuredepart::time))
                ) AS rank
            FROM etapeequipe e
        )
        SELECT 
            r.rang,
            rc.idequipe,
            rc.idcoureur,
            c.nomcoureur,
            c.numero,
            rc.idetape,
            rc.duree,
            r.point
        FROM RankedCoureurs rc
        JOIN rang r ON rc.rank = r.rang
        JOIN coureur c ON rc.idcoureur = c.idcoureur
        WHERE idetape = ?
        ORDER BY rc.idetape, rc.rank;
        ', [$idetape]);

        return $classement;
    }

    public function showClassementEquipe()
    {
        $classementequipe = DB::select('select idequipe,nomequipe,sum(point)as total from viewclassement group by idequipe,nomequipe order by total desc');

        return $classementequipe;
    }
}
