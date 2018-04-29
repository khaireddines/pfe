<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>


  @if (!empty($dep['0']->idDept))
    <form class="" action="/modify/{{$dep['0']->idDept}}" method="post">
    @else
    <form class="" action="/create" method="post">
    @endif
      {{ csrf_field() }}
      Departement_ID:
      @if (!empty(@$dep['0']->idDept))
        <input type="text" name="idDept" value="{{@$dep['0']->idDept}}" disabled><br>
        <input type="hidden" name="idDept" id="" value="{{@$dep['0']->idDept}}">

      @else
        <input type="text" name="idDept" value=""><br>
      @endif

      Departement_Name<input type="text" name="libDept" value="{{@$dep['0']->libDept}}"><br>
      Departement_Description:<textarea name="descDept" rows="8" cols="80">{{@$dep['0']->descDept}}</textarea><br>
      @if (!empty($dep['0']->idDept))
        <input type="submit" name="" value="modify">
      @else
      <input type="submit" name="" value="add">
      @endif

    </form>

  </body>
</html>
