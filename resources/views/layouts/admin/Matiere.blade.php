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
                    <input class="form-control" type="text" name="id" value="{{@$mat['0']->id}}" disabled>
                    <input class="form-control" type="hidden" name="id" id="" value="{{@$mat['0']->id}}">
                @endif
                Matiere_Name<input class="form-control" type="text" name="libMat" value="{{@$mat['0']->libMat}}">
                Unite_enseignement: <select class="form-control" name="idUnite" id="">
                    @foreach($Uens as $Uens_data)
                        <option value="{{ $Uens_data->idUnite }}"
                                @if(!empty(@$mat['0']->id) && $Uens_data->idUnite==@$mat['0']->idUnite)
                                selected="selected"
                                @endif
                        >{{$Uens_data->nomUnite}}</option>
                    @endforeach
                </select><br>
                Coefficient:<input class="form-control" type="number" min="1" step="any" name="coef" value="{{@$mat['0']->coef}}">
                Nombre d'heaure de TD:<input class="form-control" type="number" step="any" min="0" name="nbhTd" value="{{@$mat['0']->nbhTd}}">
                Nombre d'heaure de Cour:<input class="form-control" type="number" step="any" min="0" name="nbhC" value="{{@$mat['0']->nbhC}}">
                Nombre d'heaure de TP:<input class="form-control" type="number" step="any" min="0" name="nbhTp" value="{{@$mat['0']->nbhTp}}">

                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn btn-info btn-round" >Sounds good!</button>
                </div>

            </form>

</body>
</html>
<script>
    $(".tit").html('{!! __('EnTp.Subject') !!}');
</script>