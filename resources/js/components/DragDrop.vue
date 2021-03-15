<template>
  <div id="app">

    <div class="parent-wrapper">
      <DropImages />
    </div>

    <!-- <div class="parent-wrapper">
      <DropAnImage />
    </div> -->

    <TriggerUploadDialog />

  </div>
</template>

<script>
import DropAnImage from './ddcomponents/DropAnImage.vue'
import DropImages from './ddcomponents/DropImages.vue'
import TriggerUploadDialog from './ddcomponents/TriggerUploadDialog.vue'

export default {
  name: 'DragDrop',
  components: {
    DropAnImage, DropImages, TriggerUploadDialog
  }
}
</script>


<style>
*{
  box-sizing: border-box;
}

html, body, #app{
  width:100%;
  height:100%;
  padding: 0;
  margin: 0;
  /* overflow: hidden; */
}
body{
  background-color: #fff;
  padding:1rem;
}

.parent-wrapper{
  margin-bottom:1rem;
  width:100%;
  height:100%; /* was 50% */
}
</style>
