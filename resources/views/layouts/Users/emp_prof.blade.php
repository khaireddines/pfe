@extends('layouts.admin.adminDashbord')

@section('custemImp')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        tr{height:10px; !important; max-width: 100px!important;}
        .card-calendar table td{text-align: center!important;
            }
        td{max-width: 100px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;}
         .scroll{display:block;
            overflow:hidden;
             position:relative;
             scrollbar-y:left;
            max-height: fit-content}













    </style>
@endsection

@section('content')
    <div class="container-fluid">
    <form action="/emp_insert" method="POST">
        @csrf
        <div class="row "style="width: 100%;">
            <div class="col-md-8 " style="margin-bottom:-40px">
            <div class="card card-calendar">
                <div class="card-body">
                    <div id="fullCalendar" class="fc fc-unthemed fc-ltr">
                        <div class="fc-toolbar fc-header-toolbar">
                            <div class="fc-left"><h2>Class</h2></div>
                            <div class="pl-4 pb-4" style="float: left;">
                                <select name="class" id="class" class="form-control" style="font-family:Roboto, Helvetica, Arial, sans-serif;font-style:oblique">
                                    <option value="0" selected="selected" disabled="disabled">pick Class</option>
                                    <?php echo $classes ?>
                                </select>
                            </div>
                            <div class="fc-right">
                                <button type="button" style="float: right; display: none;" class="pdfClass btn btn-outline-primary">PDF</button>
                            </div>
                        </div>
                        <div class="fc-view-container mt-lg-5 pt-3" style="">
                            <div class="fc-view fc-month-view fc-basic-view" style="">
                                <table class="">
                                    <thead class="fc-head">
                                    <tr>
                                        <td class="fc-head-container fc-widget-header">
                                            <div class="fc-row fc-widget-header">
                                                <table class="" >
                                                    <thead>
                                                    <tr>

                                                        <th class="fc-day-header fc-widget-header fc-mon">
                                                            <span>Mon</span>
                                                        </th>
                                                        <th class="fc-day-header fc-widget-header fc-tue">
                                                            <span>Tue</span>
                                                        </th>
                                                        <th class="fc-day-header fc-widget-header fc-wed">
                                                            <span>Wed</span>
                                                        </th>
                                                        <th class="fc-day-header fc-widget-header fc-thu">
                                                            <span>Thu</span>
                                                        </th>
                                                        <th class="fc-day-header fc-widget-header fc-fri">
                                                            <span>Fri</span>
                                                        </th>
                                                        <th class="fc-day-header fc-widget-header fc-sat">
                                                            <span>Sat</span>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    </thead>
                                    <tbody class="fc-body" style="text-align: left !important;">
                                    <tr>
                                        <td class="fc-widget-content">
                                            <div class="fc-scroller fc-day-grid-container" style="overflow: hidden;">
                                                <div class="fc-day-grid fc-unselectable">
                                                    <div class="here">
                                                    @for($i=0;$i<6;$i++)
                                                            <div class="fc-row" style="">
                                                                <div class="fc-bg">
                                                                    <table class="">
                                                                        <tbody>
                                                                        <tr >
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                    @endfor
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

            <div class="col-md-4">
                <div class="card card-calendar">
                    <div class="card-header ">
                        <h4 class="card-title">
                            Available
                            <small class="description">-Classrooms</small>
                            <br>
                            <div class="" style="float: left;width: 30%">
                                <select name="jour" id="jour" class="form-control" style="font-family:Roboto, Helvetica, Arial, sans-serif;font-style:oblique">
                                    <option value="0" selected="selected" disabled="disabled">Pick A Day</option>
                                    <option value="Lundi">Monday</option>
                                    <option value="Mardi">Tuesday</option>
                                    <option value="Mercredi">Wednesday</option>
                                    <option value="Jeudi">Thursday</option>
                                    <option value="Vendredi">Friday</option>
                                    <option value="Samedi">Saturday</option>

                                </select>
                            </div>
                            <div class="" style="float: left;width: 30%; margin-left: 2%">
                                <select name="jour" id="lession" class="form-control" style="font-family:Roboto, Helvetica, Arial, sans-serif;font-style:oblique">
                                    <option value="0" selected="selected" disabled="disabled">Pick A Lesson period</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>

                                </select>
                            </div>

                        </h4>

                    </div>
                    <div class="card-body" style="height: 385px">
                        <div id="fullCalendar" class="fc fc-unthemed fc-ltr">

                            <div class="fc-view-container mt-4" style="">
                                <div class="fc-view fc-month-view fc-basic-view" style="">
                                    <table class="">
                                        <thead class="fc-head">
                                        <tr>
                                            <td class="fc-head-container fc-widget-header">
                                                <div class="fc-row fc-widget-header">
                                                    <table class="">
                                                        <thead>
                                                        <tr>

                                                            <th class="fc-day-header fc-widget-header" style="text-align: center!important;">
                                                                <span>Classroom</span>
                                                            </th>


                                                        </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                        </thead>
                                        <tbody class="fc-body ">
                                        <tr>
                                            <td class="fc-widget-content">
                                                <div class="fc-scroller fc-day-grid-container" >
                                                    <div class="fc-day-grid fc-unselectable" style="height: 330px">
                                                        <div class="sallerhere scroll" style="max-height: 100%">
                                                        @for($i=0;$i<6;$i++)
                                                            <div class="fc-row" style="">
                                                                <div class="fc-bg">
                                                                    <table>
                                                                        <tbody >
                                                                        <tr >
                                                                            <td></td>


                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                        @endfor
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>





                    </div>
                </div>

            </div>

            <div class="col-md-8 ">
                <div class="card card-calendar">
                    <div class="card-body">
                        <div id="fullCalendar" class="fc fc-unthemed fc-ltr">
                            <div class="fc-toolbar fc-header-toolbar">
                                <div class="fc-left"><h2>Professor</h2>

                                </div>
                                <div class="pl-4 pb-4" style="float: left;">
                                    <select name="prof" id="prof" class="form-control" style="font-family:Roboto, Helvetica, Arial, sans-serif;font-style:oblique">
                                        <option value="" selected="selected" disabled="disabled">pick someone</option>
                                        <?php echo $result ?>
                                    </select>
                                </div>
                                <div class="fc-right">
                                    <button type="button" style="float: right;display: none;" class="pdfEnse btn btn-outline-primary">PDF</button>
                                </div>
                            </div>
                            <div class="fc-view-container mt-lg-5" style="">
                                <div class="fc-view fc-month-view fc-basic-view" style="">
                                    <table class="">
                                        <thead class="fc-head">
                                            <tr>
                                                <td class="fc-head-container fc-widget-header">
                                                    <div class="fc-row fc-widget-header">
                                                        <table class="">
                                                            <thead>
                                                            <tr>

                                                                <th class="fc-day-header fc-widget-header fc-mon">
                                                                    <span>Mon</span>
                                                                </th>
                                                                <th class="fc-day-header fc-widget-header fc-tue">
                                                                    <span>Tue</span>
                                                                </th>
                                                                <th class="fc-day-header fc-widget-header fc-wed">
                                                                    <span>Wed</span>
                                                                </th>
                                                                <th class="fc-day-header fc-widget-header fc-thu">
                                                                    <span>Thu</span>
                                                                </th>
                                                                <th class="fc-day-header fc-widget-header fc-fri">
                                                                    <span>Fri</span>
                                                                </th>
                                                                <th class="fc-day-header fc-widget-header fc-sat">
                                                                    <span>Sat</span>
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody class="fc-body">
                                        <tr>
                                            <td class="fc-widget-content">
                                                <div class="fc-scroller fc-day-grid-container" style="overflow: hidden;">
                                                    <div class="fc-day-grid fc-unselectable">
                                                        <div class="emp_prof">
                                                    <?php $j=1; ?>
                                                    @for($i=0;$i<6;$i++)
                                                            <div class="fc-row" style="">
                                                                <div class="fc-bg">
                                                                    <table class="mytable">
                                                                        <tbody>
                                                                        <tr class="tr" id="{{$i}}">
                                                                            <td class="sortable" id="mon" num="{{$j++}}"></td>
                                                                            <td class="sortable" id="tue" num="{{$j++}}"></td>
                                                                            <td class="sortable" id="wed" num="{{$j++}}"></td>
                                                                            <td class="sortable" id="thu" num="{{$j++}}"></td>
                                                                            <td class="sortable" id="fri" num="{{$j++}}"></td>
                                                                            <td class="sortable" id="sat" num="{{$j++}}"></td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                    @endfor
                                                        </div>
                                                </div>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            UnAffected Subjects
                        <small class="description">-Professor</small>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div id="mats" class="sortable mats" style="height: 150px"></div>


                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-link btn-round validate"  style="font-size: small;">
                    <i class="material-icons" >done_all</i>
                    Confirm
                </button>
            </div>

            <div class="col-md-8 " style="margin-bottom:-40px">
                <div class="card card-calendar">
                    <div class="card-body">
                        <div id="fullCalendar" class="fc fc-unthemed fc-ltr">
                            <div class="fc-toolbar fc-header-toolbar">
                                <div class="fc-left"><h2>Classroom</h2></div>
                                <div class="pl-4 " style="float: left;">
                                    <select name="Salle" id="salle" class="form-control" style="font-family:Roboto, Helvetica, Arial, sans-serif;font-style:oblique">
                                        <option value="0" selected="selected" disabled="disabled">pick Classroom</option>
                                        <?php echo $Room ?>
                                    </select>
                                </div>
                                <div class="fc-right">
                                    <button type="button" style="float: right;display:none;" class="pdfRoom btn btn-outline-primary">PDF</button>
                                </div>
                            </div>
                            <div class="sallePdf">
                            <div class="fc-view-container mt-lg-5 pt-3" style="">
                                <div class="fc-view fc-month-view fc-basic-view" style="">
                                    <table class="">
                                        <thead class="fc-head">
                                        <tr>
                                            <td class="fc-head-container fc-widget-header">
                                                <div class="fc-row fc-widget-header">
                                                    <table class="">
                                                        <thead>
                                                        <tr>

                                                            <th class="fc-day-header fc-widget-header fc-mon">
                                                                <span>Mon</span>
                                                            </th>
                                                            <th class="fc-day-header fc-widget-header fc-tue">
                                                                <span>Tue</span>
                                                            </th>
                                                            <th class="fc-day-header fc-widget-header fc-wed">
                                                                <span>Wed</span>
                                                            </th>
                                                            <th class="fc-day-header fc-widget-header fc-thu">
                                                                <span>Thu</span>
                                                            </th>
                                                            <th class="fc-day-header fc-widget-header fc-fri">
                                                                <span>Fri</span>
                                                            </th>
                                                            <th class="fc-day-header fc-widget-header fc-sat">
                                                                <span>Sat</span>
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                        </thead>
                                        <tbody class="fc-body">
                                        <tr>
                                            <td class="fc-widget-content">
                                                <div class="fc-scroller fc-day-grid-container" style="overflow: hidden;">
                                                    <div class="fc-day-grid fc-unselectable">
                                                        <div class="heresalle">
                                                            @for($i=0;$i<6;$i++)
                                                                <div class="fc-row" style="">
                                                                    <div class="fc-bg">
                                                                        <table class="">
                                                                            <tbody>
                                                                            <tr >
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td></td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </form>
    </div>
    <div class="modal fade" id="noticeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-notice">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Affect Classroom</h5>

                </div>
                <div class="modal-body">
                    <div class="instruction">
                        <div class="">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect03">Classroom</label>
                                </div>
                                <select class="list_salle custom-select" id="list_salle inputGroupSelect03">
                                    <option disabled="" id="" selected>Choose A Classroom</option>
                                    <optgroup label="Salle"></optgroup>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-info btn-round affect" data-dismiss="modal">Sounds good!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


        @endsection

@section('custemScript')

    <script>
        @if (session('alert'))
        swal({
            position: 'top-end',
            type: 'success',
            title: 'Yay!!',
            text: 'Affected Successfuly',
            showConfirmButton: false,
            timer: 1000
        });
        $('.swal2-input').addClass('form-control');
        $('.swal2-textarea').addClass('form-control');

        $(":input[type|='range']").addClass('form-control');
        @endif
        $("#lession").hide();
        $(".validate").hide();
        $(".affect").hide();
        var selector=$(".validate");
        const ps = new PerfectScrollbar('.scroll');

        var $table = $('table.scroll'),
            $bodyCells = $table.find('tbody tr:first').children(),
            colWidth;

        // Adjust the width of thead cells when window resizes
        $(window).resize(function() {
            // Get the tbody columns width array
            colWidth = $bodyCells.map(function() {
                return $(this).width();
            }).get();

            // Set the width of thead columns
            $table.find('thead tr').children().each(function(i, v) {
                $(v).width(colWidth[i]);
            });
        }).resize(); // Trigger resize handler

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".sortable").sortable({connectWith: ".sortable",receive:function (e,t) {

            }});

        $(".sortable").sortable({
            connectWith: ".sortable",
            hoverClass: "ui-state-active",
            placeholder: "ui-state-highlight",
            cursor:"pointer",


            receive: function (e, t) {
                $(".affect").hide();

                if ($(this).attr("id")=='mats')
                {$(this).find(".matiere").prop("name","");
                }
                else {
                var num=$(this).closest("tr").attr("id");
                var tabname=$(this).attr("id");
                var salle='';
                var elem=$(this);
                var val=elem.find('.matiere').prop("value");
                    $(this).find(".matiere").prop("name",tabname+'['+num+']');
                $(this).addClass('table-active');
                $(this).removeClass('sortable');
                ///sallet fargin//
                    $.ajax({
                        url:"/fetch_salle_vide2",
                        method:"POST",
                        data:{jour:tabname,seance:num},
                        dataType:"text",
                        success:function(data)
                        {$(".list_salle").html("");
                            $(".list_salle").html(data);


                        }
                    });
                    $('.list_salle').change(function () {
                       $(".affect").show();
                        salle=$(".list_salle option:selected").val();



                    });
                    $('.affect').click(function () {

                        $("#insert").show();
                        var list=val.split('_');
                        var newval=list[0]+'_'+list[1]+'_'+salle;

                        elem.find(".matiere").prop("value",newval);
                    });

                $('#noticeModal').modal({backdrop: 'static',
                        keyboard: false});
                }
            },
            stop: function (e, t) {

                if ($(this).children().length == 0) {
                    $(this).addClass('test');
                    $(this).removeClass('table-active');
                    $(this).addClass('sortable');
                }
                if($(t.item).closest('tr').children().length >0){
                    $(t.item).closest('tr').removeClass('test');
                }
            },
            helper: function (e, tr) {
                var $originals = tr.children();
                var $helper = tr.clone();
                $helper.children().each(function (index) {
                    // Set helper cell sizes to match the original sizes
                    $(this).width($originals.eq(index).width());
                });
                $helper.css("background-color", "rgb(223, 240, 249)");
                return $helper;
            }
        });

        $("#sortable").disableSelection();

        $("#class").change(function () {
            var idClasse=this.value;


            $.ajax({
                url:"/fetch_classeEmp",
                method:"POST",
                data:{idClasse:idClasse},
                dataType:"text",
                success:function(data)
                {   $(".here").html("");
                    $(".here").html(data);
                    $(".pdfClass").show();

                }
            });
            //classpdf
            $(".pdfClass").click(function () {
                $.ajax({
                    url:"/Class_pdf",
                    method:"POST",
                    async:true,
                    data:{classeid:idClasse,_token: '{!! csrf_token() !!}'},
                    dataType:"text"
                });
            });

        });
        $("#prof").change(function () {
           var idprof=this.value;
            $("#mytable").find('')
            $.ajax({
                url:"/fetch_affectedtotab",
                method:"POST",
                data:{MatProf:idprof},
                dataType:"text",
                success:function(data)
                {   $(".mat").remove();
                    $(".mats").html(data);
                    $(".pdfEnse").show();
                }
            });
            //ens pdf
            $(".pdfEnse").click(function () {
                $.ajax({
                    url:"/Ense_pdf",
                    method:"POST",
                    async:true,
                    data:{profid:idprof,_token: '{!! csrf_token() !!}'},
                    dataType:"text"
                });
            });
            $.ajax({
                url:"/fetch_prof_emp",
                method:"POST",
                data:{MatProf:idprof},
                dataType:"text",
                success:function(data)
                {$(".emp_prof").html('');
                    $(".emp_prof").html(data);
                    $(".sortable").sortable({
                        connectWith: ".sortable",
                        hoverClass: "ui-state-active",
                        placeholder: "ui-state-highlight",
                        cursor:"pointer",


                        receive: function (e, t) {
                            $(".affect").hide();
                            if ($(this).attr("id")=='mats')
                            {$(this).find(".matiere").prop("name","");
                            }
                            else {
                                var num=$(this).closest("tr").attr("id");
                                var tabname=$(this).attr("id");
                                var salle='';
                                var elem=$(this);
                                var val=elem.find('.matiere').prop("value");
                                $(this).find(".matiere").prop("name",tabname+'['+num+']');
                                $(this).addClass('table-active');
                                $(this).removeClass('sortable');
                                ///sallet fargin//
                                $.ajax({
                                    url:"/fetch_salle_vide2",
                                    method:"POST",
                                    data:{jour:tabname,seance:num},
                                    dataType:"text",
                                    success:function(data)
                                    {$(".list_salle").html("");
                                        $(".list_salle").html(data);

                                    }
                                });
                                $('.list_salle').change(function () {
                                    $(".affect").show();
                                    salle=$(".list_salle option:selected").val();



                                });
                                $('.affect').click(function () {


                                    var list=val.split('_');
                                    var newval=list[0]+'_'+list[1]+'_'+salle;

                                    elem.find(".matiere").prop("value",newval);
                                });

                                $('#noticeModal').modal({backdrop: 'static',
                                    keyboard: false});
                            }
                        },
                        stop: function (e, t) {
                            if ($(this).children().length == 0) {
                                $(this).addClass('test');
                                $(this).removeClass('table-active');
                                $(this).addClass('sortable');
                            }
                            if($(t.item).closest('tr').children().length >0){
                                $(t.item).closest('tr').removeClass('test');
                            }
                        },
                        helper: function (e, tr) {
                            var $originals = tr.children();
                            var $helper = tr.clone();
                            $helper.children().each(function (index) {
                                // Set helper cell sizes to match the original sizes
                                $(this).width($originals.eq(index).width());
                            });
                            $helper.css("background-color", "rgb(223, 240, 249)");
                            return $helper;
                        }
                    });

                }
            });



        });

        $("body").on('click','.cla',function () {
           var value=$(this).find('.classe').val();
           var data=value.split('_');
           var classe=data['1'];
            selector.show();
           /////farag_table
            $tab=[];
            //// re_insilize_the sortable
            $('.mytable td').each(function () {
               $(this).removeClass('table-warning');
               $(this).addClass('sortable');

            });
            /// AJAX
            $.ajax({
                url:"/fetch_classeEmp",
                method:"POST",
                data:{idClasse:classe},
                dataType:"text",
                success:function(data)
                {   $(".here").html("");
                     $(".here").html(data);
                     $("#class").val('0');
                     $("#table tr").each(function () {
                         $(this).find('td:not(:empty)').each(function (ele) {
                            var id=$(this).attr("id")
                             $tab.push(id);


                         });
                         $tab.forEach(function (element) {
                             var elemen=element;

                         $('.mytable .sortable').each(function (ele) {
                             var num=$(this).attr('num');

                             if(num==elemen&&$(this).is(':empty'))
                             {$(this).removeClass('sortable');
                              $(this).addClass('table-warning');

                             }

                         });
                         });
                     });





                }
            });

        });

        $("#salle").change(function () {
           var idRoom=$(this).val();

            $.ajax({
              url:"/fetch_emp_salle",
              method:"POST",
              data:{idRoom:idRoom},
              dataType:"text",
              success:function(data)
              {$(".heresalle").html("");
               $(".heresalle").html(data);
               $(".pdfRoom").show();
              }
            });
            //Roompdf
            $(".pdfRoom").click(function () {
                $.ajax({
                    url:"/ClassRoom_pdf",
                    method:"POST",
                    async:true,
                    data:{Roomid:idRoom,_token: '{!! csrf_token() !!}'},
                    dataType:"text"
                });
            });
        });
        $("#jour").change(function () {
           $("#lession").show();

           if($("#lession").val()!=null)
           {var jour=$(this).val();
               var lession=$("#lession").val();
               $.ajax({
               url:"/fetch_salle_vide",
               method:"POST",
               data:{jour:jour,Lession:lession},
               dataType:"text",
               success:function(data)
               {$(".sallerhere").html("");
                   $(".sallerhere").html(data);

               }
           });}
           });
        $("#lession").change(function () {
           var jour=$("#jour").val();
            var lession=$(this).val();
            $.ajax({
                url:"/fetch_salle_vide",
                method:"POST",
                data:{jour:jour,Lession:lession},
                dataType:"text",
                success:function(data)
                {$(".sallerhere").html("");
                    $(".sallerhere").html(data);

                }
            });
        });
$('.EM').addClass('active');



    </script>
@endsection