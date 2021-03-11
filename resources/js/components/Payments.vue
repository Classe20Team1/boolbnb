<template>
     <!-- <div id="payments" class="container"> -->
        <div class="payment-container">


                <div class="title-container">
                     <h3> Payment Information </h3>
                </div>

                    <form>

                        <div class="sponsor-amount-container">

                              <div class="checkbox-container">

                                    <div class="ck-el" v-for="(type, index) in  sponsorTypes" >
                                        <input @click="findSponsor(type.id)" type="radio" v-model="amount" name="sponsor" :value="amount"> <span> <em>{{type.description}}</em> </span>
                                    </div>

                              </div>

                              <div class="amount-container p-el">
                                    <label for="amount">Amount</label>

                                    <div class="input-amount-container">
                                        <div class="valuta"><span class="input-group-text">EUR</span></div>
                                        <input  id="amount" v-model="amount" class="form-control" placeholder="Enter Amount">
                                    </div>
                              </div>

                        </div>




                        <div class="credit-card-container p-el">
                            <label>Credit Card Number</label>
                            <div id="creditCardNumber" class="form-control"></div>
                        </div>



                            <div class="ed-cvv-container p-el">

                                <div class="ed-container">
                                    <label>Expire Date</label>
                                    <div id="expireDate" class="form-control"></div>
                                </div>

                                <div class="cvv-container">
                                    <label>CVV</label>
                                    <div id="cvv" class="form-control"></div>
                                </div>

                            </div>

                            <div class="buttons-container p-el"   v-bind:class = "(nonce)?'hide':'display' ">

                                  <button class="credit-card-button" @click.prevent="payWithCreditCard">Pay with Credit Card</button>

                                  <div id="paypalButton"></div>

                            </div>

                            <div class="buttons-container p-el"  >

                                  <div class="alert alert-success" v-if="nonce">
                                      Successfully generated nonce. Waiting for reply.
                                  </div>

                                  <div class="alert alert-danger" v-if="error">
                                      {{ error }}
                                  </div>

                            </div>

                    </form>


        </div>
    <!-- </div> -->

</template>
<script>
import braintree from 'braintree-web';
import paypal from 'paypal-checkout';

export default {

  props:['appartamento','sponsortypes'],

    data() {
        return {
            sandbox:process.env.MIX_BRAINTREE_SANDBOX,
            hostedFieldInstance: false,
            nonce: "",
            error: "",
            amount: 0,
            apartmentId:this.appartamento.id,
            sponsorTypes:this.sponsortypes,
            sponsorId:"",
        }
    },
    methods: {
        findSponsor(id){
          let sponsor = this.sponsorTypes.find(function(el){
            return el.id == id
          })

          this.amount = sponsor.price / 100,
          console.log(this.amount)
          this.sponsorId = sponsor.id,
          console.log(this.sponsorId)
        },

        payWithCreditCard() {
            console.log(this.apartmentId)
            if(this.hostedFieldInstance)
            {
                this.error = "";
                this.nonce = "";
                this.hostedFieldInstance.tokenize().then(payload => {
                    console.log(payload);
                    this.nonce = payload.nonce;
                })
                .catch(err => {
                    console.error(err);
                    this.error = err.message;
                })
            }
        }
    },

    watch:{
      'nonce':function() {

        axios.post(
          "http://localhost:8000/payment/checkout",
        {
          "amount":this.amount,
          "nonce":this.nonce,
          "apartment_id":this.apartmentId,
          "sponsortype_id":this.sponsorId,
        },
        )
        .then(response => {

                    this.tryArray = response.data;
                    console.log(this.tryArray);

                  })
      },
    },

    mounted() {
        braintree.client.create({
            authorization:this.sandbox //'sandbox_mf99dc7g_y34kzz5j4tc99xnb',
        })
        .then(clientInstance => {
            let options = {
                client: clientInstance,
                styles: {
                    input: {
                        'font-size': '14px',
                        'font-family': 'Open Sans'

                    }
                },
                fields: {
                    number: {
                        selector: '#creditCardNumber',
                        placeholder: 'Enter Credit Card'
                    },
                    cvv: {
                        selector: '#cvv',
                        placeholder: 'Enter CVV'
                    },
                    expirationDate: {
                        selector: '#expireDate',
                        placeholder: '00 / 0000'
                    }
                }
            }
            return Promise.all([
                braintree.hostedFields.create(options),
                braintree.paypalCheckout.create({ client: clientInstance })
            ])
        })
        .then(instances => {
            const hostedFieldInstance    = instances[0];
            const paypalCheckoutInstance = instances[1];
            // Use hostedFieldInstance to send data to Braintree
            this.hostedFieldInstance = hostedFieldInstance;
            // Setup PayPal Button
                return paypal.Button.render({
                    env: 'sandbox',
                    style: {
                        label: 'paypal',
                        size: 'responsive',
                        shape: 'rect'
                    },
                    payment: () => {
                        return paypalCheckoutInstance.createPayment({
                                flow: 'checkout',
                                intent: 'sale',
                                amount: parseFloat(this.amount) > 0 ? this.amount : 10,
                                displayName: 'Braintree Testing',
                                currency: 'EUR'
                        })
                    },
                    onAuthorize: (data, options) => {
                        return paypalCheckoutInstance.tokenizePayment(data).then(payload => {
                            console.log(payload);
                            this.error = "";
                            this.nonce = payload.nonce;
                        })
                    },
                    onCancel: (data) => {
                        console.log(data);
                        console.log("Payment Cancelled");
                    },
                    onError: (err) => {
                        console.error(err);
                        this.error = "An error occurred while processing the paypal payment.";
                    }
                }, '#paypalButton')
        })
        .catch(err => {
        });
    }
}
</script>

<style scoped>

#amount,#creditCardNumber, #creditCardNumber, #cvv, #expireDate{
  height:30px;
  border:1px solid lightgrey;
  border-radius:5px;
}

.p-el{
  margin-top: 10px;
}

.sponsor-amount-container{
  display:flex;
  align-items: center;
  justify-content: space-between;
  margin-top: 15px;
}

.checkbox-container{
display:flex;
flex-direction: column;
border:2px solid pink;
border-radius: 10px;
padding:10px;
}

.input-amount-container{
  display:flex;
  align-items: center;
}

.valuta{
  margin-right: 10px;
}
.payment-container{
  padding:20px;
  border: 1px solid lightgray;
  border-radius: 10px;

}

.ed-cvv-container{
  display:flex;
}

.credit-card-button{
  width:100%;
  height:45px;
  color:white;
  font-weight: 600;
  font-size: 15px;
  background-color:#4287f5;
  border:0px;
  border-radius:5px;
}

.credit-card-button:hover{
  opacity:0.8;
}

.hide{
  display:none;
}

.display{
  display:contents;
}






</style>
