<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\departement;
class DepartementController extends Controller
{
   public function show()
   {
     $dep_list=departement::all();
     return view('layouts.admin.dep_list',compact('dep_list'));
   }
   public function create()
   {
     if(!empty(request('id')))
     {
       $dep=departement::where('idDept',request('id'))->get();
     return view('layouts.admin.departement',compact('dep'));
      }
     else
     return view('layouts.admin.departement');

   }
   public function store(departement $post)
   {
     departement::create(request()->all());
     return redirect('/departement');
   }
   public function edit($id)
   {
//      $flight = App\Flight::find(1);
//
// $flight->name = 'New Flight Name';
//
// $flight->save();
//////////////////for 1 row update from database
/////////////////fail try//////
     // $dep=departement::where('idDept',$id)->get();
     //
     //   $dep->libDept=request('libDept');
     //   $dep->descDept=request('descDept');
     //
     //   $dep->save();
       departement::where('idDept',$id)->update(request()->except(['_token','idDept']));


     return redirect('/departement');
   }
   public function destroy($id)
   {
     /////////////////////deleteing rows
     departement::where('idDept',$id)->delete();

    return back();
   }
}
