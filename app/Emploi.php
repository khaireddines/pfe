<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Emploi extends Model
{
    use LogsActivity;
    protected static $logAttributes = ['*'];


}
