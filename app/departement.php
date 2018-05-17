<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class departement extends Model
{
    use LogsActivity;
    protected static $logAttributes = ['*'];
  protected $guarded=['etat'];
  public function class()
  {
    return $this->hasMany(classe::class);
  }
  public function formation()
  {
    return $this->hasMany(formation::class);
  }


}
