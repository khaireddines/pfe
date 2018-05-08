@extends('layouts.admin.adminDashbord')
@section('custemImp')
@endsection
@section('content')

            <div class="col-md-12 mr-auto ml-auto">
                <!--      Wizard container        -->
                <div class="wizard-container">
                    <div class="card card-wizard" data-color="rose" id="wizardProfile">
                        @if (!empty($ens['0']->matProf))
                    <form class="" action="/modify_Enseignant/{{$ens['0']->matProf}}" method="post">
                    @else
                    <form class="" action="/create_Enseignant" method="post">
                    @endif
                    @csrf
                            <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                            <div class="card-header text-center">
                                <h3 class="card-title">
                                    Build Profile
                                </h3>
                                <h5 class="card-description">This information will let us know more about you.</h5>
                            </div>
                            <div class="wizard-navigation">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#about" data-toggle="tab" role="tab">
                                            About
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#account" data-toggle="tab" role="tab">
                                            Professional Information
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#address" data-toggle="tab" role="tab">
                                            Address
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="about">
                                        <h5 class="info-text"> Let's start with the basic information</h5>
                                        <div class="row justify-content-center">
                                            <div class="col-sm-2">
                                                <div class="picture-container">
                                                    <div class="picture">
                                                        <img src="{{asset('img/profile_img/placeholder.jpg')}}" class="picture-src" id="wizardPicturePreview" title="" />
                                                        <input type="file" id="wizard-picture">
                                                    </div>
                                                    <h6 class="description">Choose Picture</h6>
                                                </div>
                                            </div>
                                            <div class="col-sm-10">
                                                <div class="input-group form-control-lg">
                                                    <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">perm_identity</i>
                          </span>
                                                    </div>
                                                    <div style="width: 25%" class="form-group">
                                                        <label for="mat" class="bmd-label-floating">matricule (required)</label>
                                                        @if (!empty($ens['0']->matProf))

                                                            <input type="text" name="matProf" class="form-control" style="cursor: not-allowed" value="{{@$ens['0']->matProf}}" disabled>
                                                            <input type="text" name="matProf" class="form-control" value="{{@$ens['0']->matProf}}" hidden>

                                                        @else
                                                            <input type="text" name="matProf" class="form-control" id="mat" value="{{@$ens['0']->matProf}}" required>
                                                        @endif

                                                    </div>
                                                    <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">face</i>
                          </span>
                                                    </div>
                                                    <div style="width: 25%" class="form-group">
                                                        <label for="pre" class="bmd-label-floating">First Name (required)</label>
                                                        <input type="text" class="form-control" id="pre" name="prenom" value="{{@$ens['0']->prenom}}" required>
                                                    </div>
                                                    <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">record_voice_over</i>
                          </span>
                                                    </div>
                                                    <div style="width: 25%" class="form-group">
                                                        <label for="nom" class="bmd-label-floating">Second Name</label>

                                                        <input type="text" class="form-control" id="nom" name="nom" style="text-transform:uppercase" value="{{@$ens['0']->nom}}" required>
                                                    </div>
                                                </div>
                                                <div class="input-group form-control-lg">
                                                    <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">aspect_ratio</i>
                          </span>
                                                    </div>
                                                    <div style="width: 15%" class="form-group">
                                                        <label for="cin" class="bmd-label-floating">CIN (required)</label>

                                                        <input type="number" class="form-control" maxlength="8" min="0" minlength="8" id="cin" name="cin" value="{{@$ens['0']->cin}}" required>
                                                    </div>
                                                    <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">security</i>
                          </span>
                                                    </div>
                                                    <div style="width: 15%" class="form-group">
                                                        <label for="cnrps" class="bmd-label-floating">CNRPS</label>

                                                        <input type="number" name="cnrps" min="0" maxlength="10" minlength="10" class="form-control" id="cnrps" value="{{@$ens['0']->cnrps}}" required>
                                                    </div>
                                                    <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">date_range</i>
                          </span>
                                                    </div>
                                                    <div style="width: 15%" class="form-group">
                                                        <label for="datenai" class="bmd-label-floating">Birth Date </label>
                                                        <input type="date" class="form-control" id="datenai" name="date_nai" value="{{@$ens['0']->date_nai}}" required>
                                                    </div>
                                                    <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">place</i>
                          </span>
                                                    </div>
                                                    <div style="width: 24%" class="form-group">
                                                        <label for="LN" class="bmd-label-floating">Birth Place </label>

                                                        <input type="text" class="form-control" id="LN" name="lieu_nai" value="{{@$ens['0']->lieu_nai}}">
                                                    </div>
                                                </div>
                                                <div class="input-group form-control-lg">
                                                    <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">flag</i>
                          </span>
                                                    </div>
                                                    <div style="width: 24%" class="form-group">
                                                        <label for="nationalite" class="bmd-label-floating">Nationality</label>

                                                        <input type="text" class="form-control" id="nationalite"  name="nationalite" value="{{@$ens['0']->nationalite}}">
                                                    </div>
                                                    <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">supervisor_account</i>
                          </span>
                                                    </div>
                                                    <div style="width: 24%;" class="form-group">


                                                        <select class="form-control" name="situation" required>
                                                            <option value="0" disabled selected>Situation</option>
                                                            <option value="Celibartaire">Celibartaire</option>
                                                            <option value="Marié">Marié</option>
                                                            <option value="Divorcé">Divorcé</option>
                                                            <option value="Veuf">Veuf(e)</option>
                                                        </select>

                                                    </div>
                                                    <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">wc</i>
                          </span>
                                                    </div>
                                                    <div style="width: 24%" class="form-group">

                                                        <input class="form-group mx-2" style="width: 10%" type="radio" name="sexe" value="Male" checked>Male
                                                        <input class="form-group ml-3" style="width: 10%" type="radio" name="sexe" value="Female">Female
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 mt-3">
                                                <div class="input-group form-control-lg">
                                                    <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">email</i>
                          </span>
                                                    </div>
                                                    <div class="form-group" style="width: 60%">
                                                        <label for="email" class="bmd-label-floating">Email (required)</label>

                                                        <input type="email" class="form-control" id="email" name="email" value="{{@$ens['0']->email}}" required>
                                                    </div>
                                                    <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">contact_phone</i>
                          </span>
                                                    </div>
                                                    <div class="form-group" style="width: 25%">
                                                        <label for="NT" class="bmd-label-floating">Phone Number</label>
                                                        <input type="number" class="form-control" id="NT" name="n_tele" value="{{@$ens['0']->n_tele}}">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="account">
                                        <h5 class="info-text"> Let's Jump to Professional Life </h5>
                                        <div class="row justify-content-center">
                                            <div class="col-sm-10 ">
                                                <div class="row">

                                                    <div class="input-group-prepend ">
                          <span class="input-group-text">
                            <i class="material-icons">card_membership</i>
                          </span>
                                                </div>
                                                    <div style="width: 25%" class="form-group ">
                                                    <label for="diplome" class="bmd-label-floating">Diplome</label>

                                                    <input type="text" name="diplome" class="form-control" id="diplome" value="{{@$ens['0']->diplome}}"required>
                                                </div>

                                                    <div class="input-group-prepend ">
                          <span class="input-group-text">
                            <i class="material-icons">grade</i>
                          </span>
                                                    </div>
                                                    <div style="width: 25%" class="form-group ">
                                                        <label for="grade" class="bmd-label-floating">Grade</label>
                                                        <input type="text" class="form-control" id="grade" name="grade" value="{{@$ens['0']->grade}}">
                                                    </div>

                                                    <div class="input-group-prepend ">
                          <span class="input-group-text">
                            <i class="material-icons">local_activity</i>
                          </span>
                                                    </div>
                                                    <div style="width: 25%" class="form-group ">
                                                        <label for="spec" class="bmd-label-floating">Speciality</label>
                                                        <input type="text" class="form-control" id="spec" name="specialite" value="{{@$ens['0']->specialite}}">
                                                    </div>


                                                    <div class="input-group-prepend mt-4">
                          <span class="input-group-text">
                            <i class="material-icons">business</i>
                          </span>
                                                    </div>
                                                    <div style="width: 15%" class="form-group mt-4">

                                                        <select class="form-control" name="idDept" id="">
                                                            <option value="" disabled selected style="cursor: not-allowed">Department</option>
                                                            @foreach($dep as $dep_data)
                                                                <option value="{{$dep_data->idDept}}"
                                                                        @if(!empty(@$ens['0']->idProf) && $dep_data->idDept==@$ens['0']->idDept)
                                                                        selected="selected"
                                                                        @endif
                                                                >{{$dep_data->libDept}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="input-group-prepend mt-4">
                          <span class="input-group-text">
                            <i class="material-icons">featured_play_list </i>
                          </span>
                                                    </div>
                                                    <div style="width: 15%" class="form-group mt-4">
                                                        <label for="npost" class="bmd-label-floating">N°Post</label>
                                                        <input type="number" class="form-control" id="npost" name="n_post" value="{{@$ens['0']->n_post}}">
                                                    </div>

                                                    <div class="input-group-prepend mt-4">
                          <span class="input-group-text">
                            <i class="material-icons">home</i>
                          </span>
                                                    </div>
                                                    <div style="width: 15%" class="form-group mt-4">
                                                        <label for="office" class="bmd-label-floating">N°Office</label>
                                                        <input type="number" min="0" class="form-control" id="office" name="n_bureau" value="{{@$ens['0']->n_bureau}}">
                                                    </div>



                                                    <div class="input-group-prepend mt-4">
                          <span class="input-group-text">
                            <i class="material-icons">account_balance_wallet</i>
                          </span>
                                                    </div>
                                                    <div style="width: 25%" class="form-group mt-4">
                                                        <label for="npost" class="bmd-label-floating">Bank Card Number</label>
                                                        <input type="number" minlength="16" maxlength="16" min="0" class="form-control" name="n_compte_banque" value="{{@$ens['0']->n_compte_banque}}">
                                                    </div>

                                                    <div class="input-group-prepend mt-4">
                          <span class="input-group-text">
                            <i class="material-icons">business_center</i>
                          </span>
                                                    </div>
                                                    <div style="width: 25%" class="form-group mt-4">
                                                        <label for="dateA" class="bmd-label-floating">Administration Entry Date</label>
                                                        <input type="date" id="datenA" class="form-control" name="date_adm" value="{{@$ens['0']->date_adm}}">
                                                    </div>

                                                    <div class="input-group-prepend mt-4">
                          <span class="input-group-text">
                            <i class="material-icons">card_travel</i>
                          </span>
                                                    </div>
                                                    <div style="width: 25%" class="form-group mt-4">
                                                        <label for="dateE" class="bmd-label-floating">Establishment Entry Date</label>
                                                        <input type="date" id="dateE" class="form-control" name="date_etbs" value="{{@$ens['0']->date_etbs}}">

                                                    </div>

                                                    <div class="input-group-prepend mt-4">
                          <span class="input-group-text">
                            <i class="material-icons">date_range</i>
                          </span>
                                                    </div>
                                                    <div style="width: 25%" class="form-group mt-4">
                                                        <label for="nomi" class="bmd-label-floating">Nomination Date</label>
                                                        <input type="date" id="nomi" class="form-control" name="date_nai" value="{{@$ens['0']->date_nai}}">

                                                    </div>

                                                    <div class="input-group-prepend mt-4">
                          <span class="input-group-text">
                            <i class="material-icons">date_range</i>
                          </span>
                                                    </div>
                                                    <div style="width: 25%" class="form-group mt-4">
                                                        <label for="PED" class="bmd-label-floating">Person Entitled Date</label>
                                                        <input type="date" id="PED" class="form-control" name="date_titulir" value="{{@$ens['0']->date_titulir}}">
                                                    </div>

                                                    <div class="input-group-prepend mt-4">
                          <span class="input-group-text">
                            <i class="material-icons">date_range</i>
                          </span>
                                                    </div>
                                                    <div style="width: 25%" class="form-group mt-4">
                                                        <label for="CSD" class="bmd-label-floating">Contract Start Date</label>
                                                        <input type="date" id="CSD" class="form-control" name="debut_con" value="{{@$ens['0']->debut_con}}">

                                                    </div>

                                                    <div class="input-group-prepend mt-4">
                          <span class="input-group-text">
                            <i class="material-icons">date_range</i>
                          </span>
                                                    </div>
                                                    <div style="width: 25%" class="form-group mt-4">
                                                        <label for="CED" class="bmd-label-floating">Contract End Date</label>
                                                        <input type="date" id="CED" class="form-control" name="fin_con" value="{{@$ens['0']->fin_con}}">
                                                    </div>


                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="address">
                                        <div class="row justify-content-center">
                                            <div class="col-sm-12">
                                                <h5 class="info-text"> Are you living in a nice area? </h5>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="form-group">

                                                    <label for="streetname" class="bmd-label-floating">Street Name</label>
                                                    <input type="text" id="streetname" class="form-control" name="adresse" value="{{@$ens['0']->adresse}}" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="codepost" class="bmd-label-floating">Postal code.</label>
                                                    <input type="number" id="codepost" class="form-control" min="0" maxlength="4" minlength="4" name="code_postal" value="{{@$ens['0']->code_postal}}" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <label for="city" class="bmd-label-floating">City</label>
                                                    <input type="text" id="city" class="form-control" name="ville" value="{{@$ens['0']->ville}}" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">

                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="agence" class="bmd-label-floating">Agency</label>
                                                    <input type="text" class="form-control" id="agence" name="agence" value="{{@$ens['0']->agence}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">

                                                    <label for="VSN" class="bmd-label-floating">Vacancy Street Name</label>
                                                    <input type="text" id="VSN" class="form-control" name="ad_vacence" value="{{@$ens['0']->ad_vacence}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">

                                                    <label for="NTPV" class="bmd-label-floating">Vacancy Phone N°.</label>
                                                    <input type="number" class="form-control" id="NTPV" min="0" minlength="8" maxlength="8" name="n_tel_vacence" value="{{@$ens['0']->n_tel_vacence}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="mr-auto">
                                    <input type="button" class="btn btn-previous btn-fill btn-default btn-wd disabled" name="previous" value="Previous">
                                </div>
                                <div class="ml-auto">
                                    <input type="button" class="btn btn-next btn-fill btn-rose btn-wd" name="next" value="Next">
                                    <input type="submit" class="btn btn-finish btn-fill btn-rose btn-wd"  value="Finish" style="display: none;">

                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- wizard container -->
            </div>



    {{--@if (!empty($ens['0']->matProf))--}}
    {{--<form class="" action="/modify_Enseignant/{{$ens['0']->matProf}}" method="post">--}}
        {{--@else--}}
            {{--<form class="" action="/create_Enseignant" method="post">--}}
                {{--@endif--}}
                {{--{{ csrf_field() }}--}}
    {{--<table border="1">--}}
    {{--<tr>--}}
        {{--<td>Matricule:*</td><td>--}}
        {{--@if (!empty($ens['0']->idProf))--}}

            {{--<input type="text" name="matProf" value="{{@$ens['0']->matProf}}" disabled>--}}
            {{--<input type="text" name="matProf" value="{{@$ens['0']->matProf}}">--}}

        {{--@else--}}
            {{--<input type="text" name="matProf" value="{{@$ens['0']->matProf}}">--}}
        {{--@endif--}}
        {{--</td></tr><tr>--}}
        {{--<td>Nom:*</td><td><input type="text" name="nom" value="{{@$ens['0']->nom}}" style="text-transform:uppercase"></td></tr><tr>--}}
        {{--<td>Prenom:*</td><td><input type="text" name="prenom" value="{{@$ens['0']->prenom}}"></td></tr><tr>--}}
        {{--<td>CIN/Passeport:*</td><td><input type="number" name="cin" value="{{@$ens['0']->cin}}"></td></tr><tr>--}}
        {{--<td>Identifiant CNRPS:*</td><td><input type="number" name="cnrps" value="{{@$ens['0']->cnrps}}"></td></tr><tr>--}}
        {{--<td>Email:</td><td><input type="email" name="email" value="{{@$ens['0']->email}}"></td></tr><tr>--}}
        {{--<td>Date de Naissance:*</td><td><input type="date" name="date_nai" value="{{@$ens['0']->date_nai}}"></td></tr><tr>--}}
        {{--<td>Nationalité:</td><td><input type="text" name="nationalite" value="{{@$ens['0']->nationalite}}"></td></tr><tr>--}}
        {{--<td>Sexe:*</td><td><input type="radio" name="sexe" value="Male" checked>Male--}}
                          {{--<input type="radio" name="sexe" value="Female">Female--}}
                      {{--</td></tr><tr>--}}
        {{--<td>Date entrer Administration:</td><td><input type="date" name="date_adm" value="{{@$ens['0']->date_adm}}"></td></tr><tr>--}}
        {{--<td>Date entrer Etablisement:</td><td><input type="date" name="date_etbs" value="{{@$ens['0']->date_etbs}}"></td></tr><tr>--}}
        {{--<td>Diplôme:*</td><td><input type="text" name="diplome" value="{{@$ens['0']->diplome}}"></td></tr><tr>--}}
        {{--<td>Adresse:</td><td><input type="text" name="adresse" value="{{@$ens['0']->adresse}}"></td></tr><tr>--}}
        {{--<td>Ville:</td><td><input type="text" name="ville" value="{{@$ens['0']->ville}}"></td></tr><tr>--}}
        {{--<td>Code Postal:</td><td><input type="number" name="code_postal" value="{{@$ens['0']->code_postal}}"></td></tr><tr>--}}
        {{--<td>N° Télephone:</td><td><input type="number" name="n_tele" value="{{@$ens['0']->n_tele}}"></td></tr><tr>--}}
        {{--<td>Grade:</td><td><input type="text" name="grade" value="{{@$ens['0']->grade}}"></td></tr><tr>--}}
        {{--<td>Date de nomination:</td><td><input type="date" name="date_nomi" value="{{@$ens['0']->date_nomi}}"></td></tr><tr>--}}
        {{--<td>Date de Titulir:</td><td><input type="date" name="date_titulir" value="{{@$ens['0']->date_titulir}}"></td></tr><tr>--}}
        {{--<td>N°Post:</td><td><input type="number" name="n_post" value="{{@$ens['0']->n_post}}"></td></tr><tr>--}}
        {{--<td>N°Bureau:</td><td><input type="text" name="n_bureau" value="{{@$ens['0']->n_bureau}}"></td></tr><tr>--}}
        {{--<td>Département:*</td><td><select name="idDept" id="">--}}
                {{--@foreach($dep as $dep_data)--}}
                    {{--<option value="{{$dep_data->idDept}}"--}}
                            {{--@if(!empty(@$ens['0']->idProf) && $dep_data->idDept==@$ens['0']->idDept)--}}
                            {{--selected="selected"--}}
                            {{--@endif--}}
                    {{-->{{$dep_data->libDept}}</option>--}}
                {{--@endforeach--}}
            {{--</select>--}}
         {{--</td></tr><tr>--}}
        {{--<td>Situation:*</td><td><select name="situation" id="">--}}
                {{--<option value="Celibartaire">Celibartaire</option>--}}
                {{--<option value="Marié">Marié</option>--}}
                {{--<option value="Divorcé">Divorcé</option>--}}
                {{--<option value="Veuf">Veuf(e)</option>--}}
            {{--</select></td></tr><tr>--}}
        {{--<td>Specialité:</td><td><input type="text" name="specialite" value="{{@$ens['0']->specialite}}"></td></tr><tr>--}}
        {{--<td>N° de Compte Banque:</td><td><input type="number" name="n_compte_banque" value="{{@$ens['0']->n_compte_banque}}"></td></tr><tr>--}}
        {{--<td>Agence:</td><td><input type="text" name="agence" value="{{@$ens['0']->agence}}"></td></tr><tr>--}}
        {{--<td>Adresse pendant le vacence:</td><td><input type="text" name="ad_vacence" value="{{@$ens['0']->ad_vacence}}"></td></tr><tr>--}}
        {{--<td>N° Télephone pendant le Vacence:</td><td><input type="number" name="n_tel_vacence" value="{{@$ens['0']->n_tel_vacence}}"></td></tr><tr>--}}
        {{--<td>Lieu de Naissance:</td><td><input type="text" name="lieu_nai" value="{{@$ens['0']->lieu_nai}}"></td></tr><tr>--}}
        {{--<td>Début du Contrat:*</td><td><input type="date" name="debut_con" value="{{@$ens['0']->debut_con}}"></td></tr><tr>--}}
        {{--<td>Fin du Contrat:*</td><td><input type="date" name="fin_con" value="{{@$ens['0']->fin_con}}"></td>--}}
{{--<tr><td></td> <td>--}}
            {{--@if (!empty($ens['0']->matProf))--}}
            {{--<input type="submit" name="" value="modify">--}}
        {{--@else--}}
            {{--<input type="submit" name="" value="add">--}}
        {{--@endif</td>--}}
    {{--</tr>--}}
{{--</table>--}}
            {{--</form>--}}
    @endsection

@section('custemScript')
    <script type="text/javascript">

        $(document).ready(function(){

            //init wizard

            demo.initMaterialWizard();

            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

            demo.initCharts();

        });

    </script>
    @endsection