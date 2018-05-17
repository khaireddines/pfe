<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
class matiere extends Model
{use LogsActivity;
    protected static $logAttributes = ['*'];

    protected $guarded=['etat'];
    public function libUnite($id)
    {
        $unite=uni_enseignement::where('idUnite',$id)->get();
        return $unite;
    }
}
