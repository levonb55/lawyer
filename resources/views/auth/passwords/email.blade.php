@extends('main')

@section('content')
    <section  class="login_reg password-reset">
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

            <form method="POST" action="{{ route('password.email') }}" class="register">
                @csrf

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                       placeholder="E-mail address" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            <button type="submit" class="login_reg_log_btn">
                {{ __('Send Password Reset Link') }}
            </button>

            </form>
        </div>
    </section>
@endsection

