<?php

namespace App\Http\Controllers;

use App\Affectedto;
use App\classe;
use App\departement;
use App\emp_class;
use App\emp_salle;
use App\enseignant;
use App\formation;
use App\Mat;
use App\matiere;
use App\uni_enseignement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FetchsController extends Controller
{
    public function formation()
    {
        $output='';

        $form_list=formation::where('idDept',request('idDept'))->get();
        $output.='Formation:<select name="idForm">';
        foreach($form_list as $data )
        {$val=''. $data->idForm;
            $text=''. $data->libForm;
            $output .= '
  <option value="'.$val.'">'.$text.'</option>

  ';
        }
        echo $output;
    }
    public function matsC()
    {
        $output='';

        $mats = DB::table('matieres')
            ->join('uni_enseignements', 'uni_enseignements.idUnite', '=','matieres.idUnite' )
            ->select('matieres.*')
            ->where('uni_enseignements.idForm',request('idForm'))
            ->get();

        $id=request('id');
        $output.=
        '<select name="idMat" id="'.$id.'" class="C custom-select custom-select-lg mb-3" style="width:50%">';
        $output.='<option>----faire un choix----</option>';
        foreach($mats as $data )
        {$val=''. $data->idMat;
            $text=''. $data->libMat;
            if($data->nbhTp==null)
            {
            $output .= '
  <option value="'.$val.'">'.$text.'</option>

  ';
            }
        }
        echo $output;

    }
    public function matsAT()
    {
        $output='';

        $mats = DB::table('matieres')
            ->join('uni_enseignements', 'uni_enseignements.idUnite', '=','matieres.idUnite' )
            ->select('matieres.*')
            ->where('uni_enseignements.idForm',request('idForm'))
            ->get();

        $id=request('id');
        $output.=
            '<select name="idMat" id="'.$id.'" class="AT custom-select custom-select-lg mb-3" style="width:50%">';
        $output.='<option>----faire un choix----</option>';
        foreach($mats as $data )
        {$val=''. $data->idMat;
            $text=''. $data->libMat;
            if($data->nbhC==null)
            {
                $output .= '
  <option value="'.$val.'">'.$text.'</option>

  ';
            }
        }
        echo $output;

    }
    public function repartition(){
        $type=request('filter');
        $result='';
        $search=request('toLookFor');
        $list=explode(" ", $search);

        if ($type=='Profs')
        {
        if (isset($list[1])==true)
        {
            $profs=DB::table('enseignants')
                ->select('*')
                ->where('enseignants.prenom','like','%'.$list[1].'%')
                ->Where('enseignants.nom','like','%'.$list[0].'%')
                ->get();
            if (isset($profs[0])==false)
            {
                $profs=DB::table('enseignants')
                    ->select('*')
                    ->where('enseignants.prenom','like','%'.$list[0].'%')
                    ->Where('enseignants.nom','like','%'.$list[1].'%')
                    ->get();
            }
        }else
        {$profs=DB::table('enseignants')
            ->select('*')
            ->where('enseignants.prenom','like','%'.$list[0].'%')
            ->orWhere('enseignants.nom','like','%'.$list[0].'%')
            ->get();}



        //select * from repartition r,enseignants e,matieres m
        // where (e.prenom LIKE 'khaireddine' or e.nom LIKE 'khaireddine' ) and r.idProf=e.matProf and r.idMat=m.idMat;
        $hours = DB::table('affectedtos')
            ->join( 'enseignants','enseignants.matProf', '=','affectedtos.MatProf' )
            ->join( 'matieres','matieres.idMat', '=','affectedtos.idMat' )
            ->select('*')
            ->where('affectedtos.nomProf','like','%'.$search.'%')
            ->distinct()
            ->get();


          foreach ($profs as $data_prof)
            {$result.='<table class=" table ">
                <tr >
                <td class="table-success">'.$data_prof->nom .' '. $data_prof->prenom.'</td>
                <td class="table-success">'.$data_prof->diplome .'</td>
                <td class="table-success">'.$data_prof->grade .'</td>
                <td class="table-success">CI</td>
                <td class="table-success">TP</td>
                <td class="table-success">C</td>
                <td class="table-success">TD</td>
                <td style="border:none;"></td>
                <td style="border:none;"></td>
                <td style="border:none;"></td>
              </tr>';
            $TCI=0;$TC=0;$TTP=0;$TTD=0;$Total=0;
               foreach ($hours as $data_hours)
               {
                   if ($data_prof->matProf==$data_hours->MatProf)
                   {

                       $CI=$data_hours->nbhC+$data_hours->nbhTd;
                        $TCI+=$CI;$TC+=$data_hours->nbhC;
                        $TTP+=$data_hours->nbhTp;$TTD+=$data_hours->nbhTd;
                        $Total+=$TCI+$TTP+$TC+$TTD;
                       $result.='<tr>
                       
                       <tr>
                       <td style="border:none;"> </td>
                        <td>'.$data_hours->Class .'</td>
                        <td>'.$data_hours->libMat.'</td>
                        <td>'.$CI.'</td>
                        <td>'.$data_hours->nbhTp.'</td>
                        <td>'.$data_hours->nbhC.'</td>
                        <td>'.$data_hours->nbhTd.'</td>
                      </tr>
                       ';

                   }
               }

  
               $result.='<tr>
               <td style="border:none;"></td><td class="table-active"></td>
               <td  style="text-align:right;"class="table-active">Total </td>
                        
                <td class="table-active">'.$TCI.'</td>
                <td class="table-active">'.$TTP.'</td>
                <td class="table-active">'.$TC.'</td>
                <td class="table-active">'.$TTD.'</td>
                        
                <td class="table-active" > '.$Total.'</td>
                 <td style="border:none;"></td>
                 <td style="border:none;"></td>
                 </tr>        
                 ';

            }

        }
        if ($type=='Class'){
            //SELECT DISTINCT * FROM departements d,formations f,classes c,uni_enseignements u,matieres m
            // WHERE d.idDept=f.idDept and f.idForm=c.idForm and m.idUnite=u.idUnite and c.idForm=u.idForm;
            $req = DB::table('departements')
                ->join( 'formations','formations.idDept', '=','departements.idDept' )
                ->join( 'classes','classes.idForm', '=','formations.idForm' )
                ->select('*')
                ->where('departements.libDept','like','%'.$search.'%')
                ->orWhere('formations.libForm','like','%'.$search.'%')
                ->orWhere('classes.nomClass','like','%'.$search.'%')
                ->distinct()
                ->get();

            foreach ($req as $data )
            {$result.='<table class=" table"><tr>
                <td class="table-success">'.$data->libDept.'</td>
                <td class="table-success">'.$data->libForm.'</td>
                <td class="table-success">'.$data->nomClass.'</td>
                <td style="border: none"></td>
                <td style="border: none"></td></tr>';
                $uni=uni_enseignement::where('idForm',$data->idForm)->get();
                foreach ($uni as $data_uni)
                {$mat=matiere::where('idUnite',$data_uni->idUnite)->get();
                    $result.='<tr><td class="table-active">'.$data_uni->nomUnite.'</td></tr>';
                    foreach ($mat as $mat_data)
                    {$pr=Affectedto::where('idMat',$mat_data->idMat)->get();
                        $result.='<tr><td style="border: none;"></td></td>
                        <td>'.$mat_data->libMat.'</td>';
                        if (count($pr)!=0){$pr['0']->nomProf;
                        $result.='<td>'.$pr['0']->nomProf.'</td>';
                        }else{
                            $result.='<td>Not Affected Yet</td>';
                        }
                        $result.='</tr>';
                    }

                }






            }


        }
        if ($type=='Matieres')
        {$matiere=matiere::all();
        $unite=DB::table('uni_enseignements')
            ->join('matieres','matieres.idUnite','=','uni_enseignements.idUnite')
            ->where('uni_enseignements.nomUnite','like','%'.$search.'%')
            ->orWhere('matieres.libMat','like','%'.$search.'%')
            ->select('uni_enseignements.*')
            ->distinct()
            ->get();

        $result.='<table class="table table-hover">';
         foreach ($unite as $un_data)
         {$result.='<tr><td class="table-active">'.$un_data->nomUnite.'</td></tr>';
             foreach ($matiere as $mat_data)
             {
                 if ($un_data->idUnite==$mat_data->idUnite)
                 {
                 $pr=Affectedto::where('idMat',$mat_data->idMat)->get();
                 if (count($pr)!=0){
                         $result.='<td class="">'.$mat_data->libMat.'</td>
                    <td class="table-success">'.$pr['0']->nomProf.'</td>';
                     }else{
                         $result.='<td class="">'.$mat_data->libMat.'</td>
                            <td class="table-danger">Not Affected Yet</td>';
                     }
                     $result.='</tr>';
                 }



                 }
             }

         }
        if ($type=='Departement')
        {
            $reqdep = DB::table('departements')
                ->join( 'formations','formations.idDept', '=','departements.idDept' )
                ->join( 'classes','classes.idForm', '=','formations.idForm' )
                ->select('*')
                ->where('departements.libDept','like','%'.$search.'%')
                ->orWhere('formations.libForm','like','%'.$search.'%')
                ->orWhere('classes.nomClass','like','%'.$search.'%')
                ->distinct()
                ->get();
            $result.='<table class="table table-hover">';
            foreach ($reqdep as $data_dep)
            {$result.='<tr class="table-success">
                <td>'.$data_dep->libDept.'</td>
             <td>'.$data_dep->libForm.'</td></tr>
             <tr><td class="table-active">'.$data_dep->nomClass.'</td></tr>';
                $uni=uni_enseignement::where('idForm',$data_dep->idForm)->get();

                foreach ($uni as $data_uni)
                {
                    $result.='<tr><td style="border: none"></td>
                    <td>'.$data_uni->nomUnite.'</td>
                    </tr>';
                }

            }

        }



        $result.='</table>';
        return $result;
    }
    public function matiere_du_Classe()
    {   //select m.* from matieres m,uni_enseignements u,formations f
        // where f.idForm=u.idForm
        // and u.idUnite=m.idUnite
        // and f.idForm='DSI1';
        $result='<option disabled="" id="del" selected>choisire une matiere</option>
<optgroup label="COURS">';
        $idForm=classe::where('idClass',request('idClasse'))->get();

        $Mats=DB::table('matieres')
            ->join( 'uni_enseignements','uni_enseignements.idUnite', '=','matieres.idUnite' )
            ->join( 'formations','formations.idForm', '=','uni_enseignements.idForm' )
            ->select('matieres.*')
            ->where('formations.idForm',$idForm['0']->idForm)
            ->get();

        foreach ($Mats as $data_mat)
        {if ($data_mat->nbhC!=0)
            $result.='<option value="'.$data_mat->idMat.'">'.$data_mat->libMat.'</option>';
        }
        $result.='</optgroup><optgroup label="TP">';
        foreach ($Mats as $data_mat)
        {if ($data_mat->nbhC==0)
            $result.='<option value="'.$data_mat->idMat.'">'.$data_mat->libMat.'</option>';
        }
        $result.='</optgroup>';
        return $result;
    }
    public function prof_demonders(){
        //select * from mats m,enseignants e
        // where e.matProf =m.MatProf
        // and m.Mat=10;
        $result='';
        $profs=DB::table('mats')
            ->join('enseignants','enseignants.matProf','=','mats.MatProf')
            ->where('mats.Mat',request('idMat'))
            ->orderBy('mats.N_choix')
            ->get();

        foreach ($profs as $data)
        {   $affected=Affectedto::where('MatProf',$data->MatProf)->get();
            if(count($affected)==0)
            $result.='<div class="ens" value="'.$data->MatProf.'"><p>'.$data->nom.' '.$data->prenom.'</p><input id="prof" name="" value="'.$data->MatProf.'" hidden></div>';
        }
        return $result;
    }
    public function profs(){
        $result='<option disabled="" id="" selected>Pick Teacher</option>
<optgroup label="Teacher">';
        $idDept=classe::where('idClass',request('idClasse'))->get();
        $mats=Mat::where('Mat',request('idMat'))->get();

        $profs=enseignant::where('idDept',$idDept['0']->idDept)->get();
        foreach ($profs as $prof)
        {   if(count($mats)!=0)
            {
            foreach ($mats as $mat)
            {
                if ($prof->matProf!=$mat->MatProf)
                {
                    $result.='<option value="'.$prof->matProf.'">'.$prof->nom.' '.$prof->prenom.'</option>';
                }
            }
            }else
            $result.='<option value="'.$prof->matProf.'">'.$prof->nom.' '.$prof->prenom.'</option>';

        }

        $result.='</optgroup>';

        return $result;
    }
    public function affectedto(){
        $result='';
        $affcted=Affectedto::where('idMat',request('idMat'))->get();
        foreach ($affcted as $data)
        {
            $result.='<div class="notsortable" value="'.$data->MatProf.'"><p>'.$data->nomProf.'</p></div>';
        }
        return $result;
    }
    public function affectedtotab()
    {
        $result='';
        $affcted=Affectedto::where('MatProf',request('MatProf'))->where('placed','no')->get();
        if (count($affcted)!=0)
        {foreach ($affcted as $data)
        {$mats=matiere::where('idMat',$data->idMat)->get();
            if ($mats ['0']->nbhTp!=0)
            {$type='TP';$heure=$mats ['0']->nbhTp;
            }
            else
            {$type='Cour';$heure=$mats ['0']->nbhTd+$mats ['0']->nbhC;
            }
            $result.='
                <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end event-azure mat cla" style="cursor:pointer;">
                     <div class="fc-content">
                          <span class="fc-time">'.$data->Class.'</span>
                          <span class="fc-title">'.$mats['0']->libMat.'</span>
                          <input class="matiere classe" type="hidden" value="'.$mats['0']->idMat.'_'.$data->Class.'" name=""> 
                          
                     </div>
                </a>
                        ';

        }
        }

        return $result;
    }
    public function classeEmp()
    {$result='';$j=1;
    $classe=emp_class::where('idClass',request('idClasse'))->get();
    for ($i=0;$i<6;$i++)
    {$matiere=matiere::all();$inL='';$inMA='';$inME='';$inJ='';$inV='';$inS='';
        $result.='<div class="fc-row" style="">
                 <div class="fc-bg">
                    <table class="text-left" id="table">
                    <tbody >
                     <tr style="font-family: Arial, serif;font-size:xx-small;overflow: hidden">
                     ';
                    if (count($classe)!=0)
                      foreach ($matiere as $data)
                      {   if ($data->idMat==@$classe[$i]->Lundi)
                          {$salla=emp_salle::where('Lundi',$classe[$i]->idClass)->where('Lession',$classe[$i]->Lession)->get();
                              @$prof=Affectedto::where('idMat',$data->idMat)->get();
                              if (count($prof)!=0)$profe=$prof['0']->nomProf; else $profe='';
                             $inL.=$salla[0]->idSalle.':'.$data->libMat.'<br>'.$profe;}
                             if ($data->idMat==@$classe[$i]->Mardi)
                          {$salla=emp_salle::where('Mardi',$classe[$i]->idClass)->where('Lession',$classe[$i]->Lession)->get();
                              @$prof=Affectedto::where('idMat',$data->idMat)->get();
                              if (count($prof)!=0)$profe=$prof['0']->nomProf; else $profe='';
                              $inMA.=$salla[0]->idSalle.':'.$data->libMat.'<br>'.$profe;}
                              if ($data->idMat==@$classe[$i]->Mercredi)
                          {$salla=emp_salle::where('Mercredi',$classe[$i]->idClass)->where('Lession',$classe[$i]->Lession)->get();
                              @$prof=Affectedto::where('idMat',$data->idMat)->get();
                              if (count($prof)!=0)$profe=$prof['0']->nomProf; else $profe='';
                              $inME.=$salla[0]->idSalle.':'.$data->libMat.'<br>'.$profe;}
                              if ($data->idMat==@$classe[$i]->Jeudi)
                          {$salla=emp_salle::where('Jeudi',$classe[$i]->idClass)->where('Lession',$classe[$i]->Lession)->get();
                              @$prof=Affectedto::where('idMat',$data->idMat)->get();
                              if (count($prof)!=0)$profe=$prof['0']->nomProf; else $profe='';
                              $inJ.=$salla[0]->idSalle.':'.$data->libMat.'<br>'.$profe;}
                              if ($data->idMat==@$classe[$i]->Vendredi)
                          {$salla=emp_salle::where('Vendredi',$classe[$i]->idClass)->where('Lession',$classe[$i]->Lession)->get();
                              @$prof=Affectedto::where('idMat',$data->idMat)->get();
                              if (count($prof)!=0)$profe=$prof['0']->nomProf; else $profe='';
                              $inV.=$salla[0]->idSalle.':'.$data->libMat.'<br>'.$profe;}
                              if ($data->idMat==@$classe[$i]->Samedi)
                          {$salla=emp_salle::where('Samedi',$classe[$i]->idClass)->where('Lession',$classe[$i]->Lession)->get();
                              @$prof=Affectedto::where('idMat',$data->idMat)->get();
                              if (count($prof)!=0)$profe=$prof['0']->nomProf; else $profe='';
                              $inS.=$salla[0]->idSalle.':'.$data->libMat.'<br>'.$profe;}}

        $result.='<td id="'.$j++ .'">'.$inL.'</td><td id="'.$j++.'">'.$inMA.'</td><td id="'.$j++.'">'.$inME.'</td><td id="'.$j++.'">'.$inJ.'</td><td id="'.$j++.'">'.$inV.'</td><td id="'.$j++.'">'.$inS.'</td>
                    </tr>
                    </tbody>
                    </table>
                 </div>
               </div>';

    }

    return $result;

    }
//    public function profEmp()
//    {$result='';
//        return $result;
//    }
    public function Emp_Salle()
    {$result='';$j=1;
    $room=emp_salle::where('idSalle',request('idRoom'))->get();
    for ($i=0;$i<6;$i++)
    {$inL='';$inMA='';$inME='';$inJ='';$inV='';$inS='';

        $result.='<div class="fc-row" style="">
                  <div class="fc-bg">
                      <table class="" id="table">
                          <tbody>
                          <tr  style="font-family: Arial, serif;font-size:xx-small;overflow: hidden">';
        if (isset($room[$i]))
        {
        if (@$room[$i]->Lundi!=null)
    {@$classe=emp_class::where('idClass',$room[$i]->Lundi)->where('Lession',($i+1))->get();
    if ($classe[0]->Lundi!=null)
    {$matiere=matiere::where('idMat',$classe[0]->Lundi)->get();
        @$prof=Affectedto::where('idMat',$matiere[0]->idMat)->get();
        if (count($prof)!=0)$profe=$prof['0']->nomProf; else $profe='';
        $inL.=$matiere[0]->libMat.'<br>'.$profe;
    }
    }
        if (@$room[$i]->Mardi!=null)
        {@$classe=emp_class::where('idClass',$room[$i]->Mardi)->where('Lession',($i+1))->get();
            if ($classe[0]->Mardi!=null)
            {
            $matiere=matiere::where('idMat',$classe[0]->Mardi)->get();
            @$prof=Affectedto::where('idMat',$matiere[0]->idMat)->get();
            if (count($prof)!=0)$profe=$prof['0']->nomProf; else $profe='';
            $inMA.=$matiere[0]->libMat.'<br>'.$profe;
            }

        }
        if (@$room[$i]->Mercredi!=null)
        {@$classe=emp_class::where('idClass',$room[$i]->Mercredi)->where('Lession',($i+1))->get();
        if ($classe[0]->Mercredi!=null)
    {
            $matiere=matiere::where('idMat',$classe[0]->Mercredi)->get();
            @$prof=Affectedto::where('idMat',$matiere[0]->idMat)->get();
            if (count($prof)!=0)$profe=$prof['0']->nomProf; else $profe='';
            $inME.=$matiere[0]->libMat.'<br>'.$profe;
        }
        }
        if (@$room[$i]->Jeudi!=null)
        {@$classe=emp_class::where('idClass',$room[$i]->Jeudi)->where('Lession',($i+1))->get();
        if ($classe[0]->Jeudi!=null)
    {
            $matiere=matiere::where('idMat',$classe[0]->Jeudi)->get();
            @$prof=Affectedto::where('idMat',$matiere[0]->idMat)->get();
            if (count($prof)!=0)$profe=$prof['0']->nomProf; else $profe='';
            $inJ.=$matiere[0]->libMat.'<br>'.$profe;
        }
        }
        if (@$room[$i]->Vendredi!=null)
        {@$classe=emp_class::where('idClass',$room[$i]->Vendredi)->where('Lession',($i+1))->get();
        if ($classe[0]->Vendredi!=null)
    {
            $matiere=matiere::where('idMat',$classe[0]->Vendredi)->get();
            @$prof=Affectedto::where('idMat',$matiere[0]->idMat)->get();
            if (count($prof)!=0)$profe=$prof['0']->nomProf; else $profe='';
            $inV.=$matiere[0]->libMat.'<br>'.$profe;
        }
        }
        if (@$room[$i]->Samedi!=null)
        {@$classe=emp_class::where('idClass',$room[$i]->Samedi)->where('Lession',($i+1))->get();
        if ($classe[0]->Samedi!=null)
    {
            $matiere=matiere::where('idMat',$classe[0]->Samedi)->get();
            @$prof=Affectedto::where('idMat',$matiere[0]->idMat)->get();
            if (count($prof)!=0)$profe=$prof['0']->nomProf; else $profe='';
            $inS.=$matiere[0]->libMat.'<br>'.$profe;
        }
        }
        }


    $result.='
            <td id="'.$j++.'">'.$inL .'</td>
            <td id="'.$j++.'">'.$inMA.'</td>
            <td id="'.$j++.'">'.$inME.'</td>
            <td id="'.$j++.'">'.$inJ .'</td>
            <td id="'.$j++.'">'.$inV .'</td>
            <td id="'.$j++.'">'.$inS .'</td>
                          </tr>
                          </tbody>
                      </table>
                  </div>
              </div>';

    }

        return $result;
    }

    public function salle_vide()
    {$result='';
        $salle=emp_salle::where(request('jour'),'')->get();
     for ($i=0;$i<6;$i++)
     {$result.='<div class="fc-row" style="">
                  <div class="fc-bg">
                      <table >
                          <tbody>
                          <tr style="font-size: large;font-family: Arial, serif">
                              <td>'.@$salle[$i]->idSalle.'</td>
                              <td>'.@$salle[$i]->Lession.'</td>
                          </tr>
                          </tbody>
                      </table>
                  </div>
              </div>';

     }

        return $result;
    }
    public function salle_vide2()
    {$result='<option disabled="" id="" selected>choisissez une salle</option>
                                    <optgroup label="Salle"></optgroup>';
    $seance=request('seance')+1;
    switch (\request('jour'))
    {case 'mon':$jour='Lundi';break;
        case 'tue':$jour='Mardi';break;
        case 'wed':$jour='Mercredi';break;
        case 'thu':$jour='Jeudi';break;
        case 'fri':$jour='Vendredi';break;
        case 'sat':$jour='Samedi';break;
    }

        $salle=emp_salle::where($jour,'')->where('Lession',$seance)->get();
    foreach ($salle as $data)
    $result.='<option value="'.@$data->idSalle.'">'.@$data->idSalle.'</option>';



        return $result;
    }
}
