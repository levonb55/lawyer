<!-- modal -->
<div class="modal fade" id="login_modal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">


                <div class="modal_main">
                    <div class="">
                        <img src="{{asset('assets/site/main/img/logo.png')}}" alt="Logo">
                    </div>
                    <div class="empty_space">

                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mod_inputs">
                            <input type="email" name="email" value="{{ old('email') }}"
                                placeholder="E-mail address" required autocomplete="email">
                            @error('email')
                                <span>
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input type="password" name="password" placeholder="Password" required>
                            @error('password')
                                <span>
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="mod_remember">
                            <input type="checkbox" name="password" value="">
                            <p>Remember me?</p>
                        </div>
                        <div class="mod_but_sign">
                            <button type="submit">Sign Up</button>
                        </div>
                    </form>
                    <div class="mod_already forgot_pass">
                        <a href="#">Forgot Password?</a>
                    </div>
                    <div class="Don’t_have">
                        <a href="#">Don’t have an account yet?</a>
                    </div>
                    <div class="mod_login">
                        <button type="button" name="button">Login</button>
                    </div>
                    <div class="Privacy_Policy">
                        <a href="{{route('privacy')}}">Privacy Policy</a>
                    </div>
                </div>




            </div>

        </div>
    </div>
</div>

<!-- end -->