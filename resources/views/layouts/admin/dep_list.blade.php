<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <a href="/create">create new</a>
    <table border="1">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nom</th>
          <th>Description</th>
          <th>Modifier</th>
          <th>Supprimer</th>
        </tr>
      </thead>
      <tbody >
        <tr>
          @foreach ($dep_list as $data)
          {{ csrf_field() }}
          <td>{{$data->idDept}}</td>
          <td>{{$data->libDept}}</td>
          <td>{{$data->descDept}}</td>
          <td>
            <a href="/create/{{$data->idDept}}">  Modifier </a>
          </td>
          <td>
            <a href="/supp/{{$data->idDept}}"> Supp</a>
         </td>
         </tr>
         @endforeach

    </table>
  </body>
</html>
