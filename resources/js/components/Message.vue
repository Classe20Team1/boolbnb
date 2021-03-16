<template>

    <div class="container">

        <input class="message-component-close-button" type="button" name="" value="X" @click="$emit('close')">

        <form @submit.prevent="sendEmail">

          <div class="inputs-container-message-component">

              <div class="">

                    <label>Name</label>

                    <input
                      type="text"
                      v-model="name"
                      name="name"
                      placeholder="Your Name"
                    >

              </div>

              <div class="">

                    <label>Email</label>

                    <input
                      type="email"
                      v-model="email"
                      name="email"
                      placeholder="Your Email"
                      >

              </div>

          </div>

          <label>Message</label>

          <textarea
            name="message"
            v-model="message"
            cols="30" rows="5"
            placeholder="Message">
          </textarea>

          <div class="submit-container-message-component">

               <input type="submit" value="Send" @click="$emit('close')">
            
         </div>

        </form>

    </div>

</template>

<script>

    import emailjs from 'emailjs-com';

    export default {
      name: 'ContactUs',
      data() {
        return {
          name: '',
          email: '',
          message: ''
        }
      },

      methods: {
        sendEmail(e) {
          try {
            emailjs.sendForm('service_vgb8gzt', 'template_bq3wguu', e.target,
            'user_r8PnN7tmY0EPHc0NbqUqQ', {
              name: this.name,
              email: this.email,
              message: this.message
            })

          } catch(error) {
              console.log({error})
          }
          // Reset form field
          this.name = ''
          this.email = ''
          this.message = ''
        },
      }
    }

</script>

<style scoped>
* {box-sizing: border-box;}

.container {
  position:relative;
  display: block;
  margin:auto;
  text-align: center;
  background-color: #f2f2f2;
  padding: 20px;
  width: 100%;
  border-radius: 15px;

}

.message-component-close-button{
  position:absolute;
  right:20px;
  top:10px;
  border:0px;
  font-size: 20px;
  color:lightgrey;
  cursor:pointer;
  line-height: 20px;
  height: 20px;
  width:20px;
  border-radius: 5px;
}

.message-component-close-button:hover{
  background-color: grey;
}

.inputs-container-message-component{
  display:flex;
}

.submit-container-message-component{
  display:flex;
  justify-content: flex-end;
}

label {
  float: left;
  font-size: 15px;
}

input[type=text], [type=email],textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 10px;
  resize: vertical;
}

input[type=submit] {
  background-color: #FF385C;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}
</style>
