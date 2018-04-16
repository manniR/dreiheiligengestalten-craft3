<template>
    <masonry :cols="{default: 4, 1000: 3, 700: 2, 400: 1}" :gutter="0">

        <div v-for="(item, index) in items" :key="index" class="Project ">
            <div class="Project__wrapper">
                <div class="Project__image preview-img-list" v-if="item.images" >
                    <img v-for="(image, index) in item.images" :src="image.src" :alt="image.title"
                         @click="$photoswipe.open(index, item.images)" v-show="index === 0" class="preview-img-item">
                </div>
            </div>
            <div class="Project__details">
                <p class="Project__creators">
                    <!--<a v-for="creator in item.cr" :href=""></a>-->
                </p>
                <h3>{{item.title}}</h3>
            </div>

        </div>
    </masonry>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'portfolio',
        data() {
            return {
                items: [],
                test_items: [{
                    src: '../src/img/Chrysanthemum.jpg',
                    w: 1024,
                    h: 768
                }, {
                    src: '../src/img/Desert.jpg',
                    w: 1024,
                    h: 768
                }, {
                    src: '../src/img/Hydrangeas.jpg',
                    w: 1024,
                    h: 768
                }]

            }
        },
        computed: {},
        mounted() {
            axios.get('/api/portfolio.json').then(response => {this.items = response.data.data; console.log(response.data.data)})


        },
        methods: {
            photoswipe(index, images){

            },
            log(index, items) {
                console.log(index + '\n')
                console.log(items + '\n')
            }

        }
    }
</script>
<style></style>
