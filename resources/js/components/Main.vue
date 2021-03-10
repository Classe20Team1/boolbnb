<template>

<div id = "app" class="container">

    <div class="row">

          <div class="filter-results">

                      <h5>Oltre 300 alloggi</h5>

                      <h1>Roma: alloggi</h1>

                      <div class="sistemazione">

                            <h5>SISTEMAZIONE</h5>

                            <ul class="basic-filters">

                                <li>

                                    <label for="rooms">Stanze</label>
                                    <input type="number"  name="rooms" value="" v-model="requestedChambres">

                                </li>

                                 <li>

                                      <label for="beds">Letti</label>
                                      <input type="number"  name="beds" value="" v-model="requestedBeds">

                                 </li>

                                 <li>

                                      <label for="bathrooms">Bagni</label>
                                      <input type="number"  name="bathrooms" value="" v-model="requestedBathrooms">

                                 </li>

                                 <!-- <li>

                                      <select class="" name="distance">

                                                <option value="5">5km</option>
                                                <option value="20" selected>20km</option>
                                                <option value="50">50km</option>
                                                <option value="100">100km</option>

                                      </select>

                                 </li> -->

                            </ul>

                      </div>

                      <div class="service-filters">

                              <h5>SERVIZI ED ALTRE OPZIONI</h5>

                              <ul class="services-filters">

                                    <li v-for="(service, index) in services">

                                          <input type="checkbox" :value="service.name" name="wifi" v-model="requestedServices">
                                          <label for="wifi"> {{service.name}} </label>

                                    </li>

                              </ul>

                      </div>

                      <div class="results-list">

                              <ListContainer />

                              <ListItem v-for="(data, index) in filterByServices "

                                          :coverimg="data.cover_img"
                                          :link="'window.location=`apartments/'.concat(data.id).concat('`;')"
                                          :title = "data.title"
                                          :rooms = "data.rooms"
                                          :beds = "data.beds"
                                          :bathrooms = "data.bathrooms"
                                          :metri_quadrati = "data.metri_quadrati"
                                          :price ="data.price"
                                          :cover_img ="data.imgs[0]"
                                          :key = "index"
                                          slot = "items"
                                          />
                      </div>

          </div>

              <div id="myMap" class="mappa-container">

                    <Mapp :markersinfo = "filterByServices" :usersearch = "userSearch" />

              </div>

    </div>

  </div>

</template>

<script>

        import ListItem from './ListItem'
        import ListContainer from './ListContainer'
        import Mapp from './Mapp.vue'

        export default{
          name: "Main",

          props:['searchedcity',"services", "guests"],

          components:{
            ListItem,
            ListContainer,
            Mapp,
          },

          data(){
                  return{

                      Api:"biGZFmMrEVJLLaCv4NrzRwGycnhKG2Fz",
                      anArray: this.apartmentsinfo,
                      userSearch:this.searchedcity,
                      requestedServices:[],
                      requestedBathrooms:1,
                      requestedChambres:1,
                      requestedBeds:this.guests,
                      tryArray:[],
                  }
          },

          computed:{
                    filterByServices:function(){
                      let that = this;

                      return this.tryArray.filter(function(element){
                        if((element.bathrooms >= that.requestedBathrooms)&&(element.beds>=that.requestedBeds)&&(element.rooms>=that.requestedChambres))
                          {
                            return that.requestedServices.every(function(elemento){
                              return ((element.services.map(el=>el.name)).includes(elemento))
                          })
                        }
                      });
                    },

          },

          methods:{

                getApartments(){
                  let vim = this;

                  axios.post(
                    "http://localhost:8000/api/search/apartments",
                    {
                      "city":this.userSearch,
                      "guests": 1,
                    },

                    {
                      headers: {
                      "Content-type": "application/json; charset=UTF-8",
                      }
                    }
                  )
                  .then(response => {

                    this.tryArray = response.data;
                    console.log(this.tryArray);

                  })
                },

          },

          created() {

            this.getApartments();


          },

    };

</script>


<style scoped>

.container{
  margin-left: auto;
  margin-right: auto;
}

.row{
  width:100%;
  display: flex;
}

.filter-results{
  flex:2;
  height:100vh;
  padding:20px;
}
.sistemazione{
  margin-top:50px;
}

.service-filters{
  justify-content: space-between;
  margin-top:50px;
  margin-bottom:50px;
}

.results-list{
  height:calc(100vh - 390px);
  overflow-y: hidden;
  overflow-y: scroll;
  border-top:1px solid lightgrey;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

ul{
  list-style: none;
  display:flex;
  flex-wrap: wrap;
}

ul li{
  display: flex;
  flex-wrap: nowrap;
  height:40px;
  min-width: 150px;
  line-height: 40px;
}

ul li label{
  margin-left:5px;
}

.basic-filters{
  justify-content: space-between;
}

.basic-filters label{
  line-height: 40px;
}

.basic-filters input{
  margin-left:5px;
  border:1px solid lightgrey;
  border-radius: 10px;
  width:75px;
}

.basic-filters li{
  margin-top: 10px;
};

.search-results {
  width: 55%;
  padding: 3em;
  padding-right: 1em;
}

.search-results h1 {
  margin-bottom: 1.1em;
}

.search-results .search-filters ul button {

}
.search-results .search-filters ul button:hover {
  border: 1px solid black;
}

.mappa-container{
  flex:2;
  /* border:2px solid red; */
}

</style>
