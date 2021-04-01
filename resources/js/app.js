/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

// import $ from 'jquery';

//  // MENU FIXED SP
//  var $window = $(window),
//  $header = $('.l-header'),
//  headerBottom;

// $window.on('scroll', function () {
//  headerBottom = $header.height();
//  if ($window.scrollTop() > headerBottom) {
//    $header.addClass('is-triggered');
//  }
//  else {
//    $header.removeClass('is-triggered');
//  }
// });
// $window.trigger('scroll');


// /* header */
// $('.js-menuTarget').on('click', function () {
//  if($(this).hasClass('is-active')){
//    $(this).removeClass('is-active');
//    $('.p-globalNav').fadeOut();
//  }else{
//    $(this).addClass('is-active');
//    $('.p-globalNav').fadeIn();
//  }
// });

// //フッターを最下部に固定
// var $ftr = $('.js-footer');
// if( window.innerHeight > $ftr.offset().top + $ftr.outerHeight()){
//  $ftr.attr({'style': 'position:fixed; top:' + (window.innerHeight - $ftr.outerHeight()) + 'px;'});
// }
