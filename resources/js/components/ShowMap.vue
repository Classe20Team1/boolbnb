<template >


</template>


<script>

export default {
name: 'ShowMap',

props:
  ['apartmentinfo'],

  data(){
          return{

            centerLng:null,
            centerLat:null,
            markersArray:[],
            mapObj:{},
            currentMarkers:[],
            counter:2,

          }
  },

    methods:{

      //FUNZIONE TT creazione mappa
      getMap:function(centerLng, centerLat){
        this.mapObj = window.tt.map({
                key:'biGZFmMrEVJLLaCv4NrzRwGycnhKG2Fz',
                container:'map-container',
                center:{lng: centerLng, lat: centerLat},
                zoom: 10,

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


    mounted(){

      this.centerLng=0;
      this.centerLat=0;
      this.getMap(this.centerLng, this.centerLat);
    }

   }



</script>



<style>

  #map-container{
    height:100%;
    width:100%;
  }

</style>
