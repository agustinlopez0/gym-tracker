<template>
  <div class="home">
    <h1>Gym Tracker</h1>
    <EjerciciosInput :BASE_URL="BASE_URL"/>
  </div>
</template>

<script>
// @ is an alias to /src
import EjerciciosInput from '@/components/EjerciciosInput.vue'

export default {
  name: 'HomeView',
  components: {
    EjerciciosInput
  },
  data(){
    return {
      BASE_URL: 'http://190.246.235.191/gym-tracker/API/'
    }
  }
}

</script>

<style scoped>
  h1{
    text-align: center;
    padding-bottom: 40px;
  }

</style>