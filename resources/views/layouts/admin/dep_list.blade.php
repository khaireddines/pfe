@extends('layouts.admin.adminDashbord')
@section('custemImp')
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">
@endsection
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">





        <div class="card ">

          <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
              <i class="material-icons">location_city</i>

            </div>
            <button type="button" class="float-md-right btn btn-warning  btn-round new" data-original-title="" title="" style="font-size: small;">
              <i class="material-icons">note_add</i>
              Add
            </button>
            <h4 class="card-title">Departments</h4>
            <
          </div>

          <div class="card-body ">



    <table class="table display table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%" id="mytable"  >
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

              <button  type="button" rel="tooltip" class="btn btn-success btn-link edit" value="{{$data->idDept}}" data-original-title="" title="">
                <i class="material-icons">edit</i>
              </button>
              <button onclick="location.href='/supp_dep/{{$data->idDept}}';" type="button" rel="tooltip" class="btn btn-danger btn-link" data-original-title="" title="">
                <i class="material-icons">close</i>
              </button>
            </td>
         </tr>
         @endforeach
      </tbody></table>
          </div></div></div></div></div>
  <div class="modal fade" id="noticeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-notice">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="myModalLabel">New Department</h5>

              </div>
              <div class="modal-body">
                  <div class="instruction">
                      <div class="here">

                    </div>

              </div>
          </div>
      </div>
  </div>

@endsection
@section('custemScript')
  <script src="{{asset('js/jquery.datatables.js')}}"></script>
  <script>
    $(".new").click(function () {
       $(".here").load('/create_dep') ;
        $('#noticeModal').modal();
    });
    $(".edit").click(function () {
        var num=this.value;
       $(".here").load('/create_dep/'+num);
        $('#noticeModal').modal();
    });


      $(document).ready(function() {
          $('#mytable').DataTable({
              "pagingType": "full_numbers",
              "lengthMenu": [
                  [5, 10, 25, -1],
                  [5, 10, 25, "All"]
              ],
              responsive: true,
              language: {
                  search: "_INPUT_",
                  searchPlaceholder: "Search records"
              }

          });
      });
      $(".CRUD").addClass('active');
      $(".D").addClass('active');
      $(".pages").addClass('active');
      $(".CRUD").addClass('show');
  </script>
@endsection

