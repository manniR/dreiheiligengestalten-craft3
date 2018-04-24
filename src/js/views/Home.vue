<template>
    <div>
        <main class="Page__wrapper-960">
        <router-link :to="{ name: 'Home' }">Home2</router-link>
        <router-link to="/portfolio/slug">Portfolio SLug</router-link>
            <header>
                <div class="Logo">
                    <h1><span>Kreativpool</span>DREIHEILIGENGESTALTEN.AT</h1></div>
                <p> was soll denn das sein?</p>
                <p> ganz einfach - drei heiligen gestalten ist die kreativplattform in der kohlstatt*.</p>
                <p><span class="Tag">film</span>, <span class="Tag">grafik</span>, <span class="Tag">text</span>, <span
                        class="Tag">webdesign</span>, <span class="Tag">online-shoplösungen</span>, <span
                        class="Tag">kreativberatung</span> und manchmal einen <span class="Tag">hund</span> zum
                    streicheln.
                    <br>alles das gibt's im haus <span class="Tag">dreiheiligenstrasse 17</span>.</p>
                <p class="Caption">* alter name von dreiheiligen</p>
            </header>

            <h2 class="Headline__arbeiten">Arbeiten aus unserem Kreativpool</h2>
            <portfolio></portfolio>
        </main>
        <siteFooter></siteFooter>
    </div>
</template>

<script>
    import siteFooter from './siteFooter'
    import Portfolio from '../portfolio'

    export default {
        components: {siteFooter, Portfolio},
        name: 'home',
        data() {
            return {

            }
        }
    }

</script>

<style>

</style>
