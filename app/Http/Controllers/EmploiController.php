<?php

namespace App\Http\Controllers;

use App\Affectedto;
use App\classe;
use App\departement;
use App\emp_class;
use App\emp_prof;
use App\emp_salle;
use App\enseignant;
use App\formation;
use App\lession;
use App\session;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;


class EmploiController extends Controller
{
    public function show()
    {
        $lession=lession::all();
        $dep=departement::all();
        $formation=formation::all();
        $salle=emp_salle::all()->unique('idSalle');
        $classes='';
        foreach ($formation as $form)
        {
            $classe=classe::where('idForm',$form->idForm)->get();

            $classes.='<optgroup label="'.$form->libForm.'">';
            foreach ($classe as $data_clas)
            {$classes.='<option value="'.$data_clas->nomClass.'">'.$data_clas->nomClass.'</option>';

            }

            $classes.='</optgroup>';

        }
        $result='';

        foreach ($dep as $data)
        {
            $prof=enseignant::where('idDept',$data->idDept)->get();

            $result.='<optgroup label="'.$data->libDept.'">';
            foreach ($prof as $dataprof)
            {$result.='<option value="'.$dataprof->matProf.'">'.$dataprof->nom.' '.$dataprof->prenom.'</option>';

            }

            $result.='</optgroup>';

        }
        $Room='';
        foreach ($salle as $data_salle)
        {
            $Room.='<option value="'.$data_salle->idSalle.'">'.$data_salle->idSalle.'</option>';
        }
        return view('layouts.Users.emp_prof',compact('lession','result','classes','Room'));
    }

    public function store(Request $request)
    {
        $prof=$request->prof;
        $mon=$request->mon;
        $tue=$request->tue;
        $wed=$request->wed;
        $thu=$request->thu;
        $fri=$request->fri;
        $sat=$request->sat;
        $oldmon=$request->oldmon;
        $oldtue=$request->oldtue;
        $oldwed=$request->oldwed;
        $oldthu=$request->oldthu;
        $oldfri=$request->oldfri;
        $oldsat=$request->oldsat;

        for ($i=0;$i<6;$i++)
        {   if (isset($oldmon[$i]))
            {$list=explode('_',$oldmon[$i]);
                $idMat=$list[0];$classe=$list[1];$salle=$list[2];
                //creating the newsItem will cause an activity being logged


                emp_prof::where('MatProf',$prof)->where('Lession',($i+1))->update(['Lundi'=>'']);



                emp_class::where('idClass',$classe)->where('Lession',($i+1))->update(['Lundi'=>'']);

                emp_salle::where('idSalle',$salle)->where('Lession',($i+1))->update(['Lundi'=>'']);
            }
            if (isset($oldtue[$i]))
            {$list=explode('_',$oldtue[$i]);
                $idMat=$list[0];$classe=$list[1];$salle=$list[2];
                emp_prof::where('MatProf',$prof)->where('Lession',($i+1))->update(['Mardi'=>'']);
                emp_class::where('idClass',$classe)->where('Lession',($i+1))->update(['Mardi'=>'']);
                emp_salle::where('idSalle',$salle)->where('Lession',($i+1))->update(['Mardi'=>'']);
            }
            if (isset($oldwed[$i]))
            {$list=explode('_',$oldwed[$i]);
                $idMat=$list[0];$classe=$list[1];$salle=$list[2];
                emp_prof::where('MatProf',$prof)->where('Lession',($i+1))->update(['Mercredi'=>'']);
                emp_class::where('idClass',$classe)->where('Lession',($i+1))->update(['Mercredi'=>'']);
                emp_salle::where('idSalle',$salle)->where('Lession',($i+1))->update(['Mercredi'=>'']);
            }
            if (isset($oldthu[$i]))
            {$list=explode('_',$oldthu[$i]);
                $idMat=$list[0];$classe=$list[1];$salle=$list[2];
                emp_prof::where('MatProf',$prof)->where('Lession',($i+1))->update(['Jeudi'=>'']);
                emp_class::where('idClass',$classe)->where('Lession',($i+1))->update(['Jeudi'=>'']);
                emp_salle::where('idSalle',$salle)->where('Lession',($i+1))->update(['Jeudi'=>'']);
            }
            if (isset($oldfri[$i]))
            {$list=explode('_',$oldfri[$i]);
                $idMat=$list[0];$classe=$list[1];$salle=$list[2];
                emp_prof::where('MatProf',$prof)->where('Lession',($i+1))->update(['Vendredi'=>'']);
                emp_class::where('idClass',$classe)->where('Lession',($i+1))->update(['Vendredi'=>'']);
                emp_salle::where('idSalle',$salle)->where('Lession',($i+1))->update(['Vendredi'=>'']);
            }
            if (isset($oldsat[$i]))
            {$list=explode('_',$oldsat[$i]);
                $idMat=$list[0];$classe=$list[1];$salle=$list[2];
                emp_prof::where('MatProf',$prof)->where('Lession',($i+1))->update(['Samedi'=>'']);
                emp_class::where('idClass',$classe)->where('Lession',($i+1))->update(['Samedi'=>'']);
                emp_salle::where('idSalle',$salle)->where('Lession',($i+1))->update(['Samedi'=>'']);
            }


            if (isset($mon[$i]))
            {$list=explode('_',$mon[$i]);
                $idMat=$list[0];$classe=$list[1];$salle=$list[2];
                emp_salle::where('idSalle',$salle)->where('Lession',($i+1))->update(['Lundi'=>$classe]);
                try{emp_prof::updateOrCreate([
                    'MatProf'=>$prof,
                    'Lession'=>$i+1],
                    ['Lundi'=>$classe
                    ]);
                }
                catch (\Exception $e)
                {emp_prof::where('MatProf',$prof)->where('Lession',($i+1))->update(['Lundi'=>$classe]);}

                Affectedto::where('idMat',$idMat)
                    ->where('MatProf',$prof)
                    ->update(['placed'=>'yes']);

                try
                {$emp_classe=emp_class::updateOrCreate([
                   'idClass'=>$classe,
                    'Lession'=>$i+1],
                ['Lundi'=>$idMat
                ]);

                }
                catch(\Exception $e)
                {emp_class::where('idClass',$classe)->where('Lession',($i+1))->update(['Lundi'=>$idMat]);}

            }
            if (isset($tue[$i]))
            {$list=explode('_',$tue[$i]);
                $idMat=$list[0];$classe=$list[1];$salle=$list[2];
                emp_salle::where('idSalle',$salle)->where('Lession',($i+1))->update(['Mardi'=>$classe]);
                try{
                    emp_prof::updateOrCreate([
                        'MatProf'=>$prof,
                        'Lession'=>$i+1],
                        ['Mardi'=>$classe
                        ]);
                }
                catch (\Exception $e)
                {emp_prof::where('MatProf',$prof)->where('Lession',($i+1))->update(['Mardi'=>$classe]);}

                Affectedto::where('idMat',$idMat)
                    ->where('MatProf',$prof)
                    ->update(['placed'=>'yes']);
                try
                {$emp_classe=emp_class::updateOrCreate([
                    'idClass'=>$classe,
                    'Lession'=>$i+1],[
                    'Mardi'=>$idMat

                ]);

                }
                catch(\Exception $e)
                {emp_class::where('idClass',$classe)->where('Lession',($i+1))->update(['Mardi'=>$idMat]);}

            }
            if (isset($wed[$i]))
            {$list=explode('_',$wed[$i]);
                $idMat=$list[0];$classe=$list[1];$salle=$list[2];
                emp_salle::where('idSalle',$salle)->where('Lession',($i+1))->update(['Mercredi'=>$classe]);
                try{emp_prof::updateOrCreate([
                    'MatProf'=>$prof,
                    'Lession'=>$i+1],
                    ['Mercredi'=>$classe
                    ]);






                }
                catch (\Exception $e)
                {emp_prof::where('MatProf',$prof)->where('Lession',($i+1))->update(['Mercredi'=>$classe]);}

                Affectedto::where('idMat',$idMat)
                    ->where('MatProf',$prof)
                    ->update(['placed'=>'yes']);
                try
                {$emp_classe=emp_class::updateOrCreate([
                    'idClass'=>$classe,
                    'Lession'=>$i+1],[
                    'Mercredi'=>$idMat

                ]);

                }
                catch(\Exception $e)
                {emp_class::where('idClass',$classe)->where('Lession',($i+1))->update(['Mercredi'=>$idMat]);}

            }
            if (isset($thu[$i]))
            {$list=explode('_',$thu[$i]);
                $idMat=$list[0];$classe=$list[1];$salle=$list[2];
                emp_salle::where('idSalle',$salle)->where('Lession',($i+1))->update(['Jeudi'=>$classe]);
                try{emp_prof::updateOrCreate([
                    'MatProf'=>$prof,
                    'Lession'=>$i+1],
                    ['Jeudi'=>$classe
                    ]);






                }
                catch (\Exception $e)
                {emp_prof::where('MatProf',$prof)->where('Lession',($i+1))->update(['Jeudi'=>$classe]);}

                Affectedto::where('idMat',$idMat)
                    ->where('MatProf',$prof)
                    ->update(['placed'=>'yes']);
                try
                {$emp_classe=emp_class::updateOrCreate([
                    'idClass'=>$classe,
                    'Lession'=>$i+1],[
                    'Jeudi'=>$idMat

                ]);

                }
                catch(\Exception $e)
                {emp_class::where('idClass',$classe)->where('Lession',($i+1))->update(['Jeudi'=>$idMat]);}

            }
            if (isset($fri[$i]))
            {$list=explode('_',$fri[$i]);
                $idMat=$list[0];$classe=$list[1];$salle=$list[2];
                emp_salle::where('idSalle',$salle)->where('Lession',($i+1))->update(['Vendredi'=>$classe]);
                try{emp_prof::updateOrCreate([
                    'MatProf'=>$prof,
                    'Lession'=>$i+1],
                    ['Vendredi'=>$classe
                    ]);






                }
                catch (\Exception $e)
                {emp_prof::where('MatProf',$prof)->where('Lession',($i+1))->update(['Vendredi'=>$classe]);}

                Affectedto::where('idMat',$idMat)
                    ->where('MatProf',$prof)
                    ->update(['placed'=>'yes']);
                try
                {$emp_classe=emp_class::updateOrCreate([
                    'idClass'=>$classe,
                    'Lession'=>$i+1],[
                    'Vendredi'=>$idMat

                ]);

                }
                catch(\Exception $e)
                {emp_class::where('idClass',$classe)->where('Lession',($i+1))->update(['Vendredi'=>$idMat]);}


            }
            if (isset($sat[$i]))
            {$list=explode('_',$sat[$i]);
                $idMat=$list[0];$classe=$list[1];$salle=$list[2];
                emp_salle::where('idSalle',$salle)->where('Lession',($i+1))->update(['Samedi'=>$classe]);
                try{emp_prof::updateOrCreate([
                    'MatProf'=>$prof,
                    'Lession'=>$i+1],
                    ['Samedi'=>$classe
                    ]);






                }
                catch (\Exception $e)
                {emp_prof::where('MatProf',$prof)->where('Lession',($i+1))->update(['Samedi'=>$classe]);}

                Affectedto::where('idMat',$idMat)
                    ->where('MatProf',$prof)
                    ->update(['placed'=>'yes']);
                try
                {$emp_classe=emp_class::updateOrCreate([
                    'idClass'=>$classe,
                    'Lession'=>$i+1],[
                    'Samedi'=>$idMat

                ]);


                }
                catch(\Exception $e)
                {emp_class::where('idClass',$classe)->where('Lession',($i+1))->update(['Samedi'=>$idMat]);}


            }
        }


        return back()->with('alert', 'yes');
    }
}
