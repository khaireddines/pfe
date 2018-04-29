<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class departement extends Model
{
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
