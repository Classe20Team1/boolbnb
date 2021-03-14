<template>


        <sequential-entrance fromRight >
              <!-- <div class="sequential-container"> -->
                    <div class="box" v-for="element in elements" :key="element">
                          <div class="sponsored-card">

                                <img src="https://www.eurochocolate.net/wp-content/uploads/2019/05/Castello-di-Neuschwanstein-Vista-da-fiaba.jpg" alt="apartment-preview">

                                <div class="sponsored-description">
                                  Grazioso appartamento in centro a Bologna
                                </div>

                                <div class="sponsored-price">
                                  25 € a notte
                                </div>

                                <i class="fas fa-star sponsored-icon"></i>

                          </div>
                    </div>
              <!-- </div> -->
        </sequential-entrance>


</template>

<script>

import SequentialEntrance from 'vue-sequential-entrance'
import 'vue-sequential-entrance/vue-sequential-entrance.css'
Vue.use(SequentialEntrance);

export default{

 name:"Sequential",

 props:["array"],

 data(){
        return{

          elements:this.array.slice(0,6),

        }
 }

}

</script>

<style>

#sequential{

}

.sequential-container{
  display: flex;

}

.box{
  float:left;
  width:calc(100% / 6.5)
}
.box{
  transition:0.5s;
}

.box img:hover {
    transform: scale(105%);
    transition: 0.5s;
    box-shadow: 0 0 25px black;
}

</style>
