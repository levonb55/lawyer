<!DOCTYPE html>
<html lang="en">
<head>

    @include('partials._head')

</head>
<body>

    @include('partials._header')

    @section('content')
        @yield('content')
    @show

    @include('partials._footer')

    @include('partials._newmessage-popup')

    <script>
        let authUser = @json(auth()->id());
        let appUrl = @json(config('app.url'));
    </script>

    @include('partials._scripts')

</body>
</html>
