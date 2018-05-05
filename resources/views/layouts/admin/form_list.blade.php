@extends('layouts.app')
@section('custemImp')
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">
@endsection
@section('content')


  <button onclick="location.href='/create_form';" type="button" class="float-md-right btn btn-warning  btn-round" data-original-title="" title="" style="font-size: small;">
    <i class="material-icons">note_add</i>
    Add
  </button>

    <table class="table">
      <thead>
        <tr class="text-center">
          <th>Id</th>
          <th>Nom</th>
          <th>Description</th>
          <th>Departement</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <tr>

          @foreach ($form_list as $Form)
          {{ csrf_field() }}
          <?php $dep=$Form->deplib($Form->idDept); ?>
          <td>{{$Form->idForm}}</td>
          <td>{{$Form->libForm}}</td>
          <td>{{$Form->descForm}}</td>
          <td>{{$dep['0']->libDept}}</td>
          {{--<td>--}}
            {{--<a href="/create_form/{{$Form->idForm}}">  Modifier </a>--}}
          {{--</td>--}}
          {{--<td>--}}
            {{--<a href="/supp_form/{{$Form->idForm}}"> Supp</a>--}}
         {{--</td>--}}
            <td class="td-actions text-right">

              <button onclick="location.href='/create_form/{{$Form->idForm}}';" type="button" rel="tooltip" class="btn btn-success btn-link" data-original-title="" title="">
                <i class="material-icons">edit</i>
              </button>
              <button onclick="location.href='/supp_form/{{$Form->idForm}}';" type="button" rel="tooltip" class="btn btn-danger btn-link" data-original-title="" title="">
                <i class="material-icons">close</i>
              </button>
            </td>
         </tr>
         @endforeach

    </table>
@endsection
@section('custemScript')
@endsection
