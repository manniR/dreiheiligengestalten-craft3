<template>
  <div>
    <h1>This is the New page</h1>
    <p>{{ welcomeMessage }}</p>
  </div>
</template>

<script>

export default {
  name: 'new',
  data () {
    return {
      welcomeMessage: 'Hello New Page'
    }
  }
}

</script>

<style>

</style>
