<template>

    <div class="modal-message-component">


      <button class="modal-message-component-button" @click="showModal = true">Contatta l'host!</button>

            <transition name="modal">

              <ContactUs v-if="showModal" @close="showModal = false"
                        class="modal-container"/>
              <!-- <div class="modal-mask">
                <div class="modal-wrapper">
                  <div class="modal-container">

                    <div class="modal-header">
                      <slot name="header">
                        default header
                      </slot>
                    </div>

                    <div class="modal-body">
                      <slot name="body">
                        default body
                      </slot>
                    </div>

                    <div class="modal-footer">
                      <slot name="footer">
                        default footer

                          OK
                        </button>
                      </slot>
                    </div>
                  </div>
                </div>
              </div> -->
              <!-- <button class="modal-default-button" @click="$emit('close')"> -->
            </transition>


          </div>

</template>


<script>

  import ContactUs from './Message'

  export default{
    name: "Modal",

    components:{
      ContactUs,
    },
    data(){
            return{
              showModal: false,
            }
    }
  }

</script>


<style>
.modal-mask {
position: fixed;
z-index: 9998;
top: 0;
left: 0;
width: 100%;
height: 100%;
background-color: rgba(0, 0, 0, .5);
display: table;
transition: opacity .3s ease;
}

.modal-message-component{
  display:flex;
}

.modal-message-component-button{
  height:40px;
  width:160px;
  border-radius: 10px;
  background-color: white;
}

.modal-wrapper {
display: table-cell;
vertical-align: middle;
}

.modal-container {
width: 300px;
margin: 0px auto;
padding: 20px 30px;
background-color: #fff;
border-radius: 2px;
box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
transition: all .3s ease;
font-family: Helvetica, Arial, sans-serif;
}

.modal-header h3 {
margin-top: 0;
color: #42b983;
}

.modal-body {
margin: 20px 0;
}

.modal-default-button {
float: right;
}

/*
* The following styles are auto-applied to elements with
* transition="modal" when their visibility is toggled
* by Vue.js.
*
* You can easily play with the modal transition by editing
* these styles.
*/

.modal-enter {
opacity: 0;
}

.modal-leave-active {
opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
-webkit-transform: scale(1.1);
transform: scale(1.1);
}

</style>
