<template>
  <div class="hello">
    <h1>{{ msg }}</h1>
    
    <h3>Trapecio</h3>
    <ul>
      <li>Vuelo adelante 
          <select name="select">
            <option value="value1">10</option>
            <option value="value2" selected>20</option>
            <option value="value3">30</option>
            <option value="value3">40</option>
            <option value="value3">50</option>
          </select>
      </li>
      <li>
        Vuelo lateral
          <select name="select">
            <option value="value1">10</option>
            <option value="value2" selected>20</option>
            <option value="value3">30</option>
            <option value="value3">40</option>
            <option value="value3">50</option>
          </select>
      </li>
      <li>
        Trapecio con barra
          <select name="select">
            <option value="value1">10</option>
            <option value="value2" selected>20</option>
            <option value="value3">30</option>
            <option value="value3">40</option>
            <option value="value3">50</option>
          </select>  
      </li>
    </ul>
    <section v-for="musculo in musculos" :key="musculo">
      <h3 >
        {{musculo.nombre_musculo}}
      </h3>
      <ul >
        <li v-for="ejercicio in filterEjercicios(ejercicios, musculo)" 
            :key="ejercicio">
          {{ejercicio.nombre_ejercicio}}
          <select id="pesos">
            <option 
              value=""
              v-for="peso in pesos"
              :key="peso"
              >
              {{peso.peso}}
            </option>
          </select>
        </li>
      </ul>
      <!-- <ul>
        <li>ejercicio</li>
        <li>ejercicio</li>
        <li>ejercicio</li>
        <li>ejercicio</li>
      </ul> -->
    </section>
    <br><br><br><br>
    <h1>Ejercicios</h1>
    {{ejercicios}}
    <h1>Musculos</h1>
    {{musculos}}
    <h1>Pesos</h1>
    {{pesos}}
    <p>
      <!-- {{ejercicios}} -->
    </p>

  </div>
</template>

<script>
export default {
  name: 'EjerciciosInput',
  props: {
    msg: String
  },
  data(){
    return{
      ejercicios: 'CARGANDO',
      musculos: [],
      pesos: [],
      BASE_URL: 'http://localhost/gym-tracker/API/'
    }
  },
  async mounted(){
    this.ejercicios = JSON.parse(await this.getEjercicios())
    this.pesos      = JSON.parse(await this.getPesos()) 
    this.musculos   = JSON.parse(await this.getMusculos()) 
  },
  methods: {
    async getEjercicios(){
      var requestOptions = {
        method: 'GET',
        redirect: 'follow',
      };

      let res = await fetch(this.BASE_URL + "get_ejercicios.php", requestOptions)
      let res2 = res.text()
      return res2
    },
    async getPesos(){
      var requestOptions = {
        method: 'GET',
        redirect: 'follow',
      };

      let res = await fetch(this.BASE_URL + "get_pesos.php", requestOptions)
      let res2 = res.text()
      return res2
    },
    async getMusculos(){
      var requestOptions = {
        method: 'GET',
        redirect: 'follow',
      };

      let res = await fetch(this.BASE_URL + "get_musculos.php", requestOptions)
      let res2 = res.text()
      return res2
    },
    filterEjercicios(ejercicios, musculo){
      return ejercicios.filter((x)=> x.id_musculo == musculo.id)
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
