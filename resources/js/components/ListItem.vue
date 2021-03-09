<template >

              <li class="apartments-card">

                  <div class="apartment-img-box">

                      <img src="" alt="img">

                  </div>

                  <div class="apartment-features">

                        <div class="font-helper-1">{{ title }}</div>

                        <ul class="tinies-container" >

                              <li class="font-helper-1 tiny"> Stanze: {{ rooms }}</li>
                              <li class="font-helper-1 tiny"> Letti: {{ beds }}</li>
                              <li class="font-helper-1 tiny"> Bagni: {{ bathrooms }}</li>
                              <li class="font-helper-1 tiny"> Mq: {{ metri_quadrati }}</li>

                        </ul>

                        <a :href="link">{{link}}</a>

                        <div class="price-tag"> <b> {{ price / 100}} Euro </b> / notte </div>

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

                   ],
            };

</script>

<style scoped>

.apartments-card {
  display:flex;
  justify-content: space-between;
  border-top: 1px solid lightgrey;
  border-bottom: 1px solid lightgrey;
  padding: 1em;
  padding-left: 0;
  display: flex;
  height: 200px;
}

.apartments-card .apartment-img-box {
  width: 200px;
  padding:10px;
  border:1px solid pink;

}

.apartments-card .apartment-features {


  padding: 10px;
  display:flex;
  flex-direction: column;
  justify-content: space-between;
}

.apartments-card .apartment-img-box img {
  width: 100%;
  height: 100%;

  border-radius: 1em;
}

.font-helper-1 {
  font-size: .8em;
  color: grey;
  margin-bottom: 1em;
}

.font-helper-2 {
  margin-bottom: 1em;
}

.tinies-container{
  list-style: none;
  display: flex;
  justify-content: space-between;
}






</style>
