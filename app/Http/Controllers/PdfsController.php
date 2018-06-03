<?php

namespace App\Http\Controllers;


use App\Affectedto;
use App\emp_class;
use App\emp_prof;
use App\emp_salle;
use App\matiere;
use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade as PDFF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Auth;

class PdfsController extends Controller
{
    private $footer='
          <div style="float: right"></div>
                <div style="float: right">
                    © <script>document.write(new Date().getFullYear())</script>2018, made with care by <a href="#AceVel" target="_blank">AceVel Team</a> for a better web.
                </div>
        ';

    public function repartition(Request $request)
    {
        $name=Auth::user()->name;




        $pdf= PDFF::loadHTML('

<style>table {
font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}
.table-danger{background-color: #fccac7}
.table-success{background-color: #cde9ce}
.table-active{background-color: rgba(0,0,0,.075);}
tr:nth-child(even) {background-color: #f2f2f2;}
th{background-color: #f2f2f2;}
th, td {
    padding: 8px;
    text-align: center;
    border: 1px solid #ddd;
    height: 40px;
    width: 40px;
    max-height: 50px;
    max-width: 50px;
}

</style>
' .\request('datapdf').'<footer style="padding: .9375rem 0;text-align: center;display: flex;">
          <hr style="margin-top: 20px"><div style="margin-bottom: 20px"><div style="float: left;margin-top: 40px">Downloaded By: '.$name.'</div>'.$this->footer.'</div>')->setPaper('a4', 'landscape');
        $date=date('l jS \of F Y h:i:s A');
        return $pdf->download('Search&Go|'.$date.'.pdf');



    }

    public function Classes(Request $request)
    {
        $name=Auth::user()->name;
        $result='<table id="table" border="1">
<thead><tr><th>\</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr></thead>
                    <tbody>';


        $classe=emp_class::where('idClass',$request['classeid'])->get();

        for ($i=0;$i<6;$i++)
        {$matiere=matiere::all();$inL='';$inMA='';$inME='';$inJ='';$inV='';$inS='';
            $result.='                   
                     <tr style="font-family: Arial, serif;font-size:xx-small;overflow: hidden;text-align: center !important;" >
                     <td style="width: 10px">S'.($i+1).'</td>
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

            $result.='<td >'.$inL.'</td><td >'.$inMA.'</td><td >'.$inME.'</td><td >'.$inJ.'</td><td >'.$inV.'</td><td >'.$inS.'</td>
                    </tr>
                    ';
        }

        $result.='</tbody></table>';

        $pdf= PDFF::loadHTML('<style>
table {
font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}
tr:nth-child(even) {background-color: #f2f2f2;}
th{background-color: #f2f2f2;
    }
th, td {


    padding: 8px;
    text-align: center;
    border: 1px solid #ddd;
    height: 40px;
    width: 40px;
    max-height: 50px;
    max-width: 50px;
}

       
</style>'.$result.'<footer style="padding: .9375rem 0;text-align: center;display: flex;">
          <hr style="margin-top: 20px"><div style="margin-bottom: 20px"><div style="float: left;margin-top: 40px">Downloaded By: '.$name.'</div>'.$this->footer.'</div>')->setPaper('a4', 'landscape');
        $date=date('l jS \of F Y h:i:s A');
        return $pdf->download('ClassSchedule|'.$date.'.pdf');

    }

    public function Ense(Request $request)
    {
        $name=Auth::user()->name;
        $result='<table border="1">
<thead><tr><th>\</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr></thead>
<tbody>';



        for ($i=0;$i<6;$i++)
        { $emp_prof=emp_prof::where('MatProf',$request['profid'])->where('Lession',($i+1))->get();



            $result.='
                      
                          <tr style="font-family: Arial, serif;font-size:xx-small;overflow: hidden;text-align: center !important;" >
                          <td style="width: 10px">S'.($i+1).'</td>';

            if (isset($emp_prof['0'])&&$emp_prof['0']->Lundi!='')
            {$salle=emp_salle::where('Lession',($i+1))->where('Lundi',$emp_prof['0']->Lundi)->get();
                $classe=emp_class::where('idClass',$emp_prof['0']->Lundi)->where('Lession',($i+1))->get();
                $mats=matiere::where('idMat',$classe['0']->Lundi)->get();
                $result.=' <td>'.$emp_prof['0']->Lundi.' '.@$mats['0']->libMat.'</td>';

            }else
            {
                $result.=' <td ></td>';
            }

            if (isset($emp_prof['0'])&&$emp_prof['0']->Mardi!='')
            {$salle=emp_salle::where('Lession',($i+1))->where('Mardi',$emp_prof['0']->Mardi)->get();
                $classe=emp_class::where('idClass',$emp_prof['0']->Mardi)->where('Lession',($i+1))->get();
                $mats=matiere::where('idMat',$classe['0']->Mardi)->get();
                $result.=' <td>'.$emp_prof['0']->Mardi.' '.@$mats['0']->libMat.'</td>';

            }else
            {
                $result.=' <td ></td>';
            }


            if (isset($emp_prof['0'])&&$emp_prof['0']->Mercredi!='')
            {$salle=emp_salle::where('Lession',($i+1))->where('Mercredi',$emp_prof['0']->Mercredi)->get();
                $classe=emp_class::where('idClass',$emp_prof['0']->Mercredi)->where('Lession',($i+1))->get();
                $mats=matiere::where('idMat',$classe['0']->Mercredi)->get();
                $result.=' <td>'.$emp_prof['0']->Mercredi.' '.@$mats['0']->libMat.'</td>';

            }else
            {
                $result.=' <td ></td>';
            }
            if (isset($emp_prof['0'])&&$emp_prof['0']->Jeudi!='')
            {$salle=emp_salle::where('Lession',($i+1))->where('Jeudi',$emp_prof['0']->Jeudi)->get();
                $classe=emp_class::where('idClass',$emp_prof['0']->Jeudi)->where('Lession',($i+1))->get();
                $mats=matiere::where('idMat',$classe['0']->Jeudi)->get();
                $result.=' <td>'.$emp_prof['0']->Jeudi.' '.@$mats['0']->libMat.'</td>';

            }else
            {
                $result.=' <td ></td>';
            }
            if (isset($emp_prof['0'])&&$emp_prof['0']->Vendredi!='')
            {$salle=emp_salle::where('Lession',($i+1))->where('Vendredi',$emp_prof['0']->Vendredi)->get();
                $classe=emp_class::where('idClass',$emp_prof['0']->Vendredi)->where('Lession',($i+1))->get();
                $mats=matiere::where('idMat',$classe['0']->Vendredi)->get();
                $result.=' <td>'.$emp_prof['0']->Vendredi.' '.@$mats['0']->libMat.' </td>';

            }else
            {
                $result.=' <td></td>';
            }
            if (isset($emp_prof['0'])&&$emp_prof['0']->Samedi!='')
            {$salle=emp_salle::where('Lession',($i+1))->where('Samedi',$emp_prof['0']->Samedi)->get();
                $classe=emp_class::where('idClass',$emp_prof['0']->Samedi)->where('Lession',($i+1))->get();
                $mats=matiere::where('idMat',$classe['0']->Samedi)->get();
                $result.=' <td >'.$emp_prof['0']->Samedi.' '.@$mats['0']->libMat.'</td>';

            }else
            {
                $result.=' <td ></td>';
            }



            $result.='</tr>';
        }
        $result.='</tbody></table>';
        $pdf= PDFF::loadHTML('<style>
table {
font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}
tr:nth-child(even) {background-color: #f2f2f2;}
th{background-color: #f2f2f2;
    }
th, td {
    padding: 8px;
    text-align: center;
    border: 1px solid #ddd;
    height: 40px;
    width: 40px;
    max-height: 50px;
    max-width: 50px;
}

       
</style>'.$result.'<footer style="padding: .9375rem 0;text-align: center;display: flex;">
          <hr style="margin-top: 20px"><div style="margin-bottom: 20px"><div style="float: left;margin-top: 40px">Downloaded By: '.$name.'</div>'.$this->footer.'</div>')->setPaper('a4', 'landscape');
        $date=date('l jS \of F Y h:i:s A');
        return $pdf->download('ProfessorSchedule|'.$date.'.pdf');
    }

    public function ClassRoom(Request $request)
    {$name=Auth::user()->name;
        $result='<table id="table" border="1">
<thead><tr><th>\</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr></thead>
                          <tbody>';
        $room=emp_salle::where('idSalle',request('Roomid'))->get();
        for ($i=0;$i<6;$i++)
        {$inL='';$inMA='';$inME='';$inJ='';$inV='';$inS='';

            $result.='
                      
                          <tr style="font-family: Arial, serif;font-size:xx-small;overflow: hidden;text-align: center !important;" >
                     <td style="width: 10px">S'.($i+1).'</td>';
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


            $result.='<td>'.$inL .'</td><td>'.$inMA.'</td><td>'.$inME.'</td><td>'.$inJ .'</td><td>'.$inV .'</td><td>'.$inS .'</td>
                          </tr> ';
        }
        $result.='</tbody></table>';

        $pdf= PDFF::loadHTML('<style>
table {
font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}
tr:nth-child(even) {background-color: #f2f2f2;}
th{background-color: #f2f2f2;
    }
th, td {
    padding: 8px;
    text-align: center;
    border: 1px solid #ddd;
    height: 40px;
    width: 40px;
    max-height: 50px;
    max-width: 50px;
}

       
</style>'.$result.'<footer style="padding: .9375rem 0;text-align: center;display: flex;">
          <hr style="margin-top: 20px"><div style="margin-bottom: 20px"><div style="float: left;margin-top: 40px">Downloaded By: '.$name.'</div>'.$this->footer.'</div>')->setPaper('a4', 'landscape');
        $date=date('l jS \of F Y h:i:s A');
        return $pdf->download('ClassRoomSchedule|'.$date.'.pdf');
    }
}
