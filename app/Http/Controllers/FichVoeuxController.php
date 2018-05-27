<?php

namespace App\Http\Controllers;

use App\classe;
use App\Day;
use App\enseignant;
use App\fich_voeux;
use App\lession;
use App\Mat;
use App\session;
use Illuminate\Http\Request;
use PDF;

class FichVoeuxController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:prof');
        $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show()
    {dd(session()->all());
        $sess=session::where('etat','v')->get();
        $prof=enseignant::where('email',session('email'))->get();
        $class=classe::where('idDept',$prof['0']->idDept)->get();
        $time=lession::all();






        return view('layouts.Users.Fich_voeux',compact('sess','prof','time','class'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPDF()
    {
        $sess=session::where('etat','v')->get();
        $prof=enseignant::where('email',session('email'))->get();
        $pdf = PDF::loadView('layouts.Users.Fich_voeux',compact('sess','prof'));
        return $pdf->download('test.pdff');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //do the validation

        //get the data info
        @$prof=enseignant::where('email',session('email'))->get();
        @$LR=sizeof($request->Lundi);
        @$MAR=sizeof($request->Mardi);
        @$MER=sizeof($request->Mercredi);
        @$JR=sizeof($request->Jeudi);
        @$VR=sizeof($request->Vendredi);
        @$SR=sizeof($request->Samedi);
        $Lundi='';
        $Mardi='';
        $Mercredi='';
        $Jeudi='';
        $Vendredi='';
        $Samedi='';
        for ($i=0;$i<$LR;$i++)
        {
            $Lundi.=request()->Lundi[$i];
            if ($i<$LR-1)
            $Lundi.=',';
        }
        for ($i=0;$i<$MAR;$i++)
        {
            $Mardi.=request()->Mardi[$i];
            if ($i<$MAR-1)
                $Mardi.=',';
        }
        for ($i=0;$i<$MER;$i++)
        {
            $Mercredi.=request()->Mercredi[$i];
            if ($i<$MER-1)
                $Mercredi.=',';
        }
        for ($i=0;$i<$JR;$i++)
        {
            $Jeudi.=request()->Jeudi[$i];
            if ($i<$JR-1)
                $Jeudi.=',';
        }
        for ($i=0;$i<$VR;$i++)
        {
            $Vendredi.=request()->Vendredi[$i];
            if ($i<$VR-1)
                $Vendredi.=',';
        }
        for ($i=0;$i<$SR;$i++)
        {
            $Samedi.=request()->Samedi[$i];
            if ($i<$SR-1)
                $Samedi.=',';
        }
        //store the data into the database
        $i=0;$j=0;
        foreach ($request->idMat1 as $key)
        {
            Mat::updateOrCreate([
                'MatProf'=>$prof['0']->matProf,
                'Mat'=>$key,
                'N_choix'=>$i+1,
                'Class'=>request()->nomClass1[$i]
            ]);
            $i++;

        }

        foreach ($request->idMat2 as $key)
        {
            Mat::updateOrCreate([
                'MatProf'=>$prof['0']->matProf,
                'Mat'=>$key,
                'N_choix'=>$j+1,
                'Class'=>request()->nomClass2[$j]
            ]);
            $j++;

        }
        Day::updateOrCreate([
            'MatProf'=>$prof['0']->matProf,
            'Lundi'=>$Lundi,
            'Mardi'=>$Mardi,
            'Mercredi'=>$Mercredi,
            'Jeudi'=>$Jeudi,
            'Vendredi'=>$Vendredi,
            'Samedi'=>$Samedi
        ]);
        fich_voeux::updateOrCreate([
            'MatProf'=>$prof['0']->matProf,
            'h_supp'=>$request->hs,
            'nbhT'=>$request->nbhT,
            'con_pdea'=>$request->con_peda,
            'con_pers'=>$request->con_per
        ]);

//        for ($i=0;$i<6;$i++)
//        {
//            if (!empty(request()->Lundi[$i]))
//            {echo(request()->Lundi[$i]);}
//        }
            return redirect('/home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
