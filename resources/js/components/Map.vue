<template>
    <div id='map' ref="mapRef"></div>
</template> 
 
<script> 
import { onMounted, ref } from 'vue'

export default { 
  name: 'Map',
  setup() { 
    const mapRef = ref(null); 
    onMounted(() => { 
            const tt = window.tt; 
            var map = tt.map({ 
            key: '3upwkUD0CB8dnyAC2FrLcXE09bNdA5zf', 
            container: mapRef.value, 
            style: 'tomtom://vector/1/basic-main', 
        }); 
        map.addControl(new tt.FullscreenControl()); 
        map.addControl(new tt.NavigationControl());  
        addMarker(map);
    }) 
 
    return { 
      mapRef, 
    }; 
  },
  methods: {
        addMarker(map) { 
            const tt = window.tt; 
            var location = [-121.91595, 37.36729]; 
            var popupOffset = 25; 
        
            var marker = new tt.Marker().setLngLat(location).addTo(map); 
            var popup = new tt.Popup({ offset: popupOffset }); 
            reverseGeocoding(marker, popup); 
            marker.setPopup(popup).togglePopup();  
        },
        reverseGeocoding(marker, popup) { 
            const tt = window.tt; 
            tt.services.reverseGeocode({
                key: '3upwkUD0CB8dnyAC2FrLcXE09bNdA5zf', 
                position: marker.getLngLat() 
            }).go().then( function( result ){ 
                console.log(result.addresses[0].address.freeformAddress); 
                popup.setHTML(result.addresses[0].address.freeformAddress); 
    }) 
} 
  },
       
} 
</script>
<style> 
#map { 
    height: 50vh; 
    width: 50vw; 
} 
</style> 