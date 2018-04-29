<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Affectedto extends Model
{
    protected $guarded=['_token','placed'];
}
