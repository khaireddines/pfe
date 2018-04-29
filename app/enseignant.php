<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class enseignant extends Model
{
protected $guarded=['etat'];
    public function deplib($id)
    {
        $dep=departement::where('idDept',$id)->get();
        return $dep;
    }
}
