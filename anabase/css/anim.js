//
var last_pos = {}
$('.item__link').on('mousemove touchmove',function(event){
  if (typeof(last_pos.x) != 'undefined') {
            var deltaX = last_pos.x - event.clientX;
            //window.console.log(deltaX);
            if (deltaX > 0) {
                //left
                $(this).removeClass('rtl').addClass('ltr');
            } else if (deltaX < 0) {
                //right
                $(this).removeClass('ltr').addClass('rtl');
            } 
        }
        last_pos = {
            x : event.clientX
        };
});

function reveal_zoom() {
    var reveals = document.querySelectorAll(".reveal_zoom");
    for (var i = 0; i < reveals.length; i++) {
      var windowHeight = window.innerHeight;
      var elementTop = reveals[i].getBoundingClientRect().top;
      var elementVisible = 150;
      if (elementTop < windowHeight - elementVisible) {
        reveals[i].classList.add("active");
      }
    }
  }