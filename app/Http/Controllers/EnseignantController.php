<?php

namespace App\Http\Controllers;

use App\departement;
use App\enseignant;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Storage;
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
        //creating the newsItem will cause an activity being logged
        User::where('email',\request('email'))->update(['avatar'=>\request('file')]);

        $img = Image::make(\request()->file('file'))->insert('public/img/icons/AV.svg')->save(public_path('img/profile_img'));
        $ens=enseignant::create(request()->except(['file']));
//        activity()
//            ->performedOn($ens)
//            ->log('stored');
        return redirect('/Enseignant');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function edit($id, Request $request)
    {//creating the newsItem will cause an activity being logged
        User::where('email',\request('email'))->update(['avatar'=>\request('prenom').'.jpg']);
        $img = Image::make($request->file('file'))->save(public_path('img/profile_img/'.\request('prenom').'.jpg'));
        $ens=new enseignant();
        $ens->where('matProf',$id)->update(request()->except(['_token','matProf','file']));
        activity()
           ->performedOn($ens)
           ->log('edited');
        return redirect('/Enseignant');
    }

    public function destroy($id)
    {//creating the newsItem will cause an activity being logged

        $ens=enseignant::where('matProf',$id)->delete();
        $activity = Activity::all()->last();
        return back();
    }
}
