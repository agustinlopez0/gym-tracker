<template>
    <nav>
        <router-link to="/">Home</router-link> |
        <router-link to="/registros">Registros</router-link>
    </nav>
</template>

<script>
export default {
    name: "MyNavbar",
}
</script>

<style scoped>
nav{
    text-align: center;
}
</style>
