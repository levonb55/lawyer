@extends('main')

@section('content')

    <section  class="login_reg password-reset-area">
        <div class="login_reg_top">
            <p>Reset Password</p>
            <div class="login_reg_line"></div>
        </div>

        <div class="login_reg_main">
            @if (session('status'))
                <div class="success-message mb-3">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <input type="email" name="email" value="{{ $email ?? old('email') }}"
                       class="form-control @error('email') is-invalid @enderror"  placeholder="E-Mail Address"
                       required autocomplete="email" autofocus>

                @error('email')
                <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input type="password" name="password" required autocomplete="new-password" placeholder="Password"
                       class="form-control @error('password') is-invalid @enderror">

                @error('password')
                <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input id="password-confirm" type="password" name="password_confirmation" class="form-control"
                       placeholder="Confirm Password" required autocomplete="new-password">

                <button type="submit" class="login_reg_log_btn">
                    {{ __('Reset Password') }}
                </button>
            </form>
        </div>

    </section>
@endsection