<template >


</template>


<script>

export default {
name: 'ShowMap',

props:
  ['apartmentinfo', 'position'],

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
                zoom: 12,

        });

        this.mapObj.addControl(new window.tt.FullscreenControl());
        this.mapObj.addControl(new window.tt.NavigationControl());
      },

      //FUNZIONE TT aggiunta del singolo marker
      addMarker: function(map, markerLng, markerLat) {

            const tt = window.tt;
            var location = [markerLng, markerLat];
            var popupOffset = 25;

            var marker = new tt.Marker().setLngLat(location).addTo(map);
            var popup = new tt.Popup({ offset: popupOffset });
                  marker.setPopup(popup).togglePopup();
                  this.currentMarkers.push(marker);

      },

    },

    mounted(){
      console.log(this.position)
      this.centerLng=this.position.longitude;
      this.centerLat=this.position.latitude;
      this.getMap(this.centerLng, this.centerLat);
      this.addMarker(this.mapObj, this.centerLng, this.centerLat)

    }

   }

</script>



<style>

  #map-container{
    height:100%;
    width:100%;
  }

</style>
