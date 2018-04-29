@extends('layouts.app')
@section('custemImp')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <style>
        se{
            font-weight: bolder;
        }
        .se{
            font-weight: bolder;
        }
        th{
            text-align:center;
        }
        textarea
        {
            width: 100%;
            height: 100%;
            resize: none;

        }


        * {
            box-sizing:border-box;
        }
        .left {

            padding-top:20px;
            padding-bottom:20px;
            margin: auto;
            float: left;
            width:35%; /* The width is 20%, by default */
        }

        .main {
            margin: auto;
            padding-top:20px;
            float: left;
            width:30%; /* The width is 60%, by default */
        }

        .right {
            margin-bottom: 2%;
            padding-top:20px;
            float: right;
            width:35%; /* The width is 20%, by default */
        }


        /* Use a media query to add a break point at 800px: */
        @media screen and (max-width:800px) {
            .left, .main, .right {
                width:100%; /* The width is 100%, when the viewport is 800px or smaller */
            }
        }
        /* for the DayTable */
        .tg  {border-collapse:collapse;border-spacing:0;border-color:#999; width: 75%; height: 75%; margin:auto; }
        .tg td{font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-top-width:1px;border-bottom-width:1px;border-color:#999;color:#444;background-color:#F7FDFA;}
        .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-top-width:1px;border-bottom-width:1px;border-color:#999;color:#fff;background-color:#26ADE4;}
        .tg .tg-jsj9{font-size:16px;font-family:"Comic Sans MS", cursive, sans-serif !important;;text-align:center;vertical-align:top}
        .tg .tg-aqpe{font-size:16px;font-family:"Comic Sans MS", cursive, sans-serif !important;;text-align:center}
        .tg .tg-gu9h{background-color:#D2E4FC;font-size:16px;font-family:"Comic Sans MS", cursive, sans-serif !important;;text-align:center;vertical-align:top}

    </style>
@endsection
@section('content')
<div style="margin-left: 2%;margin-right: 2%;">
    <div class="left">
    <p class="c1"style="text-align: center;font-size: large;">République Tunisienne <br>
        Ministére de l'Enseignement Supérieur,de la <br>
        Recherche Scientifique

            Direction Générale des Etudes Technologiques <br>
            __**__ <br>
            Institue Supérieur des Etudes Technologiques <br>
            Sousse
        </p>
    </div>
    <div class="main" style="background: none">
        <img src="{{asset('img/TnLogo.png')}}"  style="max-width:30%;display: block;margin-left: auto;margin-right: auto;"/>
        <br>
    </div>
    <div class="right">
        <p class="c2" style="text-align: center;font-size: large;">
        الجمهرية التونسية <br>
        وزارة التعليم العالي والبحث العلمي <br>
            <br>
        لإدارة العامة للدراسات التكنولوجية <br>
        __**__ <br>
        المعهد العالي للدراسات التكنولوجية <br>
        سوسة <br>
        </p>

    </div>
    <div class="personalInfo">
    <p style="text-align: center;margin-bottom: -1%;font-size: large;">Département Technologies de l'Informatique</p> <br>
    <hr>
    <p style="text-align: center;font-size: larger;font-style: italic;font-weight: bold;">Fiche de Voeux de la charge d'enseignement <br>
    Pour le {{$sess['0']->nomSession}} {{$sess['0']->anne_univ}}</p>
    <p style="text-align: left;font-size: larger;">Cher(e) collègue,<br>
    Veuillez communiquer à la direction du département Technologies de l'Informatique votre fiche de Voeux pour
        <span style="font-weight: bold;"> La rentrée du {{$sess['0']->nomSession}} ({{$sess['0']->anne_univ}}) dûment remplie.
            A rendre au secrétariat du département TI avant le 30/11/{{$sess['0']->anne_univ}}</span></p>
    <table border="0">

        <tr><td><se>Nom:</se>  {{$prof['0']->nom}}.</td><td><se>Prénom:</se>  {{$prof['0']->prenom}}. </td></tr>
        <tr><td><se>Grade:</se>  {{$prof['0']->grade}}.</td><td><se>Date obtention du Grade:</se>  {{$prof['0']->date_nomi}}. </td></tr>
        <tr><td><se>E-mail:</se>  {{$prof['0']->email}}.</td><td><se>GSM:</se>  {{$prof['0']->n_tele}}.  </td></tr>
    </table>
</div>
    <form  method="post">
        {{csrf_field()}}
    <div class="MatChoice">

        <table border="0" style="width: 100%;margin-top: 2%">
        <tr>
            <th style="width: 50%" align="center">Cours Intégrés</th>
            <th style="width: 50%" align="center">Ateliers</th>
        </tr>
        <tr>
            <td align="center">
                <?php
                $fi= new \App\fich_voeux();
                @$mats=$fi->matieres($prof['0']->idDept);?>
                <div class="CI" id="origin1"></div>
                <button type="button" class="add1  btn btn-outline-primary" style="margin-top:3%;">Ajouter</button>
            </td>
            <td align="center"><div class="ATT" id="origin2"></div>
                <button type="button" class="add2 btn btn-outline-primary" style="margin-top:3%;">Ajouter</button>
            </td>

        </tr>
    </table>
    </div>
    <div class="Q&A">
        <br>
        <p class="se">Voulez-vous prendre en charge des heures supplémentaires(Oui/Non):
            <input type="radio" name="hs" value="Oui" id="oui" checked> Oui   <input type="radio" name="hs" value="Non" id="non"> Non .
        </p>
        <div id="ifoui"><p class="se">Précisez la charge Globale souhaitée : <input type="number" class="form-control" style="width: 20%;" min="0" name="nbhT" id="" placeholder="Example: 20"> </p>
        </div>
        <table border="0" style="width: 100%;margin-top: 2%">
            <tr>
                <th style="width: 50%" align="center">Contraintes Pédagogiques :</th>
                <th style="width: 50%" align="center">Contraintes Personnelles :</th>
            </tr>
            <tr>
                <td align="center"><textarea class="form-control" name="con_peda" id="" maxlength="260" rows="3"></textarea></td>
                <td align="center"><textarea class="form-control" name="con_per" id="" maxlength="260"  rows="3"></textarea></td>
            </tr>
        </table>
    </div>
    <div class="dayTab">
        <br>
        <p class="se">Horaire D'enseignement souhaité :(4jours au minimum) :</p>
        <table class="tg">
            <tr>
                <th class="tg-aqpe">\</th>
                <th class="tg-jsj9">Lundi</th>
                <th class="tg-jsj9">Mardi</th>
                <th class="tg-jsj9">Mercredi</th>
                <th class="tg-jsj9">Jeudi</th>
                <th class="tg-jsj9">Vendredi</th>
                <th class="tg-jsj9">Samedi</th>
            </tr>
            <tr>
                <td class="tg-jsj9">{{$time['0']->name}} ({{$time['0']->time}})</td>
                <td class="tg-gu9h"><input type="checkbox" value="S1" name="Lundi[]" class="checkbox"/></td>
                <td class="tg-jsj9"><input type="checkbox" value="S1" name="Mardi[]"  class="checkbox"/></td>
                <td class="tg-gu9h"><input type="checkbox" value="S1" name="Mercredi[]"  class="checkbox"/></td>
                <td class="tg-jsj9"><input type="checkbox" value="S1" name="Jeudi[]"  class="checkbox"/></td>
                <td class="tg-gu9h"><input type="checkbox" value="S1" name="Vendredi[]"  class="checkbox"/></td>
                <td class="tg-jsj9"><input type="checkbox" value="S1" name="Samedi[]"  class="checkbox"/></td>
            </tr>
            <tr>
                <td class="tg-jsj9">{{$time['1']->name}} ({{$time['1']->time}})</td>
                <td class="tg-gu9h"><input type="checkbox" value="S2" name="Lundi[]"  class="checkbox"/></td>
                <td class="tg-jsj9"><input type="checkbox" value="S2" name="Mardi[]"   class="checkbox"/></td>
                <td class="tg-gu9h"><input type="checkbox" value="S2" name="Mercredi[]"  class="checkbox"/></td>
                <td class="tg-jsj9"><input type="checkbox" value="S2" name="Jeudi[]"  class="checkbox"/></td>
                <td class="tg-gu9h"><input type="checkbox" value="S2" name="Vendredi[]"  class="checkbox"/></td>
                <td class="tg-jsj9"><input type="checkbox" value="S2" name="Samedi[]"  class="checkbox"/></td>
            </tr>
            <tr>
                <td class="tg-jsj9">{{$time['2']->name}} ({{$time['2']->time}})</td>
                <td class="tg-gu9h"><input type="checkbox" value="S3" name="Lundi[]"  class="checkbox"/></td>
                <td class="tg-jsj9"><input type="checkbox" value="S3" name="Mardi[]"  class="checkbox"/></td>
                <td class="tg-gu9h"><input type="checkbox" value="S3" name="Mercredi[]"  class="checkbox"/></td>
                <td class="tg-jsj9"><input type="checkbox" value="S3" name="Jeudi[]"  class="checkbox"/></td>
                <td class="tg-gu9h"><input type="checkbox" value="S3" name="Vendredi[]"  class="checkbox"/></td>
                <td class="tg-jsj9"><input type="checkbox" value="S3" name="Samedi[]"  class="checkbox"/></td>
            </tr>
            <tr>
                <td class="tg-jsj9">{{$time['3']->name}} ({{$time['3']->time}})</td>
                <td class="tg-gu9h"><input type="checkbox" value="S4" name="Lundi[]"  class="checkbox"/></td>
                <td class="tg-jsj9"><input type="checkbox" value="S4" name="Mardi[]"  class="checkbox"/></td>
                <td class="tg-gu9h"><input type="checkbox" value="S4" name="Mercredi[]"  class="checkbox"/></td>
                <td class="tg-jsj9"><input type="checkbox" value="S4" name="Jeudi[]"  class="checkbox"/></td>
                <td class="tg-gu9h"><input type="checkbox" value="S4" name="Vendredi[]"  class="checkbox"/></td>
                <td class="tg-jsj9"><input type="checkbox" value="S4" name="Samedi[]"  class="checkbox"/></td>
            </tr>
            <tr>
                <td class="tg-jsj9">{{$time['4']->name}} ({{$time['4']->time}})</td>
                <td class="tg-gu9h"><input type="checkbox" value="S5" name="Lundi[]"  class="checkbox"/></td>
                <td class="tg-jsj9"><input type="checkbox" value="S5" name="Mardi[]"  class="checkbox"/></td>
                <td class="tg-gu9h"><input type="checkbox" value="S5" name="Mercredi[]"  class="checkbox"/></td>
                <td class="tg-jsj9"><input type="checkbox" value="S5" name="Jeudi[]"  class="checkbox"/></td>
                <td class="tg-gu9h"><input type="checkbox" value="S5" name="Vendredi[]"  class="checkbox"/></td>
                <td class="tg-jsj9"><input type="checkbox" value="S5" name="Samedi[]"  class="checkbox"/></td>
            </tr>
            <tr>
                <td class="tg-jsj9">{{$time['5']->name}} ({{$time['5']->time}})</td>
                <td class="tg-gu9h"><input type="checkbox" value="S6" name="Lundi[]" class="checkbox"/></td>
                <td class="tg-jsj9"><input type="checkbox" value="S6" name="Mardi[]" class="checkbox"/></td>
                <td class="tg-gu9h"><input type="checkbox" value="S6" name="Mercredi[]" class="checkbox"/></td>
                <td class="tg-jsj9"><input type="checkbox" value="S6" name="Jeudi[]" class="checkbox"/></td>
                <td class="tg-gu9h"><input type="checkbox" value="S6" name="Vendredi[]" class="checkbox"/></td>
                <td class="tg-jsj9"><input type="checkbox" value="S6" name="Samedi[]" class="checkbox"/></td>
            </tr>
        </table>
    </div>
        <button type="submit" class="sub btn btn-outline-success" formaction="/store" value="Confirmer" style="float: right; margin-top: 2%;">Confirmer</button>
    </form>

</div>
@endsection
@section('custemScript')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // $(".draggable").draggable({ cursor: "crosshair", revert: "invalid"});
        //
        //
        // $("#origin1").droppable({ accept: ".draggable1", drop: function(event, ui) {
        //         console.log("drop");
        //         $(this).removeClass("border").removeClass("over");
        //         var dropped = ui.draggable;
        //         var droppedOn = $(this);
        //         $(dropped).detach().css({top: 0,left: 0}).appendTo(droppedOn);
        //
        //
        //     }});
        // $("#origin2").droppable({ accept: ".draggable2", drop: function(event, ui) {
        //         console.log("drop");
        //         $(this).removeClass("border").removeClass("over");
        //         var dropped = ui.draggable;
        //         var droppedOn = $(this);
        //         $(dropped).detach().css({top: 0,left: 0}).appendTo(droppedOn);
        //
        //
        //     }});
        $("#origin1").sortable();
        $("#origin2").sortable();



        var $count1=0;
        var $count2=0;
        var $count1max=0;
        var $count2max=0;
        var $days=0;
        var $tab=[];
        $(".add1").click(function () {
            $count1++;
            $count1max++;

            var $id='C_'+$count1;
            var $result='<div class="Class" id='+$id+'>' +
                '<hr>' +
                '<select name="idForm"  class="Class1 custom-select custom-select-lg mb-3" style="width:50%;">\n' +
                '<option>----faire un choix----</option>' +
                '                    @foreach($class as $class_data)\n' +
                '                        <option value="{{$class_data->idForm}}"\n'   +
                '                        >{{$class_data->nomClass}}</option>\n' +
                '@endforeach \n'+
                '</select>';

            $(".CI").append($result);
        });

        $(".CI").on('change', '.Class1',function () {
            var $id='C_'+$count1;
            var idForm=this.value;
            $.ajax({
                url:"/fetch_matsC",
                method:"POST",
                data:{idForm:idForm,id:$id},
                dataType:"text",
                success:function(data)
                {   $(".C").remove();
                    $("#"+$id).append(data);
                    $tab.forEach(function(element) {
                        $(".C option[value="+element+"]").remove();
                    });
                }
            });
            $(".add1").hide();

        });
        $(".add2").click(function () {
            $count2++;
            $count2max++;

            var $id='AT_'+$count2;
            var $result='<div class="Class" id='+$id+'>' +
                '<hr>' +
                '<select name="idForm"  class="Class2 custom-select custom-select-lg mb-3" style="width:50%;">\n' +
                '<option>----faire un choix----</option>' +
                '                    @foreach($class as $class_data)\n' +
                '                        <option value="{{$class_data->idForm}}"\n'   +
                '                        >{{$class_data->nomClass}}</option>\n' +
                '@endforeach \n'+
                '</select>';

            $(".ATT").append($result);
        });


        $(".ATT").on('change', '.Class2',function () {

            var $id='AT_'+$count2;
            var idForm=this.value;
            $.ajax({
                url:"/fetch_matsAT",
                method:"POST",
                data:{idForm:idForm,id:$id},
                dataType:"text",
                success:function(data)
                {   $(".AT").remove();
                    $("#"+$id).append(data);
                    $tab.forEach(function(element) {
                        $(".AT option[value="+element+"]").remove();
                    });
                }
            });
            {{--var $result='<div class="DAT" id='+$id+'>' +--}}
                {{--'<hr>' +--}}
                {{--'<select name="idMat" id='+$id+' class="AT custom-select custom-select-lg mb-3">\n' +--}}
                {{--'<option value="">----faire un choix----</option>' +--}}
                {{--'                    @foreach($mats as $mats_data)\n' +--}}
                {{--'@if($mats_data->nbhC==null) \n'+--}}
                {{--'                        <option value="{{$mats_data->idMat}}"\n'   +--}}
                {{--'                        >{{$mats_data->libMat}}</option>\n' +--}}
                {{--'@endif \n'+--}}
                {{--'@endforeach\n' +--}}
                {{--'</select>' +--}}
                {{--'</div>'    ;--}}


                $(".add2").hide();

        });
        $(".CI").on('change', '.C',function () {
            var $text=$(".Class1 option:selected").text();
            var $text2=$(".C option:selected").text();
            var $val=$(".C").val();
            var $id=this.id;
            var split_id = $id.split("_");
            var $num=split_id[1];

              $('#C_'+$num).html("<div class='draggable draggable1'><hr>"+$text +"=>"+$text2 +
                    "<input name='idMat1[]' value="+$val+" hidden>" +
                    "<input name='nomClass1[]' value="+$text+" hidden>" +
                    "<button type='button' id='"+$num+"' value='"+$val+"' class='X1 btn btn-danger' style='float: right;'>X</button>"+
                     "</div>"
                );

            if($count1max<4)
            {
                $(".add1").show();
            }
            $tab.push(($val));


        });
        $(".ATT").on('change', '.AT',function () {
            var $text=$(".Class2 option:selected").text();
            var $text2=$(".AT option:selected").text();
            var $val=$(".AT").val();
            var $id=this.id;
            var split_id = $id.split("_");
            var $num=split_id[1];

            $('#AT_'+$num).html("<div class='draggable draggable2'><hr>"+$text +"=>"+$text2 +
                "<input name='idMat2[]' value="+$val+" hidden>" +
                "<input name='nomClass2[]' value="+$text+" hidden>" +
                "<button id='"+$num+"' value='"+$val+"' class='X2 btn btn-danger' style='float: right;'>X</button>" +
                "</div>"
            );
            if($count2max<4)
            {
                $(".add2").show();
            }
            $tab.push(($val));
        });
        $(".CI").on('click','.X1',function () {
            $count1max--;
            var $num=this.id;
            var $val=this.value;
            var index = $tab.indexOf($val);
            if (index > -1) {
                $tab.splice(index, 1);
            }
            $("#C_"+$num).remove();


            $(".add1").show();
        });
        $(".ATT").on('click','.X2',function () {
            var $num=this.id;
            var $val=this.value;
            var index = $tab.indexOf($val);
            if (index > -1) {
                $tab.splice(index, 1);
            }
            $("#AT_"+$num).remove();
            $count2max--;
            $(".add2").show();
        });
        $("#oui").change(function () {
            if($( "#oui:checked" ))
            {
                $("#ifoui").show();
            }
        });
        $("#non").click(function () {

            {
                $("#ifoui").hide();
            }
        });
        $(".sub").hide();
        $(".checkbox").click(function () {
            if(this.checked==true)
            {$days++;}
            else
            {$days--;}
            if($days<15)
            {$(".sub").hide();}
            else{$(".sub").show();}
        });

        // html2canvas(document.body).then(function(canvas)
        // { var img = canvas.toDataURL('image/png');
        // var doc = new jsPDF();
        // doc.addImage(img, 'JPEG',595,842);
        // doc.save('test.pdf'); });﻿
    </script>
@endsection