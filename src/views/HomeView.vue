<template>
  <div class="home">
    <h1>Gym Tracker</h1>
    <EjerciciosInput/>
  </div>
</template>

<script>
// @ is an alias to /src
import EjerciciosInput from '@/components/EjerciciosInput.vue'

export default {
  name: 'HomeView',
  components: {
    EjerciciosInput
  }
}
</script>

<style scoped>
  h1{
    text-align: center;
    padding-bottom: 40px;
  }

</style>