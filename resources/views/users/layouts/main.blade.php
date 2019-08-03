<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title','Reach Legal')</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css"
          integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/libs/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/libs/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/libs/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/libs/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/media.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashboard_message.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashboard_calendar.css')}}">
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">

</head>
<body>

    <div class="dashboard_page-container">

        @include('users.layouts._sidebar')

        <main class="main-content">
            @section('content')
                @yield('content')
            @show
        </main>

    </div>

<script src="{{asset('assets/libs/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/libs/js/popper.min.js')}}"></script>
<script src="{{asset('assets/libs/js/bootstrap.min.js')}}"></script>
{{--<script src="{{asset('assets/libs/js/wow.min.js')}}"></script>--}}
{{--<script src="{{asset('assets/libs/js/owl.carousel.min.js')}}"></script>--}}
{{--<script src="{{asset('js/main.js')}}"></script>--}}
{{--<script src="{{asset('js/dashboard.js')}}"></script>--}}

{{--<script src="{{asset('assets/site/main/node_modules/@fullcalendar/core/main.js')}}"></script>--}}
{{--<script src="{{asset('assets/site/main/node_modules/@fullcalendar/daygrid/main.js')}}"></script>--}}
@yield('extra-scripts')
</body>
</html>
