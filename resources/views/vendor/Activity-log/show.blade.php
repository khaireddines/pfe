@extends('vendor.Activity-log._MasterActivityLog')
@section('custemImp')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @endsection
@section('content')
<br>
@php $table=$log[0]->properties;@endphp
<div class="row">
        {{-- Log Menu --}}
        <div class="col-lg-12">
            {{-- Log Details --}}
            <div class="card mb-4">
                <div class="card-header">
                    Log info :
                    <div class="group-btns pull-right">
                        <button class="btn btn-sm btn-success download">
                            <i class="fa fa-download"></i> DOWNLOAD
                        </button>

                    </div>
                </div>
                <div class="table-responsive here">
                    <table class="table table-condensed mb-0 " style="width: 100%">
                        <tbody>
                        <tr>
                        <td>Log Details :</td>

                                @php($text='New')

                                @foreach($table as $key => $v)
                                    <td style="width: 2%"><span class="badge badge-primary">{{$text}}</span></td><td>

                                    @foreach($v as $key2 =>$value )

                                        @if($key2!='created_at')

                                            <span class="badge badge-black" style="font-size: 14px;font-style: italic;color: grey">{{$key2}}</span> =><span class="badge badge-rose"style="color: #999999" >"{{$value}}"</span>

                                        @else
                                            @break;
                                        @endif
                                            <br>

                                    @endforeach
                                    @php($text='Old')
                                @endforeach

                            </td>
                        </tr>
                        <tr>
                            <td>Log entries : </td>
                            <td>
                                <span class="badge badge-primary">{{$log[0]->subject_type}}</span>
                            </td>

                            <td>Created at :</td>
                            <td>
                                <span class="badge badge-primary">{{$log[0]->created_at}}</span>
                            </td>
                            <td>Updated at :</td>
                            <td>
                                <span class="badge badge-primary">{{$log[0]->updated_at}}</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        </div>

@endsection
@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".download").click(function () {

            $.ajax({
                url:"/Activity_log",
                method:"POST",
                async:true,
                data:{id:('{!! $log[0]->id !!}'),

                    _token: '{!! csrf_token() !!}'},
                dataType:"text"
            });
        });
    </script>
    @endsection
