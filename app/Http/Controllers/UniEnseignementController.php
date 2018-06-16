<?php

namespace App\Http\Controllers;

use App\formation;
use App\uni_enseignement;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

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
        $unite= uni_enseignement::create(request()->all());

        return redirect('/Unite_ens');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function edit($id)
    {
        $unite= new uni_enseignement();
        $old=$unite->where('idUnite',$id)->get();
        $unite->where('idUnite',$id)->update(request()->except(['_token']));
        activity()
            ->performedOn($unite)
            ->withProperties(["new"=>request()->except(['_token','matProf']),"old"=>$old[0]])
            ->log('edited');

        return redirect('/Unite_ens');
    }

    public function destroy($id)
    {
        $unite=uni_enseignement::where('idUnite',$id)->delete();

        return back();
    }
}
