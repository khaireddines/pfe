<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
@if (!empty($mat['0']->id))
    <form class="" action="/modify_Matiere/{{$mat['0']->id}}" method="post">
        @else
            <form class="" action="/create_Matiere" method="post">
                @endif
                @csrf

                @if (!empty($mat['0']->id))
                    Matiere_ID:
                    <input type="text" name="id" value="{{@$mat['0']->id}}" disabled><br>
                    <input type="hidden" name="id" id="" value="{{@$mat['0']->id}}">
                @endif
                Matiere_Name<input type="text" name="libMat" value="{{@$mat['0']->libMat}}"><br>
                Unite_enseignement: <select name="idUnite" id="">
                    @foreach($Uens as $Uens_data)
                        <option value="{{ $Uens_data->idUnite }}"
                                @if(!empty(@$mat['0']->id) && $Uens_data->idUnite==@$mat['0']->idUnite)
                                selected="selected"
                                @endif
                        >{{$Uens_data->nomUnite}}</option>
                    @endforeach
                </select><br>
                Coefficient:<input type="number" min="1" step="any" name="coef" value="{{@$mat['0']->coef}}"><br>
                Nombre d'heaure de TD:<input type="number" step="any" min="0" name="nbhTd" value="{{@$mat['0']->nbhTd}}"><br>
                Nombre d'heaure de Cour:<input type="number" step="any" min="0" name="nbhC" value="{{@$mat['0']->nbhC}}"><br>
                Nombre d'heaure de TP:<input type="number" step="any" min="0" name="nbhTp" value="{{@$mat['0']->nbhTp}}"><br>

                @if (!empty($mat['0']->id))
                    <input type="submit" name="" value="modify">
                @else
                    <input type="submit" name="" value="add">
                @endif

            </form>

</body>
</html>