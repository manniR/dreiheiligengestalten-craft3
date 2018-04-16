<template>
  <div>
    <h1>This is the home page</h1>
    <p>{{ welcomeMessage }}</p>
  </div>
</template>

<script>

export default {
  name: 'home',
  data () {
    return {
      welcomeMessage: 'Hello Manni World'
    }
  }
}

</script>

<style>

</style>
