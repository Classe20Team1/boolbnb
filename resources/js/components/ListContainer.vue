<template>

            <ul>
                  <slot name = "items">

                  </slot>
            </ul>

</template>


<script>

          export default{
            name: 'ListContainer',
          }

</script>


<style scoped>

ul{
  display:flex;
  flex-direction: column;
  list-style: none;
  margin:0;
  padding:0;
}

</style>
