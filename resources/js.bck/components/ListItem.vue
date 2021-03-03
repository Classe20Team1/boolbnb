<template >

              <li class="apartments-card">

                  <div class="apartment-img-box">

                      <img src="../assets/apartment-example.png" alt="logo">

                  </div>

                  <div class="apartment-features">

                        <div class="font-helper-1">{{ name }}</div>

                        <div class="font-helper-2">{{ streetName }} {{ streetNumber }}</div>

                        <div class="font-helper-1"> {{ municipality }} </div>

                        <div class="font-helper-1"> {{ latitude }} {{ longitude }} </div>

                        <div class="price-tag"> <b> 35€ </b> / notte </div>

                  </div>

              </li>

</template>


<script>

          export default{
            name: "ListItem",

            props:{
                name: String,
                streetName: String,
                streetNumber: String,
                municipality:String,
                latitude:Number,
                longitude:Number,
            }

          }

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




</style>
