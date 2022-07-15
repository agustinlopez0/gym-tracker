<template>
  <div class="home">
    <h1>Gym Tracker</h1>
    <LogsComponent/>
  </div>
</template>

<script>
// @ is an alias to /src
import LogsComponent from '@/components/LogsComponent.vue'

export default {
  name: 'HomeView',
  components: {
    LogsComponent
  }
}
</script>

<style scoped>
  h1{
    text-align: center;
    padding-bottom: 40px;
  }

</style>