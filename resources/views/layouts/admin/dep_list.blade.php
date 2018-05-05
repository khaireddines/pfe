@extends('layouts.app')
@section('custemImp')
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">
@endsection
@section('content')


  <button onclick="location.href='/create_dep';" type="button" class="float-md-right btn btn-warning  btn-round" data-original-title="" title="" style="font-size: small;">
    <i class="material-icons">note_add</i>
    Add
  </button>

    <table class="table">
      <thead>
        <tr  class="text-center">
          <th>Id</th>
          <th>Nom</th>
          <th>Description</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody  class="text-center">
        <tr>
          @foreach ($dep_list as $data)
          {{ csrf_field() }}
          <td>{{$data->idDept}}</td>
          <td>{{$data->libDept}}</td>
          <td>{{$data->descDept}}</td>
          {{--<td>--}}
            {{--<a href="/create/{{$data->idDept}}">  Modifier </a>--}}
          {{--</td>--}}
          {{--<td>--}}
            {{--<a href="/supp/{{$data->idDept}}"> Supp</a>--}}
         {{--</td>--}}
            <td class="td-actions text-right">

              <button onclick="location.href='/create_dep/{{$data->idDept}}';" type="button" rel="tooltip" class="btn btn-success btn-link" data-original-title="" title="">
                <i class="material-icons">edit</i>
              </button>
              <button onclick="location.href='/supp_dep/{{$data->idDept}}';" type="button" rel="tooltip" class="btn btn-danger btn-link" data-original-title="" title="">
                <i class="material-icons">close</i>
              </button>
            </td>
         </tr>
         @endforeach

    </table>
@endsection
@section('custemScript')
@endsection

