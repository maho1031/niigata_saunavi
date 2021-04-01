@extends('layouts.app')

@section('content')
<div class="c-container u-mt150">
        <div class="c-container__title">
            <h2 class="c-mainTitle">パスワード再発行</h2>
        </div>
            @if (session('status'))
                <span class="p-form__errorMsg" role="alert">
                    {{ session('status') }}
                </span>
            @endif
            <form action="{{ route('password.email') }}" method="POST" class="p-form u-mb120">
                @csrf

                <input type="email" name="email" class="p-form__input @error('email') is-error @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="メールアドレス">
                @error('email')
                    <span class="p-form__errorMsg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

               

                <button type="submit" class="p-form__submit">
                    {{ __('再発行リンクを送る') }}
                </button>
            
            </form>
  
</div>
@endsection


