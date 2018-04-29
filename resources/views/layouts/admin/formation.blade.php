<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>

@if (!empty($form['0']->idForm))
    <form class="" action="/modify_form/{{$form['0']->idForm}}" method="post">
        @else
            <form class="" action="/create_form" method="post">
                @endif
                {{ csrf_field() }}
                Fromation_ID:
                @if (!empty($form['0']->idForm))
                <input type="text" name="idForm" value="{{@$form['0']->idForm}}" disabled><br>
                    <input type="hidden" name="idForm" id="" value="{{@$form['0']->idForm}}">

                    @else
                    <input type="text" name="idForm" value=""><br>
                @endif
                Formation_Name<input type="text" name="libForm" value="{{@$form['0']->libForm}}"><br>
                Formation_Description:<textarea name="descForm" rows="8" cols="80">{{@$form['0']->descForm}}</textarea><br>
                Departement: <select name="idDept" id="">
                    @foreach($dep as $dep_data)
                    <option value="{{$dep_data->idDept}}"
                            @if(!empty(@$form['0']->idForm) || $dep_data->idDept==@$form['0']->idDept)
                            selected
                            @endif
                    >{{$dep_data->libDept}}</option>
                    @endforeach
                </select>
                Session: <select name="idSession" id="">
                    @foreach($sess as $sess_data)
                        <option value="{{$sess_data->idSession}}"
                                @if (!empty(@$form['0']->idForm) || ($sess_data->idSession==@$form['0']->idSession))
                                 selected
                                @endif
                        >{{$sess_data->nomSession}}</option>
                    @endforeach
                </select>
                @if (!empty($form['0']->idForm))
                    <input type="submit" name="" value="modify">
                @else
                    <input type="submit" name="" value="add">
                @endif

            </form>




</body>
</html>