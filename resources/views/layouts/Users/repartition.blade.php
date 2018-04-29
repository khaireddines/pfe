@extends('layouts.app')

@section('custemImp')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/material-dashboard.min790f.css')}}">
    <style>

        .search .form-control:focus{
            border-color: rgba(96, 59, 192, 0.78);
            box-shadow: none;
        }
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: none;
            text-align: left;
            padding: 8px;
        }


        .a
        {
            border:0px;
        }


    </style>
@endsection

@section('content')

        <div class="col-6 mx-auto mb-6">

                <div class="search input-group mb-5" style="float: left;width: 75%;margin-top: 0.75%; ">
                    <div class="input-group-prepend">
                    <div class="input-group-text"><i id="progress" class=" material-icons md-dark">done_all</i></div>
                    </div>
                <input type="text" class="searchbox form-control form-control-lg " id="inlineFormInputGroup" placeholder="Your Wish Is My Command">
                </div>
            <div style="float: right ; width: 20%">
                <select class="filter form-control" id="inputGroupSelect01"  >
                    <option disabled="" id="" selected value="0">filters</option>
                    <option value="Matieres">Matieres</option>
                    <option value="Class">Class</option>
                    <option value="Departement">Departement</option>
                    <option value="Profs">Proffseur</option>
                </select>

            </div>
        </div>
        <div class="hide col-11 mx-auto mt-5">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body" style=" min-height: 600px;">
                    <div class="contents">

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('custemScript')
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".hide").hide();
        $(".searchbox").keypress(function () {

                $("#progress").text('cached');


        });
        $(".searchbox").keyup(function () {

            window.setTimeout(function () {
                $("#progress").text('done_all');
            }, 1000);
            var text=this.value;
            var filter=$(".filter option:selected").val();

            if(filter!='0')
            {
                $.ajax({
                    url:"/fetch_prof_hours",
                    method:"POST",
                    data:{toLookFor:text,filter:filter},
                    dataType:"text",
                    success:function(data)
                    {   $(".contents").html(" ");
                        $(".hide").show()
                        $(".contents").html(data);


                    }
                });
            }else
            { swal({
                position: 'top-end',
                type: 'error',
                title: 'Oops...',
                text: 'you need to select a filter first!',
                showConfirmButton: false,
                timer: 1000
            })

            }
        });
            $(".filter").change(function () {
               $(".contents").html("");
            });



    </script>
@endsection