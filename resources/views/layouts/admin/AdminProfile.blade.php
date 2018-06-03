@extends('layouts.admin.adminDashbord')
@section('custemImp')
    @endsection
@section('content')


@endsection

@section('custemScript')
<script>

        $(".container-fluid").load('/create_Enseignant/{!! $user->AuthUserMat() !!} #this');


            $(document).ready(function(){

                //init wizard

                demo.initMaterialWizard();

                // Javascript method's body can be found in assets/js/demos.js
                demo.initDashboardPageCharts();

                demo.initCharts();

            });


        </script>

    @endsection