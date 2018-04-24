<template>
    <div>
        <div class="w-12 h-12 absolute pin-r pin-t m-4 cursor-pointer z-50" @click="close">
            <svg viewBox="294 399 41 41" version="1.1" xmlns="http://www.w3.org/2000/svg" ><g id="Group" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" transform="translate(295.000000, 400.000000)" stroke-linecap="square"> <path d="M0.5,38.5 L38.9512672,0.0487321615" id="Line" stroke="#979797"></path> <path d="M0.5,38.5 L38.9512672,0.0487321615" id="Line" stroke="#979797" transform="translate(19.500000, 19.500000) scale(1, -1) translate(-19.500000, -19.500000) "></path> </g>
            </svg>
        </div>
        <swiper :options="swiperOption" class="h-screen">
            <!--<slot name="swiperSlides"></slot>-->
            <div v-if="portfolio.showIntroSlide" class="swiper-slide flex justify-center items-center">
                <div>
                    <div class="Project__details">
                    <h1 class="text-3xl Project__title" v-text="portfolio.title"></h1>
                        <p class="Project__creators">
                                <span v-for="creator, index in portfolio.creators">
                                    <a :href="creator.websiteUrl" v-text="creator.name"></a>
                                    <span v-if="index+1 < portfolio.creators.length">, </span>
                                </span>
                        </p>
                        <div class="Project__description">
                            <span v-if="portfolio.description" v-html="portfolio.description"></span>
                            <p class="mt-4">
                                        <span class="mr-2" v-for="category, index, count in portfolio.categories" >
                                           {{ category }} {{ index+1 < portfolio.categories.length ? ' ,' : ''}}
                                        </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="portfolio.images" v-for="image, index in portfolio.images"
                 class="swiper-slide flex justify-center items-center">
                <div class="w-full h-full bg-contain bg-no-repeat bg-center"
                     :style="`background-image: url(${image.src})`"></div>
            </div>
            <div v-if="portfolio.video" class="swiper-slide flex justify-center items-center">
                <div class="w-full h-full">
                    <iframe class="w-full h-full" :src="portfolio.video" frameborder="0"></iframe>
                </div>
            </div>
            <div v-show="showNav" class="swiper-button-prev swiper-button-black" slot="button-prev"></div>
            <div v-show="showNav" class="swiper-button-next swiper-button-black" slot="button-next"></div>
        </swiper>

    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        data() {
            return {
                swiperOption: {
                    zoom: true,
                    pagination: false,
                    keyboard: true,
//                    direction: 'vertical',
                    slidesPerView: 1,
                    spaceBetween: 30,
//                    mousewheel: true,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    }
                },
                portfolio: [],
                showNav: false,

            }
        },
        methods: {

            fetchData() {
                axios.get(`/api/portfolio/${this.$route.params.slug}`).then(({data: portfolio}) => {
                    this.portfolio = portfolio
                    console.log(portfolio.images.length)
                    let count = portfolio.images ? portfolio.images.length : 0
                    console.log(portfolio.video)
                    count += portfolio.video ? 1 : 0
                    console.log(count)
                    this.showNav =  count > 1
                })
            },
            close() {

                 this.$router.push('/')
                return false
//                return console.log(['dreiheiligengestalten.at', 'craft-dhg.test', 'craft.dreiheiligengestalten.at', 'localhost'].includes(window.location.host))
//                if (window.location.host.includes(['dreiheiligengestalten.at', 'craft-dhg.test', 'craft.dreiheiligengestalten.at', 'localhost'])) {
//                    window.history.go(-1)
//                    return false
//                } else {
//                    window.location.href = 'https://dreiheiligengestalten.at'
//                }
            }
        },
        watch: {
            // call again the method if the route changes
            '$route': 'fetchData'
        },
        created() {
            this.fetchData()
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