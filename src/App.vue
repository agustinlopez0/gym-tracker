<template>
  <EjerciciosInput msg="Welcome to Your Vue.js App"/>
</template>

<script>
import EjerciciosInput from './components/EjerciciosInput.vue'

export default {
  name: 'App',
  components: {
    EjerciciosInput
  }
}
</script>

<style>
  /* *{
    padding: 0;
    margin: 0
  } */
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
</style>
