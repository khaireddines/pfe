<?php

namespace App\Http\Controllers;

use App\classe;
use App\departement;
use App\session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClasseController extends Controller
{
    public function show()
    {
        $class_list=classe::all();

        return view('layouts.admin.class_list',compact('class_list'));
    }

    public function create()
    {
        if(!empty(request('id')))
        {
            $class= (new \App\classe())->where('idClass',request('id'))->get();
            $dep=departement::all();
            $sess=session::all();
            return view('layouts.admin.class',compact('class','dep','sess'));
        }
        else
        {
            $dep=departement::all();
            $sess=session::all();
            return view('layouts.admin.class',compact('dep','sess'));

        }
    }

    public function store()
    {
        $nom=request('idForm').".".request('numclass');
        classe::create([
            'idDept' =>request('idDept'),
            'idForm' =>request('idForm'),
            'idSession'=>request('idSession'),
            'numclass'=>request('numclass'),
            'nomClass'=>$nom

        ]);

        return redirect('/Class');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function edit($id)
    {$nom=request('idForm').".".request('numclass');
        classe::where('idClass',$id)->update([
            'idDept' =>request('idDept'),
            'idForm' =>request('idForm'),
            'idSession'=>request('idSession'),
            'numclass'=>request('numclass'),
            'nomClass'=>$nom
        ]);

        return redirect('/Class');
    }

    public function destroy($id)
    {
        classe::where('idClass',$id)->delete();

        return back();
    }
}
