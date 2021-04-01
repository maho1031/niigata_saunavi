@extends('layouts.app')


@section('content')
<div class="c-container u-mt120">
    <div class="c-container__title">
        <h2 class="c-mainTitle">パスワード再発行</h2>
    </div>

    <form action="{{ route('password.update') }}" method="POST" class="p-form u-mb120">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <input type="email" name="email" id="email" class="p-form__input @error('email') is-error @enderror" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('Email') }}">
                @error('email')
                    <span class="p-form__errorMsg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input type="password" name="password" id="password" class="p-form__input @error('password') is-error @enderror" placeholder="{{ __('新しいパスワード') }}" required autocomplete="new-password">
                @error('password')
                    <span class="p-form__errorMsg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input type="password" name="password_confirmation" id="password-confirm" class="p-form__input @error('password') is-error @enderror" placeholder="{{ __('新しいパスワード（確認）') }}" required autocomplete="new-password">

                <button type="submit" class="p-form__submit">
                    {{ __('送信') }}
                </button>
                
            </form>
</div>

@endsection
