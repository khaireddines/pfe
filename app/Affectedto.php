<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Affectedto extends Model
{
    use LogsActivity;
    protected static $logAttributes = ['*'];
    protected $guarded=['_token','placed'];

}
