<template>
  <footer>
      <div class="m-8">
          <div class="flex flex-wrap">
            <div class="Grid__footer-item Grid__footer-item-dreiheiligen">
                <div class="Member Member__footer" >
                    <div class="vcard">
                        <h2 class="Member__name Logo"><span>Kreativpool</span>Dreiheiligengestalten</h2>
                        <p>
                            Dreiheiligenstraße 17
                            <br>6020 Innsbruck
                        </p>
                        <!--span.Member__email.email #{email} -->
                        <span><br>
                            <a href="http://www.dreiheiligengestalten.at" class="Member__url url">dreiheiligengestalten.at</a>
                        </span>
                        <div class="Socials">
                            <a href="https://plus.google.com/104325596482992184046" class="Socials__google-link"></a>
                            <a href="https://vimeo.com/dreiheiligengestalten" class="Socials__vimeo-link"></a>
                            <a href="https://www.youtube.com/channel/UCs4GvIWlpdQq2CJOJPAKz3A" class="Socials__youtube-link"></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="Grid__footer-item flex-1">
                <div>
                <div class="Grid__footer-item-gestalten flex flex-wrap lg:ml-8">
                        <div class="Member Member__footer w-full md:w-1/2 lg:w-1/3 pl-8" v-for="member, index in members">
                            <div class="vcard">
                                <h2 class="Member__name fn" v-text="member.title"></h2>
                                <span v-if="member.title != 'Soran'" class="block">
                                    <a :href="`mailto:${member.email}`" class="Member__email email" v-text="member.email"></a>
                                </span>
                                <span v-else="member.title == 'Soran'" class="block">
                                    <a v-text="member.email"></a>
                                </span>

                                <span v-if="member.websiteUrl" class="block">
                                    <a :href="member.websiteUrl" class="Member__url url" v-text="member.websiteUrl"></a>
                                </span>

                            </div>
                        </div>
                </div>
            </div>
            </div>
          </div>
            <p class="Copyright">©{{new Date().getFullYear()}} Kreativpool Dreiheiligengestalten</p>
        </div>
    </footer>
</template>

<script>
import axios from 'axios'
export default {
  name: 'siteFooter',
    props:['slug'],
  data () {
    return {
        members: []
    }
  },
  mounted(){
     axios.get('api/members').then(response => this.members=response.data.data)
  }
}

</script>

<style>

</style>
