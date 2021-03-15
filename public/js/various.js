// window.onscroll = function(){
//
//    if(window.scrollY >= 600) { // change target to number
//       document.getElementById('navi').style.position = 'relative';
//       document.getElementById('navi').css("top" , 600)
//    }
//    if(window.scrollY === 750){
//      // document.getElementById('navi').style.position = 'absolute';
//      // document.getElementById('navi').style.top='600';
//       // $("#navi").fadeOut(1000);
//    }
//    else{
//      document.getElementById('navi').style.position = 'fixed';
//
//
//    }
//
// };

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

$('#navi').followTo(752);
