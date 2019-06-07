<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{route('welcome')}}"><img src="{{asset('assets/site/main/img/logo.png')}}" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"> </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">

                @guest()
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('all_lawyers')}}">Find Lawyers <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#login_modal">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}" id="sign_up" >Sign up</a>
                    </li>
                @else
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('all_lawyers')}}">Find Lawyers <span class="sr-only">(current)</span></a>
                    </li>
                    {{--<li class="nav-item active">--}}
                        {{--<a class="nav-link" href="{{route('ask')}}">Ask <span class="sr-only">(current)</span></a>--}}
                    {{--</li>--}}
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('lawyer.dashboard', \Auth::id())}}">Dashboard <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('logout')); ?>"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" id="sign_up" >Log Out</a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo e(csrf_field()); ?>

                        </form>
                    </li>


                @endguest

            </ul>
        </div>
    </nav>
</header>
{{--<div class="modal fade" id="login_modal" role="dialog">--}}
    {{--<div class="modal-dialog modal-sm">--}}
        {{--<div class="modal-content">--}}
            {{--<div class="modal-header">--}}
                {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
            {{--</div>--}}
            {{--<div class="modal-body">--}}
                {{--<div class="modal_main">--}}
                    {{--<div class="">--}}
                        {{--<img src="{{asset('assets/site/main/img/logo.png')}}" alt="">--}}
                    {{--</div>--}}
                    {{--<div class="empty_space">--}}
                    {{--</div>--}}
                    {{--<form method="POST" action="{{ route('login') }}">--}}
                        {{--@csrf--}}
                        {{--<div class="mod_inputs">--}}
                            {{--<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}
                            {{--@if ($errors->has('email'))--}}
                                 {{--<span class="invalid-feedback" role="alert">--}}
                                    {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                 {{--</span>--}}
                            {{--@endif--}}
                            {{--<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="current-password">--}}

                            {{--@if ($errors->has('password'))--}}
                                {{--<span class="invalid-feedback" role="alert">--}}
                                    {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                {{--</span>--}}
                            {{--@endif--}}
                        {{--</div>--}}

                        {{--<div class="mod_remember">--}}
                            {{--<input type="checkbox">--}}
                            {{--<p>Remember me?</p>--}}
                        {{--</div>--}}
                        {{--<div class="mod_login">--}}
                            {{--<button type="submit" >Login</button>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                        {{--<div class="mod_already forgot_pass">--}}
                            {{--<a href="#">Forgot Password?</a>--}}
                        {{--</div>--}}
                        {{--<div class="Don’t_have">--}}
                            {{--<a href="#">Don’t have an account yet?</a>--}}
                        {{--</div>--}}
                        {{--<div class="mod_but_sign">--}}
                            {{--<a href="{{route('register')}}">  <button type="button" name="button">Sign Up</button></a>--}}
                        {{--</div>--}}
                        {{--<div class="Privacy_Policy">--}}
                            {{--<a href="#">Privacy Policy</a>--}}
                        {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

@include('auth.login-modal')
