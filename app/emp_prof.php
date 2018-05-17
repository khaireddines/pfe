<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class emp_prof extends Model
{
    use LogsActivity;

    protected $guarded=['_token'];
}
