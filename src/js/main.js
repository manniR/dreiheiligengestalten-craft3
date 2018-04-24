import Vue from 'vue'
import VueRouter from 'vue-router'
import App from './App'
// import AutoResponsive from 'autoresponsive-vue'
import {VueMasonryPlugin} from 'vue-masonry';
import VModal from 'vue-js-modal'

// import VueMasonry from 'vue-masonry-css'
import VueAwesomeSwiper from 'vue-awesome-swiper'
// import VuePhotoSwipe from 'vue-photoswipe'
import 'swiper/dist/css/swiper.css'
import Portfolio from './portfolio'
import {routes} from './routes'
// Vue.use(VueMasonry);
Vue.use(VueRouter);
Vue.use(VueAwesomeSwiper);
Vue.use(VueMasonryPlugin);
Vue.use(VModal);
// Vue.use(AutoResponsive);

const isLivePreview  = window.document.documentElement.dataset.livePreview,
    actualPath     = window.document.documentElement.dataset.path;


let routerConfig = {
    mode: 'history',
    routes
}



if (isLivePreview) {
    routerConfig.mode = 'abstract';
}

let router = new VueRouter(routerConfig);

if (isLivePreview) {
    router.replace({ path: actualPath });
}


// let router = new VueRouter({
//     // mode: 'html5',
//     mode: 'history',
//     routes
// })

let app = new Vue({
  el: '#app',
  template: '<App />',
  components: { App },
  router
});
// let app = new Vue({
//     el: '#app',
//     components: {Portfolio},
//     router
// });


//require('./modules/vue-example.vue');
//require('jade!./jade/indexJ.jade');
//require('../index.jade')
//require('./modules/munge-email-address.js');
//var $ = require('jquery');

if (document.querySelector('.Masonry__grid')) {

    let Masonry = require('masonry-layout');
//var flowtype = require('./vendor/flowtype.js')

    // const msnry = new Masonry('.Masonry__grid', {
    //     // options
    //     itemSelector: '.Masonry__grid-item',
    //     columnWidth: '.grid-sizer',
    //     gutter: 0,
    //     //fitWidth: true
    // });
window.onload = function(){
    // if(msnry != undefined){
	 //    msnry.layout()
    // }
	console.log('... done ... :) ... wellcome to dreiheiligengestalten.at')
}
}

document.onreadystatechange = function(){
	//console.log(document.readyState)
    let state = document.readyState
    console.log(state)
    if ( state == 'complete' ){
		console.log('dom loaded ... now loading images ... ')
	}
}
// document.onreadystatechange = function () {
//   var state = document.readyState
//   if (state == 'interactive') {
//       init()
//   } else if (state == 'complete') {
//       initOnCompleteLoad()
//   }
// }​
// msnry.imagesLoaded(function(){
// 	msnry.layout();
// });
// var pel= $('.Logo'),
// 	el= $('.Logo h1'),
// 	el_w = $(el).width();
// 	el_span= $('.Logo h1 span'),
// 	h1_font_size = $(el).css('font-size'),
// 	span_font_size = $(el_span).css('font-size'),
// 	scale_factor=1;
// function set_logo_font_size(){
// 	scale_factor=$(pel).width()/el_w;
// 	h1_font_size = parseInt(h1_font_size)*scale_factor;
// 	$(el).css("font-size", h1_font_size);
// 	span_font_size = parseInt(span_font_size)*scale_factor;
// 	$(el_span).css("font-size", span_font_size);
// 	el_w=$(el).width();
// 	console.log(h1_font_size);
// }

// $(window).resize(set_logo_font_size);
// $('.Logo h1').each(function() {
//       // Context for resize callback
//          var that = this;
//       // Make changes upon resize
//          $(window).resize(function(){flowtype.changes(that);});
//       // Set changes on load
//          flowtype.changes(this);

//       });


// $('.Logo h1').flowtype({
// 	minimum : 500,
//    	maximum : 1200,
//    	maxFont : 88,
// 	minFont : 66,
//    	fontRatio : 50
// });

// flowtype(documet.body, {
// 	maxWidth:'960px',
// 	minWidth:'300px',
// 	lineRatio:1,
// 	min:22,
// 	max:74
// });