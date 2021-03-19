<template>

  <section class="dashboard-control-container">

    <h2>Dashboard</h2>

    <div class="dashboard-username">
      <!-- <b class="dashboard-font-helper">{{$user->username}}</b> · {{$user->email}} -->
    </div>

    <ul class="button-list-container d-flex">

        <li class="dashboard-card">

            <!-- <button href="{{route('user.edit')}}">

                    <i class="far fa-id-card"></i>
                    <span class="">Modifica informazioni personali</span>

            </button> -->

        </li>

        <li class="dashboard-card">

            <!-- <button href="{{route('apartments.index')}}">

                  <i class="fas fa-house-user"></i>
                  <span class="">I miei appartamenti</span>

            </button> -->

            <button v-on:click="getIndex()">

                  <i class="fas fa-house-user"></i>
                  <span class="">I miei appartamenti</span>

            </button>



        </li>

        <li class="dashboard-card">

            <!-- <button href="{{route('apartments.create')}}">

                    <i class="fas fa-plus-circle"></i>
                    <span class="">Inserisci un nuovo appartamento</span>

            </button> -->

        </li>

        <li class="dashboard-card">

            <button href="">

                    <i class="fas fa-plus-circle"></i>
                    <span class="">Statistiche</span>

            </button>

        </li>

    </ul>
  </section>

</template>

<script>

export default{
  name: "Dashboard",
  props:['user'],


  data(){
          return{

            userId:this.user.id,

          }
  },

  methods:{
    getIndex: function(){
      axios.post("http://localhost:8000/api/admin/apartments",
      {
        "id":this.userId,

      },
      {
        headers: {
        "Content-type": "application/json; charset=UTF-8",
        }
      },
    )
      .then(response => {
          console.log(response)
      })
    },
  },

  created() {


    console.log(this.userId)


  },

}


</script>

<style>

.dashboard-control-container{
  border:2px solid red;
  width:200px;
}

.button-list-container{
  flex-direction: column;
  justify-content: space-between;
  list-style: none;
}

.button-list-container li{
    display:flex;
    height:40px;
    margin-top:15px;
}

.button-list-container li  button{
      border-radius: 5px;
      background-color: white;
      color:$bnbpink;
      border:2px solid lightgrey;
      width:250px;
}


</style>
