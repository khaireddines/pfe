<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
class insc_univ extends Model
{
    //
    use LogsActivity;
    protected static $logAttributes = ['*'];

}
