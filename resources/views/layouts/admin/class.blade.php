<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title></title>
</head>
<body>

@if (!empty($class['0']->idClass))
    <form class="form" action="/modify_Class/{{$class['0']->idClass}}" method="post">
        @else
            <form class="form" action="/create_Class" method="post">
                @endif
                @csrf
                @if (!empty($class['0']->idClass))

                    <div class="form-group bmd-form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">mail</i>
                                            </span>
                            </div>
                            <div class="form-group bmd-form-group">
                                <label for="idForm" class="bmd-label-floating">Class_name:</label>
                                <input type="text" class="form-control" name="nomClass" value="{{@$class['0']->nomClass}}" disabled>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" class="form-control" name="idClass" id="" value="{{@$class['0']->idClass}}">

                @endif
                <div class="form-group bmd-form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">mail</i>
                                            </span>
                        </div>
                        <div class="form-group bmd-form-group">

                            <select class="form-control" name="idDept" id="idDept">
                                <option value="0" disabled selected style="cursor: not-allowed">--Departement--</option>
                                @foreach($dep as $dep_data)
                                    <option value="{{$dep_data->idDept}}"
                                            @if(!empty(@$class['0']->idClass) && @$class['0']->idDept==@$dep_data->idDept)
                                            selected="selected"
                                            @endif
                                    >{{$dep_data->libDept}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group bmd-form-group">
                    <div class="input-group">
                        <div class="input-group-prepend hide" style="display: none">
                                            <span class="input-group-text">
                                                <i class="material-icons">mail</i>
                                            </span>
                        </div>
                        <div class="form-group bmd-form-group">

                            <div id="formation"></div>

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

                            <select name="idSession" id="" class="form-control">
                                <option value="0" selected disabled style="cursor: not-allowed">--Session--</option>
                                @foreach($sess as $sess_data)
                                    <option value="{{$sess_data->idSession}}"
                                            @if (!empty(@$class['0']->idClass) || ($sess_data->idSession==@$class['0']->idSession))
                                            selected
                                            @endif
                                    >{{$sess_data->nomSession}}</option>
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
                            <label for="idForm" class="bmd-label-floating">Class Num:</label>
                            <input type="number" class="form-control" name="numclass" value="{{@$class['0']->idClass}}" required>

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
$(".tit").html('Classes');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
$(document).ready(function(){

$('#idDept').change(function(){
var search = $(this).val();

$.ajax({
url:"/fetch_formation",
method:"GET",
data:{idDept:search},
    dataType:"text",
    success:function(data)
    {
        $('#formation').html(data);
        $('#formation :input').addClass('form-control');
        $('.hide').show();

    }
});


});
});
</script>