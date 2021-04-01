@extends('layouts.app')

@section('content')
<div class="l-page">
    <div class="c-container u-mt120">
        <div class="c-container__title">
            <h2 class="c-mainTitle">サウナ施設情報更新</h2>
        </div>

        <form action="{{route('sauna.update', ['sauna_id' => $sauna->id]) }}" method="POST" class="p-form u-mb120 u-mt60" enctype="multipart/form-data">
            @csrf


            <label for="" class="p-form__inputLavel">施設名</label>
                <input type="text" name="name" class="p-form__input @error('name') is-error @enderror" value="{{$sauna->name}}" required autocomplete="name" autofocus placeholder="例：ふるさとの湯">
                @error('name')
                    <span class="p-form__errorMsg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror


            <label for="" class="p-form__inputLavel">地域</label>
                <select name="city_id" class="p-form__input @error('city_id') is-error @enderror" required autocomplete="city_id" autofocus placeholder="">
                    <option value="0">指定なし</option>
                    @foreach($cities as $city)
                    <option value="{{$city->id}}"
                        @if($sauna->city_id == $city->id) selected @endif>{{$city->name}}</option>
                    @endforeach
                </select>
                @error('city_id')
                    <span class="p-form__errorMsg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                

            <label for="" class="p-form__inputLavel">住所</label>
                <input type="text" name="address" class="p-form__input @error('address') is-error @enderror" value="{{$sauna->address}}" required autocomplete="address" autofocus placeholder="例：川崎町1-4">
                @error('address')
                    <span class="p-form__errorMsg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror


            <label for="" class="p-form__inputLavel">定休日</label>
                <select name="holiday_id" class="p-form__input @error('holiday_id') is-error @enderror"required autocomplete="" autofocus placeholder="">
                    
                    @foreach($holidays as $holiday)
                    <option value="{{$holiday->id}}"
                        @if($sauna->holiday_id == $holiday->id) selected @endif>
                        {{$holiday->name}}</option>
                    @endforeach
                </select>
                @error('holiday_id')
                    <span class="p-form__errorMsg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            <label for="" class="p-form__inputLavel">営業開始時間</label>
                <input type="time" name="start_time" class="p-form__input @error('start_time') is-error @enderror" value="{{$sauna->start_time}}" required autocomplete="start_time" autofocus placeholder="">
                @error('start_time')
                    <span class="p-form__errorMsg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            <label for="" class="p-form__inputLavel">営業終了時間</label>
                <input type="time" name="end_time" class="p-form__input @error('end_time') is-error @enderror" value="{{$sauna->end_time}}" required autocomplete="end_time" autofocus placeholder="">
                @error('end_time')
                    <span class="p-form__errorMsg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            <label for="" class="p-form__inputLavel">料金(大人1名)</label>
                <input type="number" name="price" class="p-form__input @error('price') is-error @enderror" value="{{$sauna->price}}" required autocomplete="price" autofocus placeholder="例600">
                @error('price')
                    <span class="p-form__errorMsg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            <label for="" class="p-form__inputLavel">URL</label>
                <input type="text" name="url" class="p-form__input @error('url') is-error @enderror" value="{{$sauna->url}}" required autocomplete="url" autofocus placeholder="http://niigata_saunavi.com">
                @error('url')
                    <span class="p-form__errorMsg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            <label for="" class="p-form__inputLavel">オプション</label>
                <p class="p-form_inputOption">(当てはまるものにチェックを入れて下さい。)</p>
            
                <div class="p-check u-mt16 u-mb16">
                    @foreach($tagList as $tag)
                    <input type="checkbox" name="tags[]" class="@error('tags[]') is-error @enderror" value="{{$tag->id}}" @if(in_array($tag->id, $tags)) checked @endif>
                    <label for="" class="p-sort__label">{{$tag->name}}</label><br>
                    @endforeach
                </div>

                @error('tag')
                    <span class="p-form__errorMsg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            
            
            
            <label for="" class="p-form__inputLavel">写真</label>
            <div class="p-form__userImgContainer u-mt16">
                <label class="p-form__SaunaAreaDrop js-pic">
                    <input type="hidden" name="MAX_FILE_SIZE" value="3145728">
                    <input type="file" class="p-form__userIcon js-input-file" name="pic1" value="{{ old('pic1', $sauna->pic1) }}" accept="image/jpeg,image/gif,image/png" />

                    @if($sauna->pic1)
                        <img src="{{asset('storage/uploads/' .$sauna->pic1)}}" alt="userIcon" class="js-prev">
                      
                        @else
                        <img src="{{asset('img/sample-img.jpg')}}" alt="sampleIcon" class="js-prev">
                        @endif
                </label>
            </div>
            @error('pic1')
                    <span class="p-form__errorMsg" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror


            <button type="submit" class="p-form__submit">
                    {{ __('Update') }}
                </button>

            <p class="p-form__txt"><a class="p-form__txt-link" href="">マイページへ戻る</a></p>
        </form>
    </div>
</div>
@endsection


