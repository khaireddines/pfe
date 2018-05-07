@extends('layouts.admin.adminDashbord')
@section('custemImp')
@endsection
@section('content')

            <div class="col-md-12 mr-auto ml-auto">
                <!--      Wizard container        -->
                <div class="wizard-container">
                    <div class="card card-wizard" data-color="rose" id="wizardProfile">
                        @if (!empty($ens['0']->matProf))--}}
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
                                                        <label for="exampleInput1" class="bmd-label-floating">matricule (required)</label>
                                                        <input type="text" class="form-control" id="exampleInput1" name="firstname" required>
                                                    </div>
                                                    <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">face</i>
                          </span>
                                                    </div>
                                                    <div style="width: 25%" class="form-group">
                                                        <label for="exampleInput1" class="bmd-label-floating">First Name (required)</label>
                                                        <input type="text" class="form-control" id="exampleInput1" name="firstname" required>
                                                    </div>
                                                    <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">record_voice_over</i>
                          </span>
                                                    </div>
                                                    <div style="width: 25%" class="form-group">
                                                        <label for="exampleInput11" class="bmd-label-floating">Second Name</label>
                                                        <input type="text" class="form-control" id="exampleInput11" name="lastname" required>
                                                    </div>
                                                </div>
                                                <div class="input-group form-control-lg">
                                                    <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">aspect_ratio</i>
                          </span>
                                                    </div>
                                                    <div style="width: 15%" class="form-group">
                                                        <label for="exampleInput1" class="bmd-label-floating">CIN (required)</label>
                                                        <input type="text" class="form-control" id="exampleInput1" name="firstname" required>
                                                    </div>
                                                    <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">security</i>
                          </span>
                                                    </div>
                                                    <div style="width: 15%" class="form-group">
                                                        <label for="exampleInput1" class="bmd-label-floating">CNRPS</label>
                                                        <input type="text" class="form-control" id="exampleInput1" name="firstname" required>
                                                    </div>
                                                    <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">date_range</i>
                          </span>
                                                    </div>
                                                    <div style="width: 15%" class="form-group">
                                                        <label for="exampleInput11" class="bmd-label-floating">Birth Date </label>
                                                        <input type="date" class="form-control" id="exampleInput11" name="lastname" required>
                                                    </div>
                                                    <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">place</i>
                          </span>
                                                    </div>
                                                    <div style="width: 24%" class="form-group">
                                                        <label for="exampleInput11" class="bmd-label-floating">Birth Place </label>
                                                        <input type="text" class="form-control" id="exampleInput11" name="lastname" required>
                                                    </div>
                                                </div>
                                                <div class="input-group form-control-lg">
                                                    <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">flag</i>
                          </span>
                                                    </div>
                                                    <div style="width: 24%" class="form-group">
                                                        <label for="exampleInput11" class="bmd-label-floating">Nationality</label>
                                                        <input type="text" class="form-control" id="exampleInput11" name="lastname" required>
                                                    </div>
                                                    <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">supervisor_account</i>
                          </span>
                                                    </div>
                                                    <div style="width: 24%" class="form-group">


                                                        <select class="form-control" name="situation" id="exampleInput11" required>
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
                                                        <label for="exampleInput1" class="bmd-label-floating">Email (required)</label>
                                                        <input type="email" class="form-control" id="exampleemalil" name="email" required>
                                                    </div>
                                                    <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">contact_phone</i>
                          </span>
                                                    </div>
                                                    <div class="form-group" style="width: 25%">
                                                        <label for="exampleInput1" class="bmd-label-floating">Phone Number</label>
                                                        <input type="number" class="form-control" id="exampleemalil" name="email" required>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="account">
                                        <h5 class="info-text"> What are you doing? (checkboxes) </h5>
                                        <div class="row justify-content-center">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="choice" data-toggle="wizard-checkbox">
                                                            <input type="checkbox" name="jobb" value="Design">
                                                            <div class="icon">
                                                                <i class="fa fa-pencil"></i>
                                                            </div>
                                                            <h6>Design</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="choice" data-toggle="wizard-checkbox">
                                                            <input type="checkbox" name="jobb" value="Code">
                                                            <div class="icon">
                                                                <i class="fa fa-terminal"></i>
                                                            </div>
                                                            <h6>Code</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="choice" data-toggle="wizard-checkbox">
                                                            <input type="checkbox" name="jobb" value="Develop">
                                                            <div class="icon">
                                                                <i class="fa fa-laptop"></i>
                                                            </div>
                                                            <h6>Develop</h6>
                                                        </div>
                                                        <select class="selectpicker" data-style="btn btn-primary btn-round" title="Single Select" data-size="7">
                                                            <option disabled selected>Choose city</option>
                                                            <option value="2">Foobar</option>
                                                            <option value="3">Is great</option>
                                                        </select>
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
                                                    <label>Street Name</label>
                                                    <input type="text" class="form-control" name="streetName" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Street No.</label>
                                                    <input type="number" class="form-control" name="streetNo" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" class="form-control" name="city" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <select class="selectpicker" data-size="7" data-style="select-with-transition" title="Single Select">
                                                        <option value="Afghanistan"> Afghanistan </option>
                                                        <option value="Albania"> Albania </option>
                                                        <option value="Algeria"> Algeria </option>
                                                        <option value="American Samoa"> American Samoa </option>
                                                        <option value="Andorra"> Andorra </option>
                                                        <option value="Angola"> Angola </option>
                                                        <option value="Anguilla"> Anguilla </option>
                                                        <option value="Antarctica"> Antarctica </option>
                                                    </select>
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
                                    <input type="button" class="btn btn-finish btn-fill btn-rose btn-wd" name="finish" value="Finish" style="display: none;">
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