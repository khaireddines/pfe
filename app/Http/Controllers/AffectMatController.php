<?php

namespace App\Http\Controllers;

use App\AffectedMats;
use App\Affectedto;
use App\classe;
use App\enseignant;
use Illuminate\Http\Request;

class AffectMatController extends Controller
{
    public function show()
    {
        $class=classe::all();
        return view('layouts.Users.Affected',compact('class'));
    }
    public function store(Request $request)
    {

        foreach ($request->Prof as $key)
        {
            $ens=enseignant::where('matProf',$key)->get();
            $classname=classe::where('idClass',request('classe'))->get();

            $nom=$ens['0']->nom.' '.$ens['0']->prenom;
            Affectedto::create([
                'idMat'=>$request->mat,
                'MatProf'=>$key,
                'nomProf'=>$nom,
                'Class'=>$classname['0']->nomClass
            ]);
        }

        alert()->success('Great!','Your Request has Been Saved');


    return back();
    }
}
