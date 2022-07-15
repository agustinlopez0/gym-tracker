<template>
  <section id="main">

    <article class="confirmLog" v-if="showConfirm">
        <div class="card">
            <div class="relative">
                <div id="close" @click="showConfirm = false">
                    <img src="@/assets/close-icon.svg" height="15" alt="">
                </div>
                <div class="card-content">
                    <p id="confirmar">
                        <span>¿Confirmar?</span>
                    </p>

                    <p>
                        {{log}}
                        {{log.date.day}}
                        {{log.date.date}}
                        de
                        {{log.date.month}}
                        {{log.date.year}} <br>
                        <strong>
                            {{log.ejercicio}} 
                        </strong> 
                        <br>
                        {{log.peso}}kg
                    </p>
                    <div class="buttons">
                        <button id="cancel-button" @click="showConfirm = false">Cancelar</button>
                        <button id="accept-button" @click="sendLog()">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
    </article>

    <button id="openConfirm">
        <img src="@/assets/post-icon.svg" height="35" @click="showConfirm = true">
    </button>
  </section>
</template>

<script>
// const BASE_URL = 'http://192.168.0.250/gym-tracker/API/'

export default {
  name: 'LogButton',
  props: {
    log: Object
  },
  data(){
    return{
      showConfirm: false
    }
  },
  methods: {
    sendLog(){

    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

    #openConfirm{
        position: fixed;
        right: 40px;
        bottom: 40px;
        padding: 15px;
        border-radius: 50%;
        background: linear-gradient(rgb(117, 182, 117) 10%, rgb(58, 146, 40) 100%);
        border: none;
        cursor: pointer;
        transition: all 1s cubic-bezier(0.075, 0.82, 0.165, 1);
        animation: boing 300ms ease-in-out;
    }

    #openConfirm:hover{
        /* transform: scale(20); */
        animation: boing 300ms ease-in-out;
        transform: scale(0.95, 0.95);

    }

    @keyframes boing {
    15%, 40%, 75%, 100% {
        transform-origin: center center;
    }
    15% {
        transform: scale(1.2, 1.1);
    }
    40% {
        transform: scale(0.95, 0.95);
    }
    75% {
        transform: scale(1.05, 1);
    }
    100% {
        transform: scale(1, 1);
    }
    }
    .confirmLog{
        position: fixed;
        top: 0;
        right: 0;
        left: 0;
        bottom: 0;
        /* background-color: rgba(0,0,0,.5); */
        backdrop-filter: blur(5px);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1;
    }
    .relative{
        position: relative;
    }
    #close{
        position: absolute;
        top: 15px;
        right: 15px;
        cursor: pointer;
    }
    .card{
        width: 600px;
        max-width: 80%;
        margin-top: -200px;
        background-color: rgb(255, 255, 255);
        box-shadow: 2px 5px 10px rgba(0,0,0,.5);
        border-radius: 5px;
    }
    .card-content{
        padding: 40px;
        padding-top: 20px;
        font-size: 20px;

    }
    #confirmar{
        font-size: 25px;
        text-align: center;
        margin-bottom: 30px;
    }


    .buttons{
        margin-top: 30px;
        display: flex;
        justify-content: space-between;
    }
    .buttons button{
        padding: 15px 25px;
        border-radius: 5px;
        border: 1px solid black;
        font-weight: 500;
        cursor: pointer;
    }
    
    #accept-button{
        background: linear-gradient(rgb(117, 182, 117) 10%, rgb(58, 146, 40) 100%);
    }
</style>
