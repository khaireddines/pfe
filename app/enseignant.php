<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
class enseignant extends Model
{use LogsActivity;
    protected static $logAttributes = ['*'];
protected $guarded=['etat'];
    public function deplib($id)
    {
        $dep=departement::where('idDept',$id)->get();
        return $dep;
    }
}
