<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>

<a href="/create_Enseignant">create new</a>
<table border="1">
    <thead>
    <tr>
        <th>Matricule</th>
        <th>Nom&Prenom</th>
        <th>CIN</th>
        <th>CNRPS</th>
        <th>Departement</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
    </thead>
    <tbody >
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
            <td>
                <a href="/create_Enseignant/{{$ens->matProf}}">  Modifier </a>
            </td>
            <td>
                <a href="/supp_Enseignant/{{$ens->matProf}}"> Supp</a>
            </td>
    </tr>
    @endforeach

</table>
</body>
</html>