<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>


  @if (!empty($dep['0']->idDept))
    <form class="" action="/modify_dep/{{$dep['0']->idDept}}" method="post">
    @else
    <form class="" action="/create_dep" method="post">
    @endif
      {{ csrf_field() }}
      Departement_ID:
      @if (!empty(@$dep['0']->idDept))
        <input type="text" name="idDept" class="form-control" value="{{@$dep['0']->idDept}}" disabled><br>
        <input type="hidden" name="idDept" class="form-control" id="" value="{{@$dep['0']->idDept}}">

      @else
        <input type="text" class="form-control" name="idDept" value=""><br>
      @endif

      Departement_Name<input type="text" name="libDept" class="form-control" value="{{@$dep['0']->libDept}}"><br>
      Departement_Description:<textarea name="descDept" class="form-control" rows="8" cols="80">{{@$dep['0']->descDept}}</textarea><br>
      @if (!empty($dep['0']->idDept))
        <input type="submit" class="form-control" name="" value="modify">
        <div class="modal-footer justify-content-center">
          <button type="submit" class="btn btn-info btn-round" data-dismiss="modal">Sounds good!</button>
        </div>

      @else
        <div class="modal-footer justify-content-center">
          <button type="submit" class="btn btn-info btn-round" data-dismiss="modal">Sounds good!</button>
        </div>
      <input type="submit" class="form-control" name="" value="add">
      @endif

    </form>

  </body>
</html>
