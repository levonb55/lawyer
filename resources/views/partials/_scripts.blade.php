<script>
    let appUrl = "";

    if(window.location.hostname !== 'lawyer.loc') {
        appUrl = 'http://myworks.site/dev/lawyer/public';
    }
</script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('assets/libs/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/libs/js/popper.min.js')}}"></script>
<script src="{{asset('assets/libs/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/libs/js/wow.min.js')}}"></script>
<script src="{{asset('assets/libs/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
{{--<script src="{{asset('js/slider.js')}}"></script>--}}
@yield('extra-scripts')