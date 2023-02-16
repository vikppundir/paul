    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script>
        $(".menuicon").click(function () {
            $(".main_nav_menu").css("right", "0px")
        })
        $(".closmenubtn").click(function () {
            $(".main_nav_menu").css("right", "-100%")
        })

        $('#owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        })
        $('#owl-carousels').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        })
        $('#owl-carouselss').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })

var poppup = document.getElementById("popp");
        var popbg = document.getElementById("popbg");
        var phoneno=document.getElementById("phoneno");
        var back=document.getElementsByClassName('bacground')[0];
        var ph=document.getElementById("ph");
    function pop() {
        poppup.classList.toggle("sho");
        popbg.classList.toggle("opacity1");
        back.classList.toggle("backnone");

      }
      function remove(){
        poppup.classList.remove("sho");
        popbg.classList.remove("opacity1");
        back.classList.toggle("backnone");
      }
    </script>

<script>
$(document).ready(function(){

var current_fs, next_fs, previous_fs; //fieldsets
var opacity;
var current = 1;
var steps = $("fieldset").length;

setProgressBar(current);

$(".next").click(function(){

current_fs = $(this).parent();
next_fs = $(this).parent().next();

//Add Class Active
$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
next_fs.show();
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
next_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(  current);
});

$(".previous").click(function(){

current_fs = $(this).parent();
previous_fs = $(this).parent().prev();

//Remove class active
$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
previous_fs.show();

//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
previous_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(--current);
});

function setProgressBar(curStep){
var percent = parseFloat(100 / steps) * curStep;
percent = percent.toFixed();
$(".progress-bar").css("width",percent +"%");
}

$(".submit").click(function(){
return false;
})

});


// http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/examples/

$(document).ready(function() {

	$('#servicesarea').tagsinput({
		trimValue: true,
		confirmKeys: [13, 44, 32],
		focusClass: 'my-focus-class'
	});
	
	$('.bootstrap-tagsinput input').on('focus', function() {
		$(this).closest('.bootstrap-tagsinput').addClass('has-focus');
	}).on('blur', function() {
		$(this).closest('.bootstrap-tagsinput').removeClass('has-focus');
	});
	
});


</script>

