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
              <i class="material-icons">school</i>

            </div>
            <button  type="button" class="float-md-right btn btn-warning  btn-round new" data-original-title="" title="" style="font-size: small;">
              <i class="material-icons">note_add</i>
              Add
            </button>
            <h4 class="card-title">Formations</h4>
            <
          </div>

          <div class="card-body ">



    <table class="table display table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%" id="mytable" >
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

              <button  type="button" rel="tooltip" value="{{$Form->idForm}}" class="btn btn-success btn-link edit" data-original-title="" title="">
                <i class="material-icons">edit</i>
              </button>
              <button onclick="location.href='/supp_form/{{$Form->idForm}}';" type="button" rel="tooltip" class="btn btn-danger btn-link" data-original-title="" title="">
                <i class="material-icons">close</i>
              </button>
            </td>
         </tr>
         @endforeach

    </table>
          </div></div></div></div></div>
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div role="document" class="modal-dialog ">
      <div class="modal-content">
        <div class="card card-signup ">
          <div class="modal-header">
            <div class="card-header card-header-primary text-center">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
              <h5 class="card-title tit" style="font-family: Century Gothic"></h5>

            </div>
          </div>
          <div class="modal-body here">

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
                      $(".here").load('/create_form') ;
                      $('#loginModal').modal();
                  });
                  $(".edit").click(function () {
                      var num=this.value;
                      $(".here").load('/create_form/'+num);
                      $('#loginModal').modal();
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
                  $(".F").addClass('active');
                  $(".pages").addClass('active');
                  $(".CRUD").addClass('show');
                  </script>
@endsection
