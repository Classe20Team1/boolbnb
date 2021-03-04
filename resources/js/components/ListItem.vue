<template >

              <li class="apartments-card">

                  <div class="apartment-img-box">

                      <img src="http://rndimg.com/ImageStore/OilPaintingGreen/400x300_OilPaintingGreen_57a67ca7deb041b2813a2d8562c8dac6.jpg" alt="logo">

                  </div>

                  <div class="apartment-features">

                        <div class="font-helper-1">{{ title}}</div>

                        <ul class="tinies-container" >

                              <li class="font-helper-1 tiny"> Stanze: {{ rooms }}</li>
                              <li class="font-helper-1 tiny"> Letti: {{ beds }}</li>
                              <li class="font-helper-1 tiny"> Bagni: {{ bathrooms }}</li>
                              <li class="font-helper-1 tiny"> Mq: {{ metri_quadrati }}</li>

                        </ul>

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
                   'cover_img'],
            };

</script>

<style scoped>

.apartments-card {
  width:50%;
  border-top: 1px solid lightgrey;
  border-bottom: 1px solid lightgrey;
  padding: 1em;
  padding-left: 0;
  display: flex;
  height: 225px;
}

.apartments-card .apartment-img-box {
  width: 43%;
  padding: .4em;
}

.apartments-card .apartment-features {
  width: 57%;
  padding: .4em;
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
