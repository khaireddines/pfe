<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>

@if (!empty($form['0']->idForm))
    <form class="form" action="/modify_form/{{$form['0']->idForm}}" method="post">
        @else
            <form class="form" action="/create_form" method="post">
                @endif
                @csrf

                @if (!empty($form['0']->idForm))
                    <div class="form-group bmd-form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">mail</i>
                                            </span>
                            </div>
                            <div class="form-group bmd-form-group">
                                <label for="idForm" class="bmd-label-floating">Formation_ID:</label>
                                <input type="text" id="idForm" class="form-control" name="idForm" value="{{@$form['0']->idForm}}" disabled>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="idForm" id="" value="{{@$form['0']->idForm}}">

                    @else
                    <div class="form-group bmd-form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">mail</i>
                                            </span>
                            </div>
                            <div class="form-group bmd-form-group">
                                <label for="idForm" class="bmd-label-floating">Formation_ID:</label>
                                <input type="text" id="idForm" class="form-control" name="idForm">
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
                            <label for="form_name" class="bmd-label-floating">Formation_Name:</label>
                            <input type="text" class="form-control" id="form_name" name="libForm" value="{{@$form['0']->libForm}}">
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
                            <label for="textarea" class="bmd-label-floating">Formation_Description:</label>
                            <textarea name="descForm" class="form-control" id="textarea">{{@$form['0']->descForm}}</textarea>
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
                            <select class="form-control" name="idDept" id="">
                                <option value="0" disabled selected>--Department--</option>
                                @foreach($dep as $dep_data)
                                    <option value="{{$dep_data->idDept}}"
                                            @if(!empty(@$form['0']->idForm) || $dep_data->idDept==@$form['0']->idDept)
                                            selected
                                            @endif
                                    >{{$dep_data->libDept}}</option>
                                @endforeach
                            </select>
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
                            <select class="form-control" name="idSession" id="">
                                <option value="0" disabled selected>--Session--</option>
                                @foreach($sess as $sess_data)
                                    <option value="{{$sess_data->idSession}}"
                                            @if (!empty(@$form['0']->idForm) || ($sess_data->idSession==@$form['0']->idSession))
                                            selected
                                            @endif
                                    >{{$sess_data->nomSession}}</option>
                                @endforeach
                            </select>
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
    $(".tit").html('Formations');
</script>