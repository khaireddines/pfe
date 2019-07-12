<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class emp_salle extends Model
{
    use LogsActivity;
    protected static $logAttributes = ['*'];
}
