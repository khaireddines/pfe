<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class uni_enseignement extends Model
{
    use LogsActivity;
    protected static $logAttributes = ['*'];

    protected $guarded=['etat'];
    public function libform($id)
    {
        //$dep=DB::table('departements')->select('libDept')->where('idDept','=',$idDept)->get();
        $form=formation::where('idForm',$id)->get();
        return $form;
    }
}
