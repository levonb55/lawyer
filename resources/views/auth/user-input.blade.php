
    <input type="text" name="first_name" value="{{ old('first_name') }}"
        placeholder="First Name" required>
    @error('first_name')
        <span class="input-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <input type="text" name="last_name" value="{{ old('last_name') }}"
       placeholder="Last Name" required>
    @error('last_name')
        <span class="input-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <input type="email" name="email" value="{{ old('email') }}"
       placeholder="E-mail address" required>
    @error('email')
        <span class="input-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <input type="password" name="password" placeholder="Password" required>
    @error('password')
        <span class="input-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>