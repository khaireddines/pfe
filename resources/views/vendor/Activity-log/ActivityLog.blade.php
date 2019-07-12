@extends('vendor.Activity-log._MasterActivityLog')
@section('custemImp')
    <style>
        .dataTables_filter {
            float: right !important;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @endsection
@section('content')
<div class="page-header mb-4">
    <h1>Logs</h1>
</div>

<div class="table-responsive">
    <table id="mytable" class="table display table-sm table-hover table-striped">
        <thead>
        <tr class="text-center">

            <th scope="col" class="">

                <span class="badge badge-info">Date</span>



            </th>

            <th scope="col" class="">



                <span class="badge badge-level-debug">
                Causer
                </span>

            </th>

            <th scope="col" class="">



                <span class="badge badge-level-notice">
                Description
                </span>

            </th>

            <th scope="col" class="">



                <span class="badge badge-level-alert">
                Subject
                </span>

            </th>


            <th scope="col" class="text-right">Actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach($logs as $data)
                <tr class="text-center">
                    <td class="">
                        <span class="badge badge-level-all">{{$data->created_at}}</span>
                    </td>
                    <td class="">
                        <span class="badge badge-default">{{$data->causer->name}}</span>
                    </td>
                    <td class="">
                        <span class="badge badge-default">{{$data->description}}</span>
                    </td>
                    <td class="">
                        <span class="badge badge-default">{{$data->subject_type}}</span>
                    </td>
                    <td class="pull-right">
                        <a href='/admin/Activity/{{$data->id}}' class="btn btn-sm btn-info">
                            <i class="fa fa-search"></i>
                        </a>
                        <button aa="{{$data->id}}" class="btn btn-sm btn-success download">
                            <i class="fa fa-download"></i>
                        </button>

                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
</div>
@endsection
@section('scripts')

    <script type="text/javascript" charset="utf8" src="{{asset('js/datatables.min.js')}}"></script>
    <script>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".download").click(function () {
            var id=$(this).attr('aa');
            console.log(id);
            $.ajax({
                url:"/Activity_log",
                method:"POST",
                async:true,
                data:{id:id,_token: '{!! csrf_token() !!}'},
                dataType:"text"
            });
        });
    </script>
    @endsection