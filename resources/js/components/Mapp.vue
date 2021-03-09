<template >

</template>

<script>

export default {
  name: 'Mapp',

  props:
    ['markersinfo', 'usersearch'],

  data(){
          return{

            userSearch:this.usersearch,
            centerLng:null,
            centerLat:null,
            markersArray:[],
            mapObj:{},
            currentMarkers:[],
            counter:0,

          }
  },

    methods:{
      //FUNZIONE Richiesta API TT centro Mappa in base alla ricerca effettuata dall'utente
      getMapCenter:function(userSearch){
          axios.get("https://api.tomtom.com/search/2/geocode/" + userSearch + ".json",{
          params:{
            "key":'biGZFmMrEVJLLaCv4NrzRwGycnhKG2Fz',
          }
        })
        .then((result)=>{
          this.centerLat=result.results.position.lat
          this.centerLng=result.results.position.lon
        })
      },

      //FUNZIONE TT creazione mappa
      getMap:function(centerLng, centerLat){
        this.mapObj = window.tt.map({
                key:'biGZFmMrEVJLLaCv4NrzRwGycnhKG2Fz',
                container:'myMap',
                center:{lng: centerLng, lat: centerLat},
                zoom: 13,

        });

        this.mapObj.addControl(new window.tt.FullscreenControl());
        this.mapObj.addControl(new window.tt.NavigationControl());
      },

      //FUNZIONE TT aggiunta del singolo marker
      addMarker: function(map, markerLng, markerLat, title) {

            const tt = window.tt;
            var location = [markerLng, markerLat];
            var popupOffset = 25;

            var marker = new tt.Marker().setLngLat(location).addTo(map);
            var popup = new tt.Popup({ offset: popupOffset }).setHTML(title);
                  marker.setPopup(popup).togglePopup();
                  this.currentMarkers.push(marker);

      },

    },

    watch:{
      'markersinfo':function() {
        let that = this;
        this.markersArray=this.markersinfo;
        //this.getMapCenter(this.userSearch);

        if(this.counter== 0){

          //INIZIALIZZA LA MAPPA
          this.centerLng=this.markersArray[0].position.longitude;
          this.centerLat=this.markersArray[0].position.latitude;

          this.getMap(this.centerLng, this.centerLat);


          this.markersArray.forEach(function(el){
            that.addMarker(that.mapObj, el.position.longitude, el.position.latitude,el.title)
          })

          this.counter++;

        }else{
          
          //AGGIORNA I MARKERS
          this.currentMarkers.forEach(function(el){
            el.remove();
          });

          this.markersArray.forEach(function(el){
            that.addMarker(that.mapObj, el.position.longitude, el.position.latitude, el.title)

          })

        }

      }

    },

   }

</script>


<style>

</style>
