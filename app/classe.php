<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class classe extends Model
{
    protected $guarded=['etat'];
    public function libDept($id)
    {
        $dep=departement::where('idDept',$id)->get();
        return $dep;
    }
    public function libForm($id)
    {
        $form=formation::where('idForm',$id)->get();
        return $form;
    }

}
