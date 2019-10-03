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
        let appUrl = "";

        if(window.location.hostname !== 'lawyer.loc') {
            appUrl = 'http://myworks.site/dev/lawyer/public';
        }
    </script>

    @include('partials._scripts')

</body>
</html>
