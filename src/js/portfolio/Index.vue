<template>
        <swiper :options="swiperOption">
                <slot></slot>

                <div class="swiper-button-prev" slot="button-prev"></div>
                <div class="swiper-button-next" slot="button-next"></div>
        </swiper>
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