<?php

namespace App\Http\Controllers;

use App\matiere;
use App\uni_enseignement;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    public function show()
    {
        $mat_list=matiere::all();

        return view('layouts.admin.Matiere_list',compact('mat_list'));
    }

    public function create()
    {
        if(!empty(request('id')))
        {
            $Uens=uni_enseignement::all();
            $mat= (new \App\matiere)->where('id',request('id'))->get();

            return view('layouts.admin.Matiere',compact('mat','Uens'));
        }
        else
        {
            $Uens=uni_enseignement::all();

            return view('layouts.admin.Matiere',compact('Uens'));

        }
    }

    public function store()
    {
        matiere::create(request()->all());

        return redirect('/Matiere');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function edit($id)
    {
        matiere::where('id',$id)->update(request()->except(['_token','id']));

        return redirect('/Matiere');
    }

    public function destroy($id)
    {
        matiere::where('id',$id)->delete();

        return back();
    }
}
