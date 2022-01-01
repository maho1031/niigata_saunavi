@extends('layouts.app')



@section('content')
<div class="l-page">
    <div class="c-container u-mt150">

        <div class="c-container__title u-mb60">
            <p>退会申請</p>
        </div>
        <div class="c-container__description u-mb60">
            退会後は、データを復旧させることができません。<br>
            本当に退会しますか？
        </div>

        <form action="{{ route('user.destroy')}}" method="POST" class="p-form u-mb120">
                    @csrf
                    
                    <button type="submit" class="p-form__submit">
                        {{ __('退会する') }}
                    </button>
                    
        </form>
    </div>
</div>
@endsection