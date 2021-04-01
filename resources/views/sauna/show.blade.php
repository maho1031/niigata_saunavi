@extends('layouts.app')


@section('content')

<div class="l-page">
    <div class="c-detailContainer u-mt150">
        <div class="p-list u-mb60">
            <div class="p-listItem u-mb16">
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
                                    料金(大人1名)：{{$sauna->price}}円〜
                                </li>
                                <li class="p-listItem__item">
                                    HP：<a href="{{$sauna->url}}">{{$sauna->url}}</a>
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

            <div class="p-review">
                <div class="p-review__list">
                @foreach($sauna->reviews as $review)
                    <div class="p-review__listItem u-mb16">
                        <div class="p-review__userIcon">
                            <img src="{{ asset('storage/uploads/' . $review->review_user->prof_pic) }}" alt="">
                        </div>
                        <div class="p-review__msg">
                            <p>{{$review->review_user->name}}</p>
                            <p>{{$review->comment}}</p>
                        </div>
                   </div>
                   @endforeach
                </div>

                <div class="p-review__bord">
                    <form action="{{route('sauna.review')}}" method="POST">
                    @csrf
                        <input type="hidden" name="id" value="{{$sauna->id}}">
                        <textarea name="comment" id="" cols="30" rows="5" class="p-review__write"></textarea>
                        <button type="submit" class="p-form__submit">
                        レビューを投稿する
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection