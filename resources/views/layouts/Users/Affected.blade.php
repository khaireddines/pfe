@extends('layouts.admin.adminDashbord')
@section('custemImp')

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/material-dashboard.min790f.css')}}">
    <style>
        select option{text-align: center;}
        .box{

            min-height: 200px;
}
        p{
            font-family: Arial,serif;
            size: A4;
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
    <div class="content">
       <form id="form" action="/insert" method="post">
       <div class="container mt-lg-5">
        <div class="input-group mb-3 col-md-6 row" style="width: 30%;">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Class</label>
            </div>

                @csrf
            <select name="classe" class="Class custom-select" id="Class inputGroupSelect01">
                <option disabled="" selected value="">--Pick Class--</option>
                @foreach($class as $c)
                <option value="{{$c->idClass}}">{{$c->nomClass}}</option>

                @endforeach
            </select>
        </div>

        <div class="input-group mb-3 col-md-6 row " style="width: 30%;">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect02">Matiere</label>
            </div>
            <select name="mat" class="Mat custom-select" id="Mat inputGroupSelect02" disabled="true">
                <option value="">--pick Class First--</option>
            </select>
        </div>

<div class="row">
    <div class="card col-md-3 ml-3 mb-0 mt-0 Matdiv" style="display: none"><div class="card-body MatInfo"></div></div>

            <button type="submit" class="col-md-3 p-5 ml-auto btn btn-success btn-link btn-round insert" style="font-size: small;">
                <i class="material-icons" >done_all</i>
                Validate
            </button>


</div>
        <div class="row ">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header ">
                        <h4 class="card-title">Liste De - <small class="description">  Professeur Demander </small></h4>
                    </div>
                    <div class="ensDem card-body box" id="ensDem"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header ">
                        <h4 class="card-title">Liste De - <small class="description">Professeur Affectée a ce matiere</small></h4>
                    </div>
                    <div class="affect card-body box "id="affect"  ></div></div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-6">

                <button type="button" class="btn btn-primary btn-round newproff" data-toggle="modal" data-target="#noticeModal">
                    <i class="material-icons">add</i>
                    Teacher

                </button>
            </div>
        </div>
    </div>

       <div class="modal fade" id="noticeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
           <div class="modal-dialog modal-notice">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title" id="myModalLabel">Do you want to add another teacher ?</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                           <i class="material-icons">close</i>
                       </button>
                   </div>
                   <div class="modal-body">
                       <div class="instruction">
                           <div class="">
                               <div class="input-group">
                                   <div class="input-group-prepend">
                                       <label class="input-group-text" for="inputGroupSelect03">Teacher</label>
                                   </div>
                                   <select class="list_prof custom-select" id="list_prof inputGroupSelect03">
                                       <option disabled="" id="" selected>Pick Teacher</option>
                                       <optgroup label="Teacher"></optgroup>
                                   </select>
                               </div>
                           </div>
                       </div>
                   <div class="modal-footer justify-content-center">
                       <button type="button" class="btn btn-info btn-round addproff" data-dismiss="modal">Sounds good!</button>
                   </div>
                   </div>
               </div>
           </div>
       </div>
       </form>
   </div>
    </div>
@endsection

@section('custemScript')

    <script>
        @if (session('alert2'))
        swal({
            position: 'top-end',
            type: 'success',
            title: 'YaY!!',
            text: 'Affected Successfuly',
            showConfirmButton: false,
            timer: 1000
        });
        $('.swal2-input').addClass('form-control');
        $('.swal2-textarea').addClass('form-control');

        $(":input[type|='range']").addClass('form-control');
        @endif
        $(".AF").addClass('active');
        var $tab=[];
        $(".newproff").hide();
        $(".addproff").hide();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#ensDem").sortable({connectWith:"#affect",
            receive: function(event, ui) {
                $(this).find("#prof").prop('name','');}});
        $("#affect").sortable({connectWith:"#ensDem",
            receive: function(event, ui) {
                $(this).find("#prof").prop('name','Prof[]');
            },
            items: "div:not(.notsortable)"});
        $(".Class").change(function () {
            $(".Matdiv").hide();
            var idClasse=this.value;
            $(".affect").html("");
            $(".ensDem").html("");
            $.ajax({
                url:"/fetch_Mats",
                method:"POST",
                data:{idClasse:idClasse},
                dataType:"text",
                success:function(data)
                {$(".Mat").html();

                    $(".Mat").html(data);
                 $(".Mat").prop("disabled", false);

                }
            });
        });
        $(".Mat").on('change',function () {
            var idMat=this.value;
            $tab=[];

            $(".newproff").show();
            $.ajax({
                url:"/fetch_voeux",
                method:"POST",
                data:{idMat:idMat},
                dataType:"text",
                success:function(data)
                {$("#ensDem").html(data);
                $(".ens").css("cursor","pointer");
                }
                });
            $.ajax({
                url:"/affectedto",
                method:"POST",
                data:{idMat:idMat},
                dataType:"text",
                success:function (data) {
                    $("#affect").html(data);

                    $('.affected').each(function () {
                        console.log($(this).attr('value'));
                       $tab.push($(this).attr('value'));
                    });

                    $tab.forEach(function(element) {
                         $(".ens value='"+element+"'").remove();
                    });
                }});
            $.ajax({
                url:"/MatInfo",
                method:"POST",
                data:{idMat:idMat},
                dataType:"text",
                success:function(data)
                {$('.MatInfo').html(data);
                $('.Matdiv').show();

                }
            });
            });
        $(".newproff").click(function () {
            var idClasse=$(".Class option:selected").val();
            var idMat=$(".Mat option:selected").val();

            $.ajax({
                url:"/fetch_prof",
                method:"POST",
                data:{idClasse:idClasse,idMat:idMat},
                dataType:"text",
                success:function(data)
                {
                    $(".list_prof").html(data);
                    $tab.forEach(function(element) {
                        $(".list_prof option[value^="+element+"]").hide();
                    });
                }
            });
        });
        $(".list_prof").change(function () {
            $(".addproff").show();
        })
        var count=0;
        $(".addproff").click(function () {
            var val=$(".list_prof option:selected").val();
            var list =val.split('_');
            var matProf=list[0];
            var matcount=list[1];
            var totalhours=list[2];
            var nom=$(".list_prof option:selected").text();
            var id='div_'+count;
            $(".ensDem").append('<div class="ens" id="'+id+'" style="cursor:pointer;"><hr>'+
                '<p style="float:left; ">'+nom+' &nbsp &nbsp &nbsp &nbsp   M:'+matcount+'&nbsp &nbsp &nbsp &nbsp   T.H:'+totalhours+'</p>' +
                '<button id="'+count+'" value="" type="button" class="X btn btn-danger" style="float: right;padding-top: 5px;\n' +
                'padding-right: 10px;\n' +
                'padding-left: 10px;\n' +
                'padding-bottom: 5px;">X</button>' +
                '<input id="prof" class="form-control" name="" value="'+matProf+'" hidden>' +
                '<br></div>');
            count++;
            $tab.push((matProf));
            $(".addproff").hide();

        });
        $(".ensDem").on('click','.X',function () {
            var $num=this.id;


            var index = $tab.indexOf($("#div_"+$num).find('#prof').val());
            if (index > -1) {
                $tab.splice(index, 1);
            };
            count--;
            $("#div_"+$num).remove();
        });
        $(".affect").on('click','.X',function () {
            var $num=this.id;
            $("#div_"+$num).remove();
            count--;
        });
        // $(".insert").click(function () {
        //
        //     $.ajax({
        //         url: $('form').attr('action'),
        //         type: 'post',
        //         data: $('form').serialize(),
        //         async: false,
        //         dataType:"text",
        //         success:function(data)
        //         {
        //             alert('works');
        //         }
        //     });
        // });



    </script>
@endsection