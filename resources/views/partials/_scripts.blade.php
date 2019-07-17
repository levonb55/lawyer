<script src="{{asset('assets/libs/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/libs/js/popper.min.js')}}"></script>
<script src="{{asset('assets/libs/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/libs/js/wow.min.js')}}"></script>
<script src="{{asset('assets/libs/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script type="text/javascript">
    @if (count($errors) > 0)
    $('#login_modal').modal('show');
    @endif
</script>
{{--<script src="{{asset('js/slider.js')}}"></script>--}}
@yield('scripts')