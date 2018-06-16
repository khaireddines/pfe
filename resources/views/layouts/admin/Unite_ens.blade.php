<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
@if (!empty($unite['0']->idUnite))
    <form class="" action="/modify_Uens/{{$unite['0']->idUnite}}" method="post">
        @else
            <form class="" action="/create_Uens" method="post">
                @endif
                {{ csrf_field() }}
                Unite_ens_ID:
                @if (!empty($unite['0']->idUnite))
                    <input type="text" class="form-control" name="idUnite" value="{{@$unite['0']->idUnite}}" disabled>
                    <input type="hidden" class="form-control" name="idUnite" id="" value="{{@$unite['0']->idUnite}}">

                @else
                    <input type="text" class="form-control" name="idUnite" value="">
                @endif
                Formation: <select  class="form-control" name="idForm" id="">
                    @foreach($form as $form_data)
                        <option value="{{$form_data->idForm}}"
                                @if(!empty(@$unite['0']->idUnite) || $form_data->idForm==@$unite['0']->idForm)
                                selected
                                @endif
                        >{{$form_data->libForm}}</option>
                    @endforeach
                </select><br>
                Unite_ens_Name<input type="text" class="form-control" name="nomUnite" value="{{@$unite['0']->nomUnite}}">
                Nature: <select class="form-control" name="natureUnite" id="">
                    <option value="Principal"
                            @if(!empty(@$unite['0']->idUnite) || @$unite['0']->natureUnite=='Principal')
                            selected
                            @endif
                    >Principal</option>
                    <option value="Secondaire"
                            @if(!empty(@$unite['0']->idUnite) || @$unite['0']->natureUnite=='Secondaire')
                            selected
                            @endif
                    >Secondaire</option>
                </select>
                Total_Hours_Vol: <input class="form-control" type="number" name="totalVol_Horaire" value="{{@$unite['0']->totalVol_Horaire}}">
                CreditUe: <input class="form-control" type="number" name="creditUe" value="{{@$unite['0']->creditUe}}">
                CoefUe: <input class="form-control" type="number" name="coefUe" value="{{@$unite['0']->coefUe}}">

                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn btn-info btn-round" >Sounds good!</button>
                </div>

            </form>

</body>
</html>
<script>
    $(".tit").html('{!! __('EnTp.Teaching Unit') !!}');
</script>