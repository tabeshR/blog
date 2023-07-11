@extends('auth.layouts')
@section('content')
    <div class="wrapper">
        <div class="logo">
            <img src="https://www.freepnglogos.com/uploads/twitter-logo-png/twitter-bird-symbols-png-logo-0.png" alt="">
        </div>
        <form method="POST" action="{{ route('login') }}" class="p-3 mt-3" style="margin-top: 30px">
            @csrf
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="email" required placeholder="{{ __('Email') }}"
                       class="@error('email') is-invalid @enderror">
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="{{ __('Password') }}"
                       class="@error('password') is-invalid @enderror" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <button type="submit" class="btn mt-3">{{ __('Login') }}</button>
        </form>
        <div class="text-center fs-6">
            <a href="#">{{ __('Forget password') }}</a>
        </div>
    </div>
@endsection



