<template>
  <section id="main">
    {{newLog}}
    <hr>
    Value:
    {{selectedWeigthValue}}
    <hr>
    Index:
    {{selectedWeigthIndex}}
    <hr>
    Weigth:
    {{selectedWeigth}}
    <!-- <h1>{{now.day}} {{now.date}} de {{now.month}} {{now.year}}</h1> -->
    <article class="musculo" v-for="musculo in musculos" :key="musculo">
      <h2 class="musculo-titulo">
        {{musculo.nombre_musculo}}
      </h2>
      <ul>
        <li v-for="ejercicio in filterEjercicios(ejercicios, musculo)" 
            :key="ejercicio">
          {{ejercicio.nombre_ejercicio}}
          <input type="number" v-model="selectedWeigth[ejercicio.id]" 
          :disabled="selectedWeigthIndex != ejercicio.id && selectedWeigthValue != null">
        </li>
      </ul>
    </article>

    <br><br><br><br>
    
    <h1>Ejercicios</h1>
    {{ejercicios}}
    <h1>Musculos</h1>
    {{musculos}}
    <h1>Pesos</h1>
    {{pesos}}
  </section>
</template>

<script>
const days = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"]
const months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiempre", "Octubre", "Noviembre", "Diciembre"]
const BASE_URL = 'http://192.168.0.250/gym-tracker/API/'

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
      newLog: {},
      selectedWeigth: [],
    }
  },
  async mounted(){
    this.ejercicios = JSON.parse(await this.getEjercicios())
    this.pesos      = JSON.parse(await this.getPesos()) 
    this.musculos   = JSON.parse(await this.getMusculos()) 
    this.newLog     = {
      date: this.getDate(),
      ejercicio: undefined,
      peso: undefined
    }
  },
  methods: {
    async getEjercicios(){
      var requestOptions = {
        method: 'GET',
        redirect: 'follow',
      };

      let res = await fetch(BASE_URL + "get_ejercicios.php", requestOptions)
      let res2 = res.text()
      return res2
    },
    async getPesos(){
      var requestOptions = {
        method: 'GET',
        redirect: 'follow',
      };

      let res = await fetch(BASE_URL + "get_pesos.php", requestOptions)
      let res2 = res.text()
      return res2
    },
    async getMusculos(){
      var requestOptions = {
        method: 'GET',
        redirect: 'follow',
      };

      let res = await fetch(BASE_URL + "get_musculos.php", requestOptions)
      let res2 = res.text()
      return res2
    },
    filterEjercicios(ejercicios, musculo){
      return ejercicios.filter((x)=> x.id_musculo == musculo.id)
    },
    getDate() {
      const todaysDate = new Date()
      const day = days[todaysDate.getDay()]
      const date = todaysDate.getDate()
      const month = months[todaysDate.getMonth()]
      const year = todaysDate.getFullYear()

      return {day, date, month, year}
    }
  },
  computed: {
    selectedWeigthIndex: function(){
      return this.selectedWeigth.findIndex(x => x != null && x != "")
    },
    selectedWeigthValue: function(){
      return this.selectedWeigth.find(x => x != null && x != "")
    }
  },
  watch: {
    selectedWeigthValue: function(){
      if(!this.selectedWeigthValue){
        this.newLog.peso = undefined
        this.newLog.ejercicio = undefined
      } else {
        this.newLog.peso  = this.selectedWeigthValue
        this.newLog.ejercicio = this.ejercicios.find(x => x.id == this.selectedWeigthIndex).nombre_ejercicio
      }
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

#main{
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}

.musculo{
  width: 80%;
  max-width: 600px;
}

.musculo-titulo{
  margin-bottom: 10px;
}

ul{
  margin-bottom: 30px;
  list-style: none;
}

li{
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 5px 0;
  margin-bottom: 5px;
  
}

input[type=number]{
  padding: 6px;
  width: 50px;
}


</style>
