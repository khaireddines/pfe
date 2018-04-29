<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
@if (!empty($ens['0']->matProf))
    <form class="" action="/modify_Enseignant/{{$ens['0']->matProf}}" method="post">
        @else
            <form class="" action="/create_Enseignant" method="post">
                @endif
                {{ csrf_field() }}
    <table border="1">
    <tr>
        <td>Matricule:*</td><td>
        @if (!empty($ens['0']->idProf))

            <input type="text" name="matProf" value="{{@$ens['0']->matProf}}" disabled>
            <input type="text" name="matProf" value="{{@$ens['0']->matProf}}">

        @else
            <input type="text" name="matProf" value="{{@$ens['0']->matProf}}">
        @endif
        </td></tr><tr>
        <td>Nom:*</td><td><input type="text" name="nom" value="{{@$ens['0']->nom}}" style="text-transform:uppercase"></td></tr><tr>
        <td>Prenom:*</td><td><input type="text" name="prenom" value="{{@$ens['0']->prenom}}"></td></tr><tr>
        <td>CIN/Passeport:*</td><td><input type="number" name="cin" value="{{@$ens['0']->cin}}"></td></tr><tr>
        <td>Identifiant CNRPS:*</td><td><input type="number" name="cnrps" value="{{@$ens['0']->cnrps}}"></td></tr><tr>
        <td>Email:</td><td><input type="email" name="email" value="{{@$ens['0']->email}}"></td></tr><tr>
        <td>Date de Naissance:*</td><td><input type="date" name="date_nai" value="{{@$ens['0']->date_nai}}"></td></tr><tr>
        <td>Nationalité:</td><td><input type="text" name="nationalite" value="{{@$ens['0']->nationalite}}"></td></tr><tr>
        <td>Sexe:*</td><td><input type="radio" name="sexe" value="Male" checked>Male
                          <input type="radio" name="sexe" value="Female">Female
                      </td></tr><tr>
        <td>Date entrer Administration:</td><td><input type="date" name="date_adm" value="{{@$ens['0']->date_adm}}"></td></tr><tr>
        <td>Date entrer Etablisement:</td><td><input type="date" name="date_etbs" value="{{@$ens['0']->date_etbs}}"></td></tr><tr>
        <td>Diplôme:*</td><td><input type="text" name="diplome" value="{{@$ens['0']->diplome}}"></td></tr><tr>
        <td>Adresse:</td><td><input type="text" name="adresse" value="{{@$ens['0']->adresse}}"></td></tr><tr>
        <td>Ville:</td><td><input type="text" name="ville" value="{{@$ens['0']->ville}}"></td></tr><tr>
        <td>Code Postal:</td><td><input type="number" name="code_postal" value="{{@$ens['0']->code_postal}}"></td></tr><tr>
        <td>N° Télephone:</td><td><input type="number" name="n_tele" value="{{@$ens['0']->n_tele}}"></td></tr><tr>
        <td>Grade:</td><td><input type="text" name="grade" value="{{@$ens['0']->grade}}"></td></tr><tr>
        <td>Date de nomination:</td><td><input type="date" name="date_nomi" value="{{@$ens['0']->date_nomi}}"></td></tr><tr>
        <td>Date de Titulir:</td><td><input type="date" name="date_titulir" value="{{@$ens['0']->date_titulir}}"></td></tr><tr>
        <td>N°Post:</td><td><input type="number" name="n_post" value="{{@$ens['0']->n_post}}"></td></tr><tr>
        <td>N°Bureau:</td><td><input type="text" name="n_bureau" value="{{@$ens['0']->n_bureau}}"></td></tr><tr>
        <td>Département:*</td><td><select name="idDept" id="">
                @foreach($dep as $dep_data)
                    <option value="{{$dep_data->idDept}}"
                            @if(!empty(@$ens['0']->idProf) && $dep_data->idDept==@$ens['0']->idDept)
                            selected="selected"
                            @endif
                    >{{$dep_data->libDept}}</option>
                @endforeach
            </select>
         </td></tr><tr>
        <td>Situation:*</td><td><select name="situation" id="">
                <option value="Celibartaire">Celibartaire</option>
                <option value="Marié">Marié</option>
                <option value="Divorcé">Divorcé</option>
                <option value="Veuf">Veuf(e)</option>
            </select></td></tr><tr>
        <td>Specialité:</td><td><input type="text" name="specialite" value="{{@$ens['0']->specialite}}"></td></tr><tr>
        <td>N° de Compte Banque:</td><td><input type="number" name="n_compte_banque" value="{{@$ens['0']->n_compte_banque}}"></td></tr><tr>
        <td>Agence:</td><td><input type="text" name="agence" value="{{@$ens['0']->agence}}"></td></tr><tr>
        <td>Adresse pendant le vacence:</td><td><input type="text" name="ad_vacence" value="{{@$ens['0']->ad_vacence}}"></td></tr><tr>
        <td>N° Télephone pendant le Vacence:</td><td><input type="number" name="n_tel_vacence" value="{{@$ens['0']->n_tel_vacence}}"></td></tr><tr>
        <td>Lieu de Naissance:</td><td><input type="text" name="lieu_nai" value="{{@$ens['0']->lieu_nai}}"></td></tr><tr>
        <td>Début du Contrat:*</td><td><input type="date" name="debut_con" value="{{@$ens['0']->debut_con}}"></td></tr><tr>
        <td>Fin du Contrat:*</td><td><input type="date" name="fin_con" value="{{@$ens['0']->fin_con}}"></td>
<tr><td></td> <td>
            @if (!empty($ens['0']->matProf))
            <input type="submit" name="" value="modify">
        @else
            <input type="submit" name="" value="add">
        @endif</td>
    </tr>
</table>
</body>
</html>