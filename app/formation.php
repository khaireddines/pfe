<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Traits\LogsActivity;
class formation extends Model
{
    use LogsActivity;
    protected static $logAttributes = ['*'];

    protected $guarded=['etat'];
  public function deplib($idDept)
  {
    $dep=DB::table('departements')->select('libDept')->where('idDept','=',$idDept)->get();
    return $dep;
  }
    public function CountTraining()
    {
        return count(formation::all());
    }

}
