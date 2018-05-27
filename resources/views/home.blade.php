@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        {{--//session()->has('type')--}}
                    @if(Auth::user()->role_id=='prof')

                                <a href="/Fich_voeux"><button class="btn btn-primary" >Ficher de Voeux</button></a>

                    @endif
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
