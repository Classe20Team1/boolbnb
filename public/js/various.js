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

$('#navi').followTo(750);

$( "#login-button" ).click(function() {
  $( "#login-list" ).slideToggle(300);
});

$( "#services-button" ).click(function() {
  $( "#services-list" ).slideToggle(300);
  $(this).text( $("#services-button").text() == 'Mostra più filtri' ? "Mostra meno filtri" : "Mostra più filtri");
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
