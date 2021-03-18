<template>

<div id = "app">

    <div class="row d-flex">

          <div class="filter-results">

                      <div class="search-component-title-container">

                            <h2>{{filterByServices.length}} Alloggi trovati a: {{userSearch}}</h2>

                      </div>

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

                      <div class="toggle-services-button-container">

                            <button id="services-button" class="toggle-services-button" type="button" name="button">Mostra più filtri</button>

                      </div>

                      <div id="services-list" class="service-filters">

                              <h5>SERVIZI ED ALTRE OPZIONI</h5>

                              <ul class="services-filters">

                                    <li v-for="(service, index) in services">

                                          <input type="checkbox" :value="service.name" name="wifi" v-model="requestedServices">
                                          <label for="wifi"> {{service.name}} </label>

                                    </li>

                              </ul>

                      </div>

                      <!-- <div class="results-container"> -->

                      <div class="results-list">

                              <ListContainer />

                              <ListItem  v-for="(data, index) in filterByServices "

                                          :activestar="data.active"
                                          :coverimg="data.cover_img"
                                          :description="data.description"
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

                              <div class="noresult-container"v-if= '(filterByServices.length == 0)'> <h3 class="no-results"> There's no place in heaven! </h3> </div>

                      </div>

                      <!-- </div> -->





          </div>

              <div id="myMap" class="mappa-container d-flex">

                    <Mapp :markersinfo = "filterByServices" :usersearch = "userSearch" :ctrlat = "centerMap.latit" :ctrlon = "centerMap.longit"/>

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

          props:['searchedcity',"services", "guests", "searchcoo"],

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
                      centerMap:this.searchcoo,
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
            console.log(this.centerMap)


          },

    };

</script>


<style scoped>

/* .results-container{
  height:100%;
  border:2px solid pink;

} */

.row{
  height:calc(100vh - 100px);
  overflow-y: hidden;
}
.sistemazione{
  margin-top:25px;
}

.filter-results{
  border:2px solid red;
  height:100%;
  padding-left:20px;
  padding-right:20px;
  flex:1;
}

.service-filters{
  justify-content: space-between;
  display:none;
}

.toggle-services-button-container{
  width:100%;
  height:20px;
  margin-bottom: 10px;
}

.toggle-services-button{
  height:100%;
  width:100%;
  border:1px solid lightgrey;
  background-color: white;
  border-radius: 10px;
}

.services-filters{
  margin-top:15px;
  display: flex;
  justify-content:space-between;
}

.results-list{
  border:2px solid green;
  /* height:100%; */
  height:calc(100% - 150px);
  /* overflow-y: hidden; */
  overflow-y: scroll;
  border-top:1px solid lightgrey;
}

ul{
  list-style: none;
  display:flex;
  flex-wrap: wrap;
  width:100%;
}

ul li{
  display: flex;
  flex-wrap: nowrap;
  align-items: center;
  height:40px;
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
  height:30px;
  width:30px;
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

.search-results .search-filters ul button:hover {
  border: 1px solid black;
}

.mappa-container{
  flex:1;
}

.noresult-container{
  height:50%;
  width:100%;
  position: relative;
}

.no-results{
  position: absolute;
  top:50%;
  left:50%;
  transform:translate(-50%,-50%)
}

/* .search-component-apartments-card:last-child{
  margin-bottom: 500px;
} */

@media screen and (max-width: 960px) {
.mappa-container{
  display:none;
  }

}

@media screen and (max-width: 768px) {


}

</style>
