<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class classe extends Model
{
    use LogsActivity;
    protected static $logAttributes = ['*'];
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
    public function CountClasses()
    {
        return count(classe::all());
    }
}
