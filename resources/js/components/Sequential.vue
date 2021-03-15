<template>

        <sequential-entrance fromRight>


                    <div :onclick="'window.location=`apartments/'.concat(element.id).concat('`;')" class="sequential-image-component-box" v-for="element in elements" :key="element.id">

                      <div class="sequential-img-container">

                          <!-- <img :src="element.cover_img" alt="apartment-preview"> -->
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStl0EeTGdYArc_vE0kzAE9aj_iaTaDYIqTcQ&usqp=CAU" alt="">


                      </div>
                              <div class="">

                                      <div class="sequential-img-details-container">

                                          <div class="micro-details-header">

                                                <h4> {{element.title}} </h4>

                                                <div class="micro-details-sponsored-price">

                                                      {{element.price}} € a notte
                                                </div>

                                          </div>


                                          <div class="sponsored-description">

                                                <ul>
                                                      <li>Stanze: {{element.rooms}}</li>
                                                      <li>Letti: {{element.beds}}</li>
                                                      <li>Bagni: {{element.bathrooms}}</li>
                                                      <li>Mq: {{element.metri_quadrati}}</li>
                                                </ul>

                                          </div>

                                          <i class="fas fa-star sponsored-icon"></i>

                                      </div>
                              </div>

                      </div>


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

          elements:this.array.slice(0,8),

        }
 }

}

</script>

<style scoped>


.sequential-image-component-box{
  border-radius:10px;
  margin-right: 30px;
  margin-top:10px;
  margin-bottom:10px;
}

.sequential-image-component-box:hover{
  transition: 0.5s;
  box-shadow: 0 0 10px black;
}

.sequential-img-container{
  border-bottom: 0px;
  overflow:hidden;
  height:150px;
  width:298px;
  border-top-left-radius:10px;
  border-top-right-radius:10px;
  position:relative;
}

.sequential-img-details-container{
  border:1px solid grey;
  width:298px;
  border-top: 0px;
  padding:5px;
  border-bottom-left-radius:10px;
  border-bottom-right-radius:10px;
}

.micro-details-header{
  display: flex;
  justify-content: space-between;
  margin-top:5px;
}

.micro-details-header h4{
  font-weight: 400;
  color:grey;
}

.sponsored-description{
  margin-top:5px;
  text-overflow: hidden;
  font-size: 12px;
  margin-bottom:5px;
}

.sponsored-description ul{
  margin-top: 10px;
  list-style:none;
  display: flex;
  justify-content: space-between;
  color:darkgrey;
}

.micro-details-sponsored-price{
  color:grey;
}

.sequential-img-container img{
    width:298px;
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%, -50%);
}

</style>
