<template>
          <div id = "app" class="container">

                 <div class="row">

                     <div class="col">

                       <div class="advanced-search">
                         <div class="search-results">
                           <h5>Oltre 300 alloggi</h5>
                           <h1>Roma: alloggi</h1>
                           <div class="search-filters">
                             <ul>
                               <li>Numero di stanze</li>
                               <li>Numero di bagni</li>
                               <li>Wi-Fi</li>
                               <li>Posto macchina</li>
                               <li>Piscina</li>
                               <li>Portineria</li>
                               <li>Sauna</li>
                               <li>Vista mare</li>
                             </ul>
                           </div>
                           </div>
                           </div>

                            <input v-model='searchEl' type="text" name="" value="" placeholder="Cerca...">

                            <ListContainer />

                                  <ListItem v-for="(data, index) in filteredArray"

                                            
                                            :name = "data.poi.name"
                                            :streetName = "data.address.streetName"
                                            :streetNumber = "data.address.streetNumber"
                                            :municipality = "data.address.municipality"
                                            :latitude = "data.position.lat"
                                            :longitude = "data.position.lon"
                                            :key = "index"
                                            slot = "items"
                                            />

                     </div>

                 </div>

            </div>

</template>


<script>

        import ListItem from './ListItem'
        import ListContainer from './ListContainer'
        import MY_JSON from '../jsonData/genovaHotel.json'

        export default{

          name: "Main",

          components:{
            ListItem,
            ListContainer
          },

          data(){
                  return{
                      myJson:MY_JSON,
                      searchEl:'',
                  }
          },

          computed:{
                    filteredArray: function() {
                      var vm = this;
                      return this.myJson.results.filter(function(element){
                        return element.poi.name.toLowerCase().includes(vm.searchEl.toLowerCase())
                      });
                    },
          },





        }

</script>


<style>

.advanced-search {
  display: flex;
}

.search-results,
.map-box {
  height: 81vh;
}

.search-results {
  width: 55%;
  height:150px;
  padding: 3em;
  padding-right: 1em;
  overflow-y: scroll;
}

.search-results h5 {
  margin-bottom: 1em;
}

.search-results h1 {
  margin-bottom: 1.1em;
}

.search-results .search-filters ul {
  list-style: none;
  display: flex;
  flex-wrap: wrap;
  margin-bottom: 1em;
}

.search-results .search-filters ul li {
  border: 1px solid lightgrey;
  border-radius: 1em;
  cursor: pointer;
  margin-right: 1em;
  margin-bottom: .5em;
  padding: .5em;
}
.search-results .search-filters ul li:hover {
  border: 1px solid black;
}






</style>
