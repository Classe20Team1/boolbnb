<template >

              <li :onclick="link" class="search-component-apartments-card">

                  <div class="search-component-apartment-img-box">

                      <img :src="coverimg" alt="img">
                      <!-- <img src="https://upload.wikimedia.org/wikipedia/commons/5/50/Bodiam-castle-10My8-1197.jpg"> -->

                  </div>

                  <div class="search-component-apartment-features">

                        <i  v-if="activestar" class="fas fa-star aria-hidden='true' search-component-sponsored-star"> </i>

                        <div class="font-helper-1"> <h3>{{ title }}</h3></div>

                        <ul class="tinies-container" >

                              <li class="font-helper-1 tiny"> Stanze: {{ rooms }}</li>
                              <li class="font-helper-1 tiny"> Letti: {{ beds }}</li>
                              <li class="font-helper-1 tiny"> Bagni: {{ bathrooms }}</li>
                              <li class="font-helper-1 tiny"> Mq: {{ metri_quadrati }}</li>

                        </ul>

                        <div class="apartment-description-search-component">

                                {{description}}

                        </div>

                        <div class="price-tag-search-component"> <span><b> {{ price / 100}} Euro </b> / notte </span></div>

                  </div>

              </li>

</template>


<script>

          export default{
            name: "ListItem",

            props:['title' ,
                   'description',
                   'rooms',
                   'beds',
                   'bathrooms',
                   'metri_quadrati',
                   'price',
                   'link',
                   'coverimg',
                   'description',
                   'activestar',

                   ],
            };

</script>

<style scoped>

.search-component-apartments-card{
  display: flex;
  width:100%;
  height:200px;
  padding:10px;
  border-bottom:1px solid lightgrey;
  position:relative;
}

.search-component-apartments-card:hover{
  background-color: #e1f4f5;
  cursor:pointer;
}

.search-component-apartment-img-box{
  position: relative;
  min-width:180px;
  max-width:180px;
  height:180px;
  border-radius:10px;
  overflow:hidden;
}

.search-component-apartment-img-box img{
  height:100%;
  position:absolute;
  top:50%;
  left:50%;
  transform:translate(-50%, -50%)
}

.search-component-apartment-features{
  width:100%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  padding:5px;
  margin-left: 20px;
}

.tinies-container{
  width:100%;
  display: flex;
  justify-content: space-between;
  list-style: none;
}


.apartment-description-search-component{
  height:75px;
  width:100%;
  overflow:hidden;
  text-overflow:ellipsis;
}

.price-tag-search-component{
  height:30px;
}

.price-tag-search-component{
  display:flex;
  justify-content: flex-end;
}

.search-component-sponsored-star{
  position:absolute;
  color:#FF385C;
  right:15px;
  top:10px;
}

/* .dActive{
  display: block;
} */

</style>
