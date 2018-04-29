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
                    <input type="text" name="idUnite" value="{{@$unite['0']->idUnite}}" disabled><br>
                    <input type="hidden" name="idUnite" id="" value="{{@$unite['0']->idUnite}}">

                @else
                    <input type="text" name="idUnite" value=""><br>
                @endif
                Formation: <select name="idForm" id="">
                    @foreach($form as $form_data)
                        <option value="{{$form_data->idForm}}"
                                @if(!empty(@$unite['0']->idUnite) || $form_data->idForm==@$unite['0']->idForm)
                                selected
                                @endif
                        >{{$form_data->libForm}}</option>
                    @endforeach
                </select><br>
                Unite_ens_Name<input type="text" name="nomUnite" value="{{@$unite['0']->nomUnite}}"><br>
                Nature: <select name="natureUnite" id="">
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
                </select><br>
                Total_Hours_Vol: <input type="number" name="totalVol_Horaire" value="{{@$unite['0']->totalVol_Horaire}}"><br>
                CreditUe: <input type="number" name="creditUe" value="{{@$unite['0']->creditUe}}"><br>
                CoefUe: <input type="number" name="coefUe" value="{{@$unite['0']->coefUe}}"><br>

                @if (!empty($unite['0']->idUnite))
                    <input type="submit" name="" value="modify">
                @else
                    <input type="submit" name="" value="add">
                @endif

            </form>

</body>
</html>