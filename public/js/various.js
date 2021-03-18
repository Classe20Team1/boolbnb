$.fn.followTo = function (pos) {
    var $this = this,
        $window = $(window);

    $window.scroll(function (e) {
        if ($window.scrollTop() > pos) {
            $this.css({
                position: 'absolute',
                top: pos
            });
        } else {
            $this.css({
                position: 'fixed',
                top: 0
            });
        }
    });
};

$('#navi').followTo(650);

$( "#login-button" ).click(function() {
  $( "#login-list" ).slideToggle(300);
});


var bodyFormData = new FormData();

function search(){

      axios.post(
        "search",
        {
          "city":JSON.stringify("genova"),
        },
        // {
        //   headers: {
        //   "Content-type": "application/json; charset=UTF-8",
        //   }
        // }

      )
    .then(response => {
       console.log(response)

      }
    )
    }


// function searched(){
//
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//
//     $.ajax({
//         url:"search",
//         data:{"genova"},
//         type:'post',
//         success:  function (response) {
//             alert(response);
//         },
//         error: function(x,xs,xt){
//             console.log(x, xs , xt);
//
//         }
//     })
//   };
