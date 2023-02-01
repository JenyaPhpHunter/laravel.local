<html>
<head>
        <title>{{env('APP_NAME')}}</title>
</head>
<body>
@include('partials.header',[
//    'hello' => $hello
])

<div class="container">
    {{--Content--}}
    @yield('content')
</div>

</body>
</html>
