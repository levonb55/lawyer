@extends('main')

@section('title', 'Reach Legal - Register')

@section('content')

    @include('auth.user-apply')

    <section  class="login_reg">
        <div class="login_reg_top">
            <p id="user-registration">User Registration</p>
            <div class="login_reg_line"></div>
        </div>
        <div class="login_reg_main">
            <form method="POST" action="{{ route('register') }}" class="register">
                @csrf
                @include('auth.user-input')
                <input type="hidden" name="role_id" value="2">
                <button type="submit" class="login_reg_sign_up">Sign Up</button>
            </form>

            <p class="login_reg_already">Already have an account?</p>
            <button type="button" name="button" class="login_reg_log_btn" data-toggle="modal"
                    data-target="#login_modal">
                Login
            </button>

            <a href="{{route('privacy')}}" class="login_reg_privacy">Privacy Policy</a>
        </div>
    </section>

    <section class="lawyers_7">
        <div class="opacity_bg">
            <div class="lawyers_7_size">

            </div>
        </div>
    </section>
@endsection
