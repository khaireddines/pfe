<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>

<a href="/create_Matiere">create new</a>
<table border="1">
    <thead>
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Unite_enseignement</th>
        <th>Coefficient</th>
        <th>H/TD</th>
        <th>H/C</th>
        <th>H/TP</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
    </thead>
    <tbody >
    <tr>
@if(!empty(@$mat_list))
        @foreach ($mat_list as $mat)
            {{ csrf_field() }}
            <?php @$unite=$mat->libUnite($mat->idUnite); ?>
            <td>{{$mat->idMat}}</td>
            <td>{{$mat->libMat}}</td>
            <td>{{$unite['0']->nomUnite}}</td>
            <td>{{$mat->coef}}</td>
            <td>{{$mat->nbhTd}}</td>
            <td>{{$mat->nbhC}}</td>
            <td>{{$mat->nbhTp}}</td>
            <td>
                <a href="/create_Matiere/{{$mat->idMat}}">  Modifier </a>
            </td>
            <td>
                <a href="/supp_Matiere/{{$mat->idMat}}"> Supp</a>
            </td>
    </tr>
    @endforeach
@endif
</table>


</body>
</html>