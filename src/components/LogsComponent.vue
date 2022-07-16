<template>
  <section id="main">
    <!-- {{entrenamientos}} -->
    <article class="musculo" v-for="musculo in musculos" :key="musculo">
      <h2 class="musculo-titulo">
        {{musculo.nombre_musculo}}
      </h2>
      <ul>
        <li v-for="entrenamiento in filterEntrenamientos(entrenamientos, musculo)" 
            :key="entrenamiento">
          
          <small>
            ({{entrenamiento.dia}} {{entrenamiento.fecha}} de {{entrenamiento.mes}} {{entrenamiento.anio}})
          </small>
          <strong>
            {{entrenamiento.peso}}kg
          </strong>
          <span>
            {{entrenamiento.nombre_ejercicio}}
          </span>
          <!-- <input  type="number" 
                  @input="limitInput()"
                  v-model="selectedWeigth[ejercicio.id]" 
                  :disabled="selectedWeigthIndex != ejercicio.id && selectedWeigthValue != null"> -->
        </li>
      </ul>
    </article>
  </section>



</template>

<script>
const BASE_URL = 'http://190.193.53.186/gym-tracker/API/'

export default {
    name: "EjerciciosInput",
    data() {
        return {
            entrenamientos: [],
            musculos: [],
        };
    },
    async mounted() {
        this.entrenamientos = await this.getEntrenamientos()
        // this.entrenamientos = this.entrenamientos.sort(x.)
        this.musculos = await this.getMusculos()
    },
    methods: {
        async getEntrenamientos(){
            var requestOptions = {
                method: 'GET',
                redirect: 'follow'
            };

            let response = await fetch(BASE_URL + "get_entrenamiento.php", requestOptions)
                .then(response => response.text())
                .then(result => JSON.parse(result))
                .catch(error => console.log('error', error));
            return response
        },
        async getMusculos() {
            var requestOptions = {
                method: "GET",
                redirect: "follow",
            };
            let response = await fetch(BASE_URL + "get_musculos.php", requestOptions)
                .then(response => response.text())
                .then(result => JSON.parse(result))
                .catch(error => console.log('error', error));
            return response
        },
        filterEntrenamientos(entrenamientos, musculo){
            return entrenamientos.filter((x) => x.id_musculo == musculo.id);
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
  display: grid;
  grid-template-columns: 2fr 1fr 2fr;
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
