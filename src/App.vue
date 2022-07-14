<template>
  <h1>Gym Tracker</h1>
  <EjerciciosInput />
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
  *{
    padding: 0;
    margin: 0
  }

  h1{
    text-align: center;
    padding: 20px 0 40px;
  }

  #app {
    margin: none;
    background-color: rgb(250, 250, 250);
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }
</style>
