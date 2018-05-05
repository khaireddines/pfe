@extends('layouts.admin.adminDashbord')
@section('custemImp')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">

@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">





                <div class="card ">

                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">account_box</i>

                        </div>
                        <button onclick="location.href='/create_Enseignant';" type="button" class="float-md-right btn btn-warning  btn-round" data-original-title="" title="" style="font-size: small;">
                        <i class="material-icons">note_add</i>
                        Add
                        </button>
                        <h4 class="card-title">Global Sales by Top Locations</h4>
                        <
                    </div>

                    <div class="card-body ">




<table class="table">
    <thead>
    <tr class="text-center">
        <th>Matricule</th>
        <th>Nom&Prenom</th>
        <th>CIN</th>
        <th>CNRPS</th>
        <th>Departement</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody class="text-center">
    <tr>

        @foreach ($ens_list as $ens)
            {{ csrf_field() }}
            <?php $dep=$ens->deplib($ens->idDept); ?>
            <td>{{$ens->matProf}}</td>
            <td>@if($ens->sexe=='Male')
                M.@else
                Mme.@endif{{$ens->nom}} {{$ens->prenom}}</td>
            <td>{{$ens->cin}}</td>
            <td>{{$ens->cnrps}}</td>
            <td>{{$dep['0']->libDept}}</td>
            {{--<td>--}}
                {{--<a href="/create_Enseignant/{{$ens->matProf}}">  Modifier </a>--}}
            {{--</td>--}}
            {{--<td>--}}
                {{--<a href="/supp_Enseignant/{{$ens->matProf}}"> Supp</a>--}}
            {{--</td>--}}
            <td class="td-actions text-right">

                <button onclick="location.href='/create_Enseignant/{{$ens->matProf}}';" type="button" rel="tooltip" class="btn btn-success btn-link" data-original-title="" title="">
                    <i class="material-icons">edit</i>
                </button>
                <button onclick="location.href='/supp_Enseignant/{{$ens->matProf}}';" type="button" rel="tooltip" class="btn btn-danger btn-link" data-original-title="" title="">
                    <i class="material-icons">close</i>
                </button>
            </td>
    </tr>
    @endforeach

</table>
                    </div></div></div></div></div>
@endsection
@section('custemScript')
@endsection