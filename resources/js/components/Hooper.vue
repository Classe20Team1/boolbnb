<template>

      <Hooper class="">

        <Slide>

            <div class="ciao">

            </div>

        </Slide>

      </Hooper>

</template>

<script>
  import { Hooper, Slide } from 'hooper';
  import 'hooper/dist/hooper.css';



  export default {
    name: 'Hooper',
    components: {
      Hooper,
      Slide
    },

    props:['index'],

    data() {
    return {
      hooperSettings: {
        itemsToShow: 2,
        centerMode: true,
        breakpoints: {
          800: {
            centerMode: false,
            itemsToShow: 3
          },
          1000: {
            itemsToShow: 6,
            pagination: 'fraction'
          }
        }
      }
    };
  }
}
</script>

<style >

  .ciao{
    height:500px;
    width:500px;
    border:2px solid red;
  }
</style>
