@extends('layouts.app')
@section('title', 'Top')

@section('hero')
<section class="p-hero">
    <div class="p-hero__content">
        
            <div class="p-hero__imgContainer">
                <div class="cover">
                    <div class="p-hero__title">
                        そうだ、<br>
                        サウナに行ってみよう。
                    </div>
                    <img src="{{asset('img/sauna_img.jpg')}}" alt="TOP画像" class="p-hero__img">
                </div>

                
            </div>
             <div class="p-hero__description u-mt30 u-mb30">
                    <p>にいがたサウナビは、新潟県内のサウナの情報や口コミをゆるく紹介するサイトです。<br>
                    今サウナにハマっている人も、そうでない人も、新潟のステキなサウナに行ってみませんか？
                    </p>
            </div>
    </div>
</section>
@endsection

@section('content')
<div class="l-page">
    <div class="c-listContainer">
        <div class="p-searchBox u-mt30">
            <form action="{{route('sauna.index')}}" method="GET" class="p-form__searchBox">
                @csrf
                <div class="p-sort">            
                    <div class="p-sort__inner">
                        <label for="" class="p-sort__label">地域：</label>
                            <select name="city_id" class="p-sort__select">
                                <option value="">指定なし</option>
                                @foreach($cities as $city)
                                <option value="{{$city->id}}" @if($city_id == $city->id) selected @endif>{{$city->name}}</option>
                                @endforeach
                                <!-- <option value="1">新潟市</option>
                                <option value="2">長岡市</option> -->
                            </select>
                    </div>
                </div>

                <div class="p-check">
                    @foreach($tagList as $tag)
                    <input type="checkbox" name="tag_id[]" value="{{$tag->id}}" @if(!empty($tag_ids)&&in_array($tag->id, $tag_ids)) checked @endif><label for="" class="p-sort__label">{{$tag->name}}</label><br>
                    @endforeach
                    <!-- <input type="checkbox" name="tag_id[]" value="1"><label for="" class="p-sort__label">水風呂あり</label>
                    <input type="checkbox" name="tag_id[]" value="2"><label class="p-sort__label">食事スペースあり</label><br>
                    <input type="checkbox" name="tag_id[]" value="3"><label class="p-sort__label">休憩スペースあり</label>
                    <input type="checkbox" name="tag_id[]" value="4"><label class="p-sort__label">女性におすすめ</label>
                    <input type="checkbox" name="tag_id[]" value="5"><label class="p-sort__label">外気浴できます</label>
                    <input type="checkbox" name="tag_id[]" value="6"><label class="p-sort__label">露天風呂あり</label> -->
                </div>

                <div class="p-sort  u-mb16">
                    <div class="p-sort__inner">
                        <label for="" class="p-sort__label">並び替え：</label>
                            <select name="sort_id" class="p-sort__select">
                                <option value="">指定なし</option>
                                <option value="1" @if($sort_id) selected @endif>レビューの多い順</option>
                            </select>
                    </div>
                </div>

                <div class="c-btn__search">
                    <button type="submit" class="p-form__submit">
                    検索する
                    </button>
                </div>
            </form>
        </div>
        

        <div class="c-container__list u-mt30">
            <div class="c-container__title u-mt8 u-mb30">
                <span>新着サウナ</span>
            </div>
            <div class="p-list">
                @foreach($saunas as $sauna)
                <div class="p-listItem u-mb16">
                    <a href="{{route('sauna.show', ['sauna_id' => $sauna->id]) }}">
                    <div class="p-listItem__header">
                        <div class="p-listItem__name">
                                <h3>{{$sauna->name}}</h3>
                        </div>
                        <div class="p-listItem__address">
                            <p>{{$sauna->city_name}}{{$sauna->address}}</p>
                        </div>
                        <div class="p-listItem__img">
                            <img src="{{asset('storage/uploads/'.$sauna->pic1)}}" alt="">
                        </div>
                    </div>
                    </a>
                    <div class="p-listItem__info">
                        <div class="p-listItem__meta">
                            <ul class="p-listItem__items">
                                <li class="p-listItem__item">
                                    営業時間：{{substr($sauna->start_time, 0,5)}}〜{{substr($sauna->end_time,0,5) }}
                                </li>
                                <li class="p-listItem__item">
                                    定休日：{{$sauna->holiday_name}}
                                </li>
                                <li class="p-listItem__item">
                                    @foreach($sauna->tags as $tag)
                                    <span class="p-listItem__tag">{{$tag->name}}</span>
                                    @endforeach
                                </li>
                                <li class="p-listItem__item u-mb16">
                                    レビュー({{$sauna->reviews->count()}}件)
                                </li>
                            </ul>
                        </div>

                       
                </div>
            
            </div>
            @endforeach
        </div>

                <div class="c-btn__search u-mb60">
                    <button type="submit" class="p-form__submit">
                        <a href="{{route('sauna.index')}}">一覧を見る</a>
                    </button>
                </div>
        
    </div>
</div>
@endsection