<?php

namespace App\Http\Controllers;

use App\formation;
use App\uni_enseignement;
use Illuminate\Http\Request;

class UniEnseignementController extends Controller
{
    public function show()
    {
        $unite_list=uni_enseignement::all();

        return view('layouts.admin.Unite_list',compact('unite_list'));
    }

    public function create()
    {
        if(!empty(request('id')))
        {
            $form=formation::all();
            $unite= (new \App\uni_enseignement)->where('idUnite',request('id'))->get();

            return view('layouts.admin.Unite_ens',compact('unite','form'));
        }
        else
        {
            $form=formation::all();

            return view('layouts.admin.Unite_ens',compact('form'));

        }
    }

    public function store()
    {
        uni_enseignement::create(request()->all());

        return redirect('/Unite_ens');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function edit($id)
    {
        uni_enseignement::where('idUnite',$id)->update(request()->except(['_token','idUnite']));

        return redirect('/Unite_ens');
    }

    public function destroy($id)
    {
        uni_enseignement::where('idUnite',$id)->delete();

        return back();
    }
}
