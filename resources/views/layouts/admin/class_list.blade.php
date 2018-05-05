@extends('layouts.app')
@section('custemImp')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
@endsection
@section('content')


<button onclick="location.href='/create_Class';" type="button" class="float-md-right btn btn-warning  btn-round" data-original-title="" title="" style="font-size: small;">
    <i class="material-icons">note_add</i>
    Add
</button>
<table class="table">
    <thead>
    <tr class="text-center">

        <th>Class</th>
        <th>Nom_Departement</th>
        <th>Formation</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody class="text-center">
    <tr>

        @foreach ($class_list as $classe)
            {{ csrf_field() }}
            <?php $dep=$classe->libDept($classe->idDept); ?>
            <?php $form=$classe->libForm($classe->idForm); ?>

            <td>{{$classe->nomClass}}</td>
            <td>{{$dep['0']->libDept}}</td>
            <td>{{$form['0']->libForm}}</td>
            {{--<td>--}}
                {{--<a href="/create_Class/{{$classe->idClass}}">  Modifier </a>--}}
            {{--</td>--}}
            {{--<td>--}}
                {{--<a href="/supp_Class/{{$classe->idClass}}"> Supp</a>--}}
            {{--</td>--}}
            <td class="td-actions text-right">

                <button onclick="location.href='/create_Class/{{$classe->idClass}}';" type="button" rel="tooltip" class="btn btn-success btn-link" data-original-title="" title="">
                    <i class="material-icons">edit</i>
                </button>
                <button onclick="location.href='/supp_Class/{{$classe->idClass}}';" type="button" rel="tooltip" class="btn btn-danger btn-link" data-original-title="" title="">
                    <i class="material-icons">close</i>
                </button>
            </td>
    </tr>
    @endforeach

</table>
@endsection
@section('custemScript')
@endsection