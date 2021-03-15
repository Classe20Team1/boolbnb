<template>

      <!-- <hooper group="group1" >

        <slide>

          <div class="img-container">

            <img src="https://upload.wikimedia.org/wikipedia/commons/5/50/Bodiam-castle-10My8-1197.jpg" alt="">

          </div>

        </slide>

      </hooper> -->


      <hooper group="group1" :settings="hooperSettings">

        <slide v-for="(slide, indx) in images" :key="indx" :index="indx">

          <div class="img-container-hooper">

            <img :src="slide.path" alt="">

          </div>

        </slide>

        <!-- <slide>

          <div class="img-container-hooper">

            <img src="https://upload.wikimedia.org/wikipedia/commons/5/50/Bodiam-castle-10My8-1197.jpg" alt="">

          </div>

        </slide>

        <slide>

          <div class="img-container-hooper">

            <img src="https://upload.wikimedia.org/wikipedia/commons/5/50/Bodiam-castle-10My8-1197.jpg" alt="">

          </div>

        </slide>

        <slide>

          <div class="img-container-hooper">

            <img src="https://upload.wikimedia.org/wikipedia/commons/5/50/Bodiam-castle-10My8-1197.jpg" alt="">

          </div>

        </slide>

        <slide>

          <div class="img-container-hooper">

            <img src="https://upload.wikimedia.org/wikipedia/commons/5/50/Bodiam-castle-10My8-1197.jpg" alt="">

          </div>

        </slide> -->







        <hooper-navigation slot="hooper-addons"></hooper-navigation>

        <hooper-pagination slot="hooper-addons"></hooper-pagination>

      </hooper>


</template>

<script>
  import { Hooper,
           Slide,
           Navigation as HooperNavigation,
           Pagination as HooperPagination } from 'hooper';
  import 'hooper/dist/hooper.css';



  export default {
    name: 'my-hooper',
    components: {
      Hooper,
      Slide,
      HooperPagination,
      HooperNavigation
    },

    props:['imgs','numofitems'],

    data() {
    return {
      hooperSettings: {
        itemsToShow: this.numofitems,
        centerMode: false,
        infiniteScroll:true,
        autoPlay: true,
        playSpeed: 3500,


      },

      images:this.imgs,
    };
  },

  mounted(){
    console.log(this.imgs.map(el=>el.path))
    // element.services.map(el=>el.name))
  }
}
</script>

<style scoped>

.hooper{
  /* border:5px solid black; */
  height:320px;;
  width:100%;
}

 .hooper-slide{
 position:relative;
 /* border:2px solid red; */
 /* margin-right:10px;
 margin-left:10px; */
 /* height:350px;
 width:30%; */
}

/* .img-container-hooper{
  position:relative;
  border:2px solid red;
  margin-right:10px;
  margin-left:10px;
  height:350px;
  width:500px;
} */

img{

  padding:10px;
  position:absolute;
  top:50%;
  left:50%;
  transform: translate(-50%, -50%);
  width:100%;
  overflow:hidden;
  border-radius:15px;

}

</style>
