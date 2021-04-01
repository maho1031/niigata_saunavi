import $ from 'jquery';

// 画像ライブプレビュー
var $dropArea = $('.js-pic');
var $fileInput = $('.js-input-file');

$fileInput.on('change', function(e){
  var file = this.files[0],            // 2. files配列にファイルが入っています
      $img = $(this).siblings('.js-prev'), // 3. jQueryのsiblingsメソッドで兄弟のimgを取得
      fileReader = new FileReader();   // 4. ファイルを読み込むFileReaderオブジェクト

  // 5. 読み込みが完了した際のイベントハンドラ。imgのsrcにデータをセット
  fileReader.onload = function(event) {
  // 読み込んだデータをimgに設定
  $img.attr('src', event.target.result).show();
  };

  // 6. 画像読み込み
  fileReader.readAsDataURL(file);
});

// フラッシュメッセージ
$(function(){
  $('.js-flash').fadeOut(3000);
});


 // ヘッダー
 var $window = $(window),
 $header = $('.l-header'),
 headerBottom;

$window.on('scroll', function () {
 headerBottom = $header.height();
 if ($window.scrollTop() > headerBottom) {
   $header.addClass('is-triggered');
 }
 else {
   $header.removeClass('is-triggered');
 }
});
$window.trigger('scroll');



// ハンバーガーメニュー 
$('.js-menuTarget').on('click', function () {
    
 if($(this).hasClass('is-active')){
   $(this).removeClass('is-active');
   $('.js-open-menu').removeClass('is-open');

 }else{
   $(this).addClass('is-active');
   $('.js-open-menu').addClass('is-open');
 }
});

// $('.p-globalNav__link').on('click', function (){
//     $('.js-open-menu').removeClass('is-open');
// })

const tabs = document.querySelectorAll('.js-tab-trigger');
const contents = document.querySelectorAll('.js-tab-target');
console.log(tabs[0]);
console.log(contents[0]);

for(let i = 0; i < tabs.length; i++){

    tabs[i].addEventListener("click", function(e){
        e.preventDefault();

        for(let j = 0; j < tabs.length; j++){
            tabs[j].classList.remove('is-active');
            contents[j].classList.remove('is-show');
        }

        //this:tabs[i]
        this.classList.add("is-active");
        contents[i].classList.add("is-show");

});

}

// 削除確認アラート
window.deletePost = function deletePost(e){
  'use strict';
  if(confirm('本当に削除してよろしいですか？')){
    document.getElementById('js-delete_' + e.dataset.id).submit();
  }
}

// //フッターを最下部に固定
var $ftr = $('.p-footer');
if( window.innerHeight > $ftr.offset().top + $ftr.outerHeight()){
 $ftr.attr({'style': 'position:fixed; top:' + (window.innerHeight - $ftr.outerHeight()) + 'px;'});
}

// ローディング
var h = $(window).height();

$(window).on('load',function () {
  $('#is-loading').delay(900).fadeOut(800);
  $('#loading').delay(600).fadeOut(300);
});

$(function () {
  setTimeout(stopload, 10000);
});

function stopload() {
  $('#is-loading').delay(900).fadeOut(800);
  $('#loading').delay(600).fadeOut(300);
}
