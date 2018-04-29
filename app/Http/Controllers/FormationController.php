<?php

namespace App\Http\Controllers;

use App\departement;
use Illuminate\Http\Request;
use App\formation;
use App\session;
use Illuminate\Support\Facades\DB;


class FormationController extends Controller
{

    public function show()
    {
      $form_list=formation::all();

      return view('layouts.admin.form_list',compact('form_list'));
    }

    public function create()
    {
        if(!empty(request('id')))
        {
            $sess=session::all();
            $dep=departement::all();
            $form= (new \App\formation)->where('idForm',request('id'))->get();
            return view('layouts.admin.formation',compact('form','dep','sess'));
        }
        else
        {
          $sess=session::all();
          $dep=departement::all();
            return view('layouts.admin.formation',compact('dep','sess'));

        }
    }

    public function store()
    {
        formation::create(request()->all());

        return redirect('/formation');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function edit($id)
    {
//        DB::table('formations')
//            ->where('idForm', $id)
//            ->update();
        //formation::find($id)->where('idForm',$id);
        formation::where('idForm',$id)->update(request()->except(['_token','idForm']));

        return redirect('/formation');
    }

    public function destroy($id)
    {
        formation::where('idForm',$id)->delete();
        return back();
    }
}
