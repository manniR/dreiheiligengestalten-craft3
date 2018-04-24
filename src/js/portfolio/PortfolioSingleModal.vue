<template>
<modal name="fs" :adaptive="true" width="100%" height="100%" @closed="$router.go(-1)">
        <h1>MODAL</h1>

</modal>



</template>

<script>
    import axios from 'axios'

    export default {
        name: 'portfolioSingleModal',
        data() {
            return {
                swiperOption: {
                    zoom: true,
                    pagination: false,
                    keyboard: true,
//                    direction: 'vertical',
                    slidesPerView: 1,
                    spaceBetween: 30,
                    mousewheel: true,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    }
                },
                portfolios: []

            }
        },
        methods: {
            close() {
                this.$modal.hide()

                return console.log(['dreiheiligengestalten.at', 'craft-dhg.test', 'craft.dreiheiligengestalten.at', 'localhost'].includes(window.location.host))
                if (window.location.host.includes(['dreiheiligengestalten.at', 'craft-dhg.test', 'craft.dreiheiligengestalten.at', 'localhost'])) {
                    window.history.go(-1)
                    return false
                } else {
                    window.location.href = 'https://dreiheiligengestalten.at'
                }
            }
        },
        mounted() {
            this.$modal.show()
            axios.get('`api/portfolios/$route.params.slug`').then(({data: {data: portfolio}}) => console.log(portfolio))
        }
    }
</script>

<style lang="scss">
    html, body {
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
        font-size: 18px;
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