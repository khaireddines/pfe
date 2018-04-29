
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <a href="/create_form">create new</a>
    <table border="1">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nom</th>
          <th>Description</th>
          <th>Nom_Departement</th>
          <th>Modifier</th>
          <th>Supprimer</th>
        </tr>
      </thead>
      <tbody >
        <tr>

          @foreach ($form_list as $Form)
          {{ csrf_field() }}
          <?php $dep=$Form->deplib($Form->idDept); ?>
          <td>{{$Form->idForm}}</td>
          <td>{{$Form->libForm}}</td>
          <td>{{$Form->descForm}}</td>
          <td>{{$dep['0']->libDept}}</td>
          <td>
            <a href="/create_form/{{$Form->idForm}}">  Modifier </a>
          </td>
          <td>
            <a href="/supp_form/{{$Form->idForm}}"> Supp</a>
         </td>
         </tr>
         @endforeach

    </table>
  </body>
</html>
