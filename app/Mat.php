<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
class Mat extends Model
{use LogsActivity;
    protected static $logAttributes = ['*'];

    protected $guarded=['etat','idMat'];
}
