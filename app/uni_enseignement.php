<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class uni_enseignement extends Model
{
    protected $guarded=['etat'];
    public function libform($id)
    {
        //$dep=DB::table('departements')->select('libDept')->where('idDept','=',$idDept)->get();
        $form=formation::where('idForm',$id)->get();
        return $form;
    }
}
