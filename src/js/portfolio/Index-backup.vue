<template>
        <div>
                <div class="w-16 h-16 absolute pin-r pin-t m-4 cursor-pointer z-50" @click="close">
                        <svg viewBox="294 399 41 41" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Group" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" transform="translate(295.000000, 400.000000)" stroke-linecap="square"><path d="M0.5,38.5 L38.9512672,0.0487321615" id="Line" stroke="#979797"></path><path d="M0.5,38.5 L38.9512672,0.0487321615" id="Line" stroke="#979797" transform="translate(19.500000, 19.500000) scale(1, -1) translate(-19.500000, -19.500000) "></path></g></svg>
                </div>
        <swiper :options="swiperOption" class="h-screen">
                <slot name="swiperSlides"></slot>
                <div class="swiper-button-prev" slot="button-prev"></div>
                <div class="swiper-button-next" slot="button-next"></div>
        </swiper>

        </div>
</template>

<script>
    export default {
        data() {
            return {
                swiperOption: {
                    zoom: true,
                    pagination:false,
                    keyboard: true,
//                    direction: 'vertical',
                    slidesPerView: 1,
                    spaceBetween: 30,
                    mousewheel: true,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    }
                }
            }
        },
        methods: {
            close(){

                return console.log(['dreiheiligengestalten.at', 'craft-dhg.test', 'craft.dreiheiligengestalten.at', 'localhost'].includes(window.location.host))
                if (window.location.host.includes(['dreiheiligengestalten.at', 'craft-dhg.test', 'craft.dreiheiligengestalten.at', 'localhost'])){
                        window.history.go(-1)
                        return false
                } else {
                    window.location.href = 'https://dreiheiligengestalten.at'
                }
            }
        }
    }
</script>

<style lang="scss">
        html,body {
                position: relative;
                height: 100%;
        }

        .swiper-box {
                width: 100%;
                height: 100%;
                margin: 0 auto;
        }

        .swiper-item {
                height: 100%;
                text-align: center;
                font-size: 18px ;
                background: #fff;
                /* Center slide text vertically */
                display: -webkit-box;
                display: -ms-flexbox;
                display: -webkit-flex;
                display: flex;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                -webkit-justify-content: center;
                justify-content: center;
                -webkit-box-align: center;
                -ms-flex-align: center;
                -webkit-align-items: center;
                align-items: center;
        }


</style>