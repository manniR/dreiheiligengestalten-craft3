<template>
        <div>
                <div class="w-16 h-16 absolute pin-r pin-t m-4 cursor-pointer">
                        <svg viewBox="294 399 41 41" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Group" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" transform="translate(295.000000, 400.000000)" stroke-linecap="square"><path d="M0.5,38.5 L38.9512672,0.0487321615" id="Line" stroke="#979797"></path><path d="M0.5,38.5 L38.9512672,0.0487321615" id="Line" stroke="#979797" transform="translate(19.500000, 19.500000) scale(1, -1) translate(-19.500000, -19.500000) "></path></g></svg>
                </div>
        <swiper :options="swiperOption">

                <slot></slot>

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
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    }
                }
            }
        }
    }
</script>