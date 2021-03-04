<template>
  <div id = "app" class="container">

    <div class="row">

      <div class="col">

        <div class="advanced-search">
          <div class="search-results">
            <h5>Oltre 300 alloggi</h5>
            <h1>Alloggi: {{filteredArray.length}}</h1>
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


            <input class="searchinput" v-model='searchEl' type="text" name="" value="" placeholder="Cerca...">


                            <button v-on:click='printArray' type="button" name="button">schiacciami</button>



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
          name: "Main",

          props:['ciccio','services', 'usersearch'],


          components:{
            ListItem,
            ListContainer
          },
          data(){
                  return{
                      anArray: this.ciccio,
                      userSearch:this.usersearch,
                      anotherArray:this.services,
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


          methods:{
                getServices(){
                  axios.get("http://localhost:8000/api/services")
                  .then(response => {
                    console.log(response);
                  })
                },

                getApartments(){
                  axios.post(
                    "http://localhost:8000/api/search/apartments",
                    {
                      city: this.usersearch,
                      guests: 2,
                    },

                    {
                      headers: {
                      "Content-type": "application/json; charset=UTF-8",
                      }
                    }
                  )
                  .then(response => {
                    console.log(response);
                  })
                },

                printArray:function(){
                  console.log(this.anotherArray)
                },
          },


          mounted() {
            this.getServices();
            this.getApartments();

          },

    };






</script>


<style>

.advanced-search {
  display: flex;
}

.searchinput {
  margin-left: 40px;
}

.search-results {
  width: 55%;
  padding: 3em;
  padding-right: 1em;
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
