<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>

<a href="/create_Class">create new</a>
<table border="1">
    <thead>
    <tr>

        <th>Class</th>
        <th>Nom_Departement</th>
        <th>Formation</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
    </thead>
    <tbody >
    <tr>

        @foreach ($class_list as $classe)
            {{ csrf_field() }}
            <?php $dep=$classe->libDept($classe->idDept); ?>
            <?php $form=$classe->libForm($classe->idForm); ?>

            <td>{{$classe->nomClass}}</td>
            <td>{{$dep['0']->libDept}}</td>
            <td>{{$form['0']->libForm}}</td>
            <td>
                <a href="/create_Class/{{$classe->idClass}}">  Modifier </a>
            </td>
            <td>
                <a href="/supp_Class/{{$classe->idClass}}"> Supp</a>
            </td>
    </tr>
    @endforeach

</table>
</body>
</html>