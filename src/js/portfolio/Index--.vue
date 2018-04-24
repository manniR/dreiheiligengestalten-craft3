<template>
        <section class="Projects Masonry__grid">
            <div v-masonry trasition-duration="0.3s" item-selector=".Masonry__grid-item" column-width=".grid-sizer">
                <div v-masonry-tile class="Project Masonry__grid-item Masonry__grid-item--with-shadow" v-for="project, index in projects">
                    <div class="grid-sizer"></div>
                    <div class="Project__wrapper">
                        <div class="Project__image">

                            <router-link :to="`/portfolio/${project.slug}`" {name: 'itemModal', params: {slug: project.slug}}>
                                <img :src="project.images[0].src" :alt="project.images[0].title" class="Project__image--ov">

                            </router-link>
                        </div>
                        <div class="Project__details">
                            <p class="Project__creators">
                                <span v-for="creator, index in project.creators">
                                    <a :href="creator.websiteUrl" v-text="creator.name"></a>
                                    <span v-if="index+1 < project.creators.length">, </span>
                                </span>
                            </p>
                            <h3 class="Project__title" v-text="project.title"></h3>

                            <div class="Project__description">
                                <span v-if="project.description" v-html="project.description"></span>
                                <p class="mt-4">
                                        <span class="mr-2" v-for="category, index, count in project.categories" >
                                           {{ category }} {{ index+1 < project.categories.length ? ' ,' : ''}}
                                        </span>

                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
</template>

<script>
    import axios from 'axios'

    export default {
        data() {
            return {
                projects: [],
                options:{

                }
            }
        },
        methods: {
            close() {

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
            axios.get('api/portfolios').then(({data: {data: projects}}) => this.projects = projects)

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