<template>
  <section id="main">
    
    <DeleteButton v-if="showModal" :BASE_URL="BASE_URL" :deleteLog="deleteLog"/>
    <!-- {{entrenamientos}} -->
        <!-- {{entrenamientos[0]}} -->
    <article class="musculo" v-for="musculo in musculos" :key="musculo">
      <h2 class="musculo-titulo">
        {{musculo.nombre_musculo}}
      </h2>
      <ul>
        <li v-for="entrenamiento in filterEntrenamientos(entrenamientos, musculo)" 
            :key="entrenamiento">
          
          <small>
            {{formatDate(entrenamiento)}}
            <!-- ({{entrenamiento.dia}} {{entrenamiento.fecha}} de {{entrenamiento.mes}} {{entrenamiento.anio}}) -->
          </small>
          <strong>
            {{entrenamiento.peso}}kg
          </strong>
          <span>
            {{entrenamiento.nombre_ejercicio}}
          </span>
          <span id="delete" @click="openDeleteLog(entrenamiento)">
            <img src="@/assets/delete.png" height="15">
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
import DeleteButton from './DeleteButton.vue'

const months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiempre", "Octubre", "Noviembre", "Diciembre"]

export default {
    name: "EjerciciosInput",
    data() {
        return {
            entrenamientos: [],
            musculos: [],
            showModal: false,
            deleteLog: {}
        };
    },
    props:{
      BASE_URL: String
    },
    async mounted() {
        this.entrenamientos = await this.getEntrenamientos()
        this.musculos = await this.getMusculos()
    },
    methods: {
        async getEntrenamientos(){
            var requestOptions = {
                method: 'GET',
                redirect: 'follow'
            };

            let response = await fetch(this.BASE_URL + "get_entrenamiento.php", requestOptions)
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
            let response = await fetch(this.BASE_URL + "get_musculos.php", requestOptions)
                .then(response => response.text())
                .then(result => JSON.parse(result))
                .catch(error => console.log('error', error));
            return response
        },
        filterEntrenamientos(entrenamientos, musculo){

            // entrenamientos = entrenamientos.sort( (x, y) =>  x.nombre_ejercicio > y.nombre_ejercicio ? 1 : -1)
            entrenamientos = entrenamientos.sort( (x, y) =>  {
              if(x.nombre_ejercicio > y.nombre_ejercicio)
                return 1
                else if (x.nombre_ejercicio < y.nombre_ejercicio)
                  return -1
                else
                  return x.id - y.id
            })

            return entrenamientos.filter((x) => x.id_musculo == musculo.id);
        },
        formatDate(e){
          let mesN = (months.findIndex(x => x == e.mes) + 1).toString()
          if(mesN.length == 1){
            mesN = "0" + mesN
          } 
          let fechaN = e.fecha
          if(fechaN.length == 1){
            fechaN = "0" + fechaN
          } 
          return `${e.dia} ${fechaN}/${mesN}`
        },
        openDeleteLog(x){
          this.deleteLog = x
          this.deleteLog.formatedDate = this.formatDate(this.deleteLog)
          this.showModal = true
        }
    },
    components: { DeleteButton }
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
  grid-template-columns: 1fr 1fr 2fr .1fr;
  justify-content: space-between;
  align-items: center;
  padding: 5px 0;
  margin-bottom: 5px;
  
}

input[type=number]{
  padding: 6px;
  width: 50px;
}

#delete{
  display: flex;
  justify-content: center;
  align-items: center;
  /* border: 1px solid rgb(218, 116, 116); */
  height: 40px;
  width: 40px;
  border-radius: 50%;
  background-color: rgb(255, 0, 0);
  opacity: .7;
}

</style>
