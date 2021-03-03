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

                                     <li> <button type="button" name="button"> WiFi </button> </li>
                                     <li> <button type="button" name="button"> Animali Ammessi </button> </li>
                                     <li> <button type="button" name="button"> Posto Macchina </button> </li>
                                     <li> <button type="button" name="button"> Piscina </button> </li>
                                     <li> <button type="button" name="button"> Portineria </button> </li>
                                     <li> <button type="button" name="button"> Sauna </button> </li>
                                     <li> <button type="button" name="button"> Vista mare </button> </li>

                                </ul>

                           </div>
                           </div>
                           </div>

                            <input v-model='searchEl' type="text" name="" value="" placeholder="Cerca...">


                                <ListContainer />


                              <ListItem v-for="(data, index) in filteredArray "


                                        :title = "data.title"
                                        :rooms = "data.rooms"
                                        :beds = "data.beds"
                                        :bathrooms = "data.bathrooms"
                                        :metri_quadrati = "data.metri_quadrati"
                                        :price ="data.price"
                                        :cover_img ="data.cover_img"
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

        export default{

          props:['ciccio'],

          name: "Main",

          components:{
            ListItem,
            ListContainer
          },

          data(){
                  return{
                      anArray: this.ciccio,
                      searchEl:'',
                  }
          },

          computed:{
                    filteredArray: function() {
                      var vm = this;
                      return this.anArray.filter(function(element){
                        return element.title.toLowerCase().includes(vm.searchEl.toLowerCase())
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

.search-results .search-filters ul button {
  background-color: white;
  border: 1px solid lightgrey;
  border-radius: 1em;
  cursor: pointer;
  margin-right: 1em;
  margin-bottom: .5em;
  padding: .5em;
}
.search-results .search-filters ul button:hover {
  border: 1px solid black;
}






</style>
