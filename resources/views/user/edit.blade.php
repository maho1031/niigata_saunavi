@extends('layouts.app')
@section('title', 'Mypage')


@section('content')
<div class="c-container u-mt120">
        <form action="{{ route('user.update', ['user_id' => $user->id ]) }}" method="post" class="p-form u-mb120" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$user->id}}">


                <div class="p-form__userImgContainer">
                    <label class="p-form__userAreaDrop js-pic">
                        <input type="hidden" name="MAX_FILE_SIZE" value="3145728">
                        <input type="file" class="p-form__userIcon js-input-file" name="prof_pic" value="{{ old('prof_pic', $user->prof_pic) }}" accept="image/jpeg,image/gif,image/png" />

                        @if($user->prof_pic)
                        <img src="{{asset('storage/uploads/' .$user->prof_pic)}}" alt="userIcon" class="js-prev">
                      
                        @else
                        <img src="{{asset('img/sample-img.jpg')}}" alt="sampleIcon" class="js-prev">
                        @endif

                </label>
                </div>
                @error('prof_pic')
                    <span class="p-form__errorMsg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror


                <label for="" class="p-form__inputLavel">名前</label>
                <input type="text" name="name" class="p-form__input @error('name') is-error @enderror" value="{{ old('name',$user->name) }}" required autocomplete="name" autofocus placeholder="{{ __('Username') }}">
                @error('name')
                    <span class="p-form__errorMsg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label for="" class="p-form__inputLavel">メールアドレス</label>
                <input type="email" name="email" class="p-form__input @error('email') is-error @enderror" value="{{ old('email',$user->email )}}" required autocomplete="email" autofocus placeholder="{{ __('Email') }}">
                @error('email')
                    <span class="p-form__errorMsg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror


                <button type="submit" class="p-form__submit">
                    {{ __('Update') }}
                </button>

                <p class="p-form__txt"><a class="p-form__txt-link" href="{{ route('user.show', ['id' => $user->id ]) }}">マイページへ戻る</a></p>
        </form>

    
</div>


@endsection