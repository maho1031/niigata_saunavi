@extends('layouts.app')
@section('title', 'Mypage')


@section('content')
<div class="c-container c-container__myPage u-mt120">
    <div class="p-mypage">
        <div class="p-mypage__header">
            <div class="p-mypage__imgIcon">
                @if($user->prof_pic)
                    <img src="{{asset('storage/uploads/' .$user->prof_pic)}}" alt="userIcon" class="p-mypage__img">
                      
                @else
                    <img src="{{asset('img/sample-img.jpg')}}" alt="sampleIcon" class="p-mypage__img">
                    @endif
            </div>
            <div class="p-mypage__container">
                <h1 class="p-mypage__userName">{{$user->name}}</h1>
                <a href="{{route('user.edit', ['user_id' => $user->id]) }}">プロフィール編集<i class="fas fa-pen p-mypage__fontIcon"></i></a>
            </div>
        </div>
        <div class="p-mypage__content u-mt30">
            <div class="p-mypage__inner">
                <div class="p-mypage__item">
                    <ul class="p-mypage__tabs">
                        <li class="p-mypage__tabBtn tabReview js-tab-trigger is-active" id="tab1">投稿したレビュー<i class="fas fa-edit p-mypage__fontIcon-tab"></i></li>
                        <li class="p-mypage__tabBtn tabSauna js-tab-trigger" id="tab2">登録した施設<i class="fas fa-hot-tub p-mypage__fontIcon-tab"></i></li>
                    </ul>

                    <div class="p-mypage__tabContents u-mb80">
                        <div class="p-mypage__tabContent js-tab-target is-show" id="tab1">
                        @foreach($user->user_reviews as $review)
                            <dl class="p-mypage__listLavel">
                                <dd>投稿日：</dd>
                                <dd>{{$review->created_at->format('Y-m-d')}}</dd>
                            </dl>
                            <dl style="" class="p-mypage__listLavel2">
                                <dd>施設：</dd>
                                <a href="/saunas/show/{{$review->review_sauna->id}}"><dd>{{$review->review_sauna->name}}</dd></a>
                            </dl>
                            @endforeach
                        </div>

                        <div class="p-mypage__tabContent js-tab-target" id="tab2">
                            @foreach($saunas as $sauna)
                            <!-- <div class="p-mypageContent"> -->
                            <dl  class="p-mypage__listLavel">
                                    <dd>投稿日：</dd>
                                    <dd>{{$sauna->created_at}}</dd>
                                </dl>
                                <dl class="p-mypage__listLavel2">
                                    <dd>施設：</dd>
                                    <a href=""><dd>{{$sauna->name}}</dd></a>

                                    
                                    <div class="p-mypage__link">
                                        <a href="{{route('sauna.edit', ['id' => $sauna->id]) }}">編集<i class="fas fa-pen p-mypage__fontIcon"></i></a>
                                    </div>
                                    <form method ="POST" action="{{route('sauna.destroy', ['sauna_id' => $sauna->id]) }}" class="p-mypage__delete" id="js-delete_{{$sauna->id}}">
                                            @csrf
                                        <a href="#" data-id="{{$sauna->id}}" onclick="deletePost(this);">削除</a>
                                    </form>
                                </dl>
                            <!-- </div> -->
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script>
    // 削除確認アラート
function deletePost(e){
  'use strict';
  if(confirm('本当に削除してよろしいですか？')){
    document.getElementById('js-delete_' + e.dataset.id).submit();
  }
}
</script> -->


@endsection