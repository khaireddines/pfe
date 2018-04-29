<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="{{asset('js/jquery-2.1.3.min.js')}}"></script>
    <title></title>
</head>
<body>

@if (!empty($class['0']->idClass))
    <form class="" action="/modify_Class/{{$class['0']->idClass}}" method="post">
        @else
            <form class="" action="/create_Class" method="post">
                @endif
                {{ csrf_field() }}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @if (!empty($class['0']->idClass))
                    Class_name:

                    <input type="hidden" name="idClass" id="" value="{{@$class['0']->idClass}}">
                    <input type="text" name="nomClass" value="{{@$class['0']->nomClass}}" disabled><br>
                @endif


                Departement: <select name="idDept" id="idDept">
                    @foreach($dep as $dep_data)
                        <option value="{{$dep_data->idDept}}"
                                @if(!empty(@$class['0']->idClass) && @$class['0']->idDept==@$dep_data->idDept)
                                    selected="selected"
                                @endif
                        >{{$dep_data->libDept}}</option>
                    @endforeach
                </select>
                <div id="formation"></div>
                Session: <select name="idSession" id="">
                    @foreach($sess as $sess_data)
                        <option value="{{$sess_data->idSession}}"
                                @if (!empty(@$class['0']->idClass) || ($sess_data->idSession==@$class['0']->idSession))
                                selected
                                @endif
                        >{{$sess_data->nomSession}}</option>
                    @endforeach
                </select><br>
                Class_Num:<input type="number" name="numclass" value="{{@$class['0']->idClass}}">
                @if (!empty($class['0']->idClass))
                    <input type="submit" name="" value="modify">
                @else
                    <input type="submit" name="" value="add">
                @endif

            </form>


</body>
</html>
<script>
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
    }
});


});
});
</script>