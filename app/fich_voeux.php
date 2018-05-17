<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Traits\LogsActivity;
class fich_voeux extends Model
{
    use LogsActivity;
    protected static $logAttributes = ['*'];

    protected $guarded=['etat'];




    /**
     * @param $dep
     * @return \Illuminate\Support\Collection
     */
    public function matieres($dep)
    {

        //select m.* from formations f,uni_enseignements u,matieres m where f.idDept='info' and f.idForm=u.idForm and u.idUnite=m.idUnite;

        $mats = DB::table('matieres')
            ->join('uni_enseignements', 'uni_enseignements.idUnite', '=','matieres.idUnite' )
            ->join('formations', 'formations.idForm', '=', 'uni_enseignements.idForm')
            ->select('matieres.*')
            ->where('formations.idDept',$dep)
            ->get();
        return $mats;
    }


}
