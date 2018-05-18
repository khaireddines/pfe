<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>


  @if (!empty($dep['0']->idDept))
    <form class="form" action="/modify_dep/{{$dep['0']->idDept}}" method="post">
    @else
    <form class="form" action="/create_dep" method="post">
    @endif
      {{ csrf_field() }}

      @if (!empty(@$dep['0']->idDept))
        <div class="form-group bmd-form-group">
          <div class="input-group">
            <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">face</i>
                                            </span>
            </div>
            <div class="form-group bmd-form-group">
            <label for="idDept" class="bmd-label-floating">Departement_ID: *</label>
            <input type="text" id="idDept" name="idDept" class="form-control" value="{{@$dep['0']->idDept}}" disabled>
            </div>
          </div>
        </div>
        <input type="hidden" name="idDept" class="form-control" id="" value="{{@$dep['0']->idDept}}">

      @else
        <div class="form-group bmd-form-group">
          <div class="input-group">
            <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">face</i>
                                            </span>
            </div>
            <div class="form-group bmd-form-group">
            <label for="idDept" class="bmd-label-floating">Departement_ID: *</label>
            <input type="text" id="idDept" name="idDept" class="form-control" required>
            </div>
          </div>
        </div>
      @endif

      <div class="form-group bmd-form-group">
        <div class="input-group">
          <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">mail</i>
                                            </span>
          </div>
          <div class="form-group bmd-form-group">
          <label for="libDept" class="bmd-label-floating">Departement_Name: *</label>
          <input type="text" name="libDept" class="form-control" value="{{@$dep['0']->libDept}}" required>
          </div>
        </div>
      </div>
      <div class="form-group bmd-form-group">
        <div class="input-group">
          <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">mail</i>
                                            </span>
          </div>
          <div class="form-group bmd-form-group">
          <label for="idDept" class="bmd-label-floating">Departement_Description:</label>
          <textarea name="descDept" class="form-control" rows="2">{{@$dep['0']->descDept}}</textarea>
          </div>
        </div>
      </div>








        <div class="modal-footer justify-content-center">
          <button type="submit" class="btn btn-info btn-round" >Sounds good!</button>
        </div>



    </form>

  </body>
</html>
<script>
  $(".tit").html('Departments');
</script>
