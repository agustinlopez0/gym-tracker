<template>
  <MyNavbar />
  <router-view/>
</template>

<script>


import MyNavbar from './components/shared/MyNavbar.vue'
export default {
    components: { MyNavbar }
}

</script>

<style>
*{
  margin: 0;
  padding: 0;
}
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #eee;
  text-shadow: 1px 1px 10px rgba(162, 0, 255, 1);
  /* color: #8916f5;
  text-shadow: 1px 1px 20px rgba(255, 255, 255, .2); */
  background-color: #111;
}

nav {
  padding: 30px;
}

nav a {
  font-weight: bold;
  color: #ffffff;
  text-shadow: none;
}

nav a.router-link-exact-active {
  color: #42b983;
  /* text-shadow: 1px 1px 10px rgb(245, 199, 199); */

}
</style>
