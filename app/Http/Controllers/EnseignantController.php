<?php

namespace App\Http\Controllers;

use App\departement;
use App\enseignant;
use Illuminate\Http\Request;

class EnseignantController extends Controller
{
    public function show()
    {
        $ens_list=enseignant::all();

        return view('layouts.admin.enseignant_list',compact('ens_list'));
    }

    public function create()
    {
        if(!empty(request('id')))
        {
            $ens= enseignant::where('matProf',request('id'))->get();

            $dep=departement::all();
            return view('layouts.admin.enseignant',compact('ens','dep'));
        }
        else
        {
            $dep=departement::all();
            return view('layouts.admin.enseignant',compact('dep'));

        }
    }

    public function store()
    {
        enseignant::create(request()->all());

        return redirect('/Enseignant');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function edit($id)
    {
        enseignant::where('matProf',$id)->update(request()->except(['_token','matProf']));

        return redirect('/Enseignant');
    }

    public function destroy($id)
    {
        enseignant::where('matProf',$id)->delete();

        return back();
    }
}
