<template>
  <div>
    <router-link :to="{ name: 'Home' }">Home</router-link>
    <router-link to="/portfolio/slug">Portfolio SLug</router-link>
    <h1>This is the New page</h1>
    <p>{{ welcomeMessage }}</p>
    <slot></slot>
  </div>
</template>

<script>

export default {
  name: 'new',
    props:['slug'],
  data () {
    return {
      welcomeMessage: 'HELLO MANNI'
    }
  }
}

</script>

<style>

</style>
