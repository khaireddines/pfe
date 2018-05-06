<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/material-dashboard.min790f.css?v=2.0.1')}}">
    @yield('custemImp')
</head>
<body>
@yield('content')

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap-material-design.min.js')}}"></script>
<script src="{{asset('js/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset("js/material-dashboard790f.js")}}"></script>
<script src="{{asset('js/jquery.datatables.js')}}"></script>
@yield('custemScript')
</body>
</html>