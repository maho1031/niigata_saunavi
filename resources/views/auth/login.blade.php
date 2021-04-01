@extends('layouts.app')
@section('title', 'login')


@section('content')
<div class="c-container u-mt150">
        <div class="c-container__title">
            <h2 class="c-mainTitle">ログイン</h2>
        </div>
            <form action="{{ route('login') }}" method="post" class="p-form u-mb120">
                @csrf

                <input type="email" name="email" class="p-form__input @error('email') is-error @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="メールアドレス">
                @error('email')
                    <span class="p-form__errorMsg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input type="password" name="password" class="p-form__input @error('password') is-error @enderror" placeholder="パスワード" required autocomplete="current-password">
                @error('password')
                    <span class="p-form__errorMsg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <button type="submit" class="p-form__submit">
                    {{ __('ログイン') }}
                </button>
            
                @if (Route::has('password.request'))
                    <p class="p-form__txt">パスワードを忘れた方は<a class="p-form__txt-link" href="{{ route('password.request') }}">こちら</a></p>
                @endif
            </form>
  
</div>
@endsection
