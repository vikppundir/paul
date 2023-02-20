// open submenu
// $('li.has-submenu a').click(function(e){
//     e.preventDefault();
//     if($(this).parent().hasClass('opensubmenu')){
//         $(this).parent().removeClass('opensubmenu');
//     }else{
//         $(this).parent().addClass('opensubmenu');
//     }
// })

$('.has-submenu ul').hide();
$(".has-submenu a").click(function () {
	$(this).parent(".has-submenu").children("ul").slideToggle("100");
	// $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
});

function openreport(evt, reportName) {
	var i, tabcontent, tablinks;
	tabcontent = document.getElementsByClassName("tabcontent");
	for (i = 0; i < tabcontent.length; i++) {
	  tabcontent[i].style.display = "none";
	}
	tablinks = document.getElementsByClassName("tablinks");
	for (i = 0; i < tablinks.length; i++) {
	  tablinks[i].className = tablinks[i].className.replace(" active", "");
	}
	document.getElementById(reportName).style.display = "block";
	evt.currentTarget.className += " active";
  }
  document.getElementById("defaultOpen").click();

//   slider
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
	autoplay:true,
    nav:true,
	autoplayHoverPause:true,
	autoplayTimeout:2000,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})
// menu
// Menu
var menu = "close";
$(".dash-profile").click(function(){
  if(menu == "close"){
    $(".hamburgermenumain").removeClass('closemenu');
    $(".hamburgermenumain").addClass('openmenu');
    menu = "open";
  }else{
    $(".hamburgermenumain").removeClass('openmenu');
    $(".hamburgermenumain").addClass('closemenu');
    menu = "close";
  }
})