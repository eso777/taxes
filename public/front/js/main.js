new WOW().init();

var slider = new MasterSlider();
slider.setup('of-home' , {
        width:1170,
        height:500,
        space:5,
        fullwidth:true,
        autoplay:true,
        loop:true,
        // more slider options goes here...
    });
slider.control('arrows'); // here we've added arrow control to the slider.
slider.control('bullets' , {autohide:false  , dir:"h", align:"top"});
//slider.control('circletimer' , {color:"#479a1b" , stroke:20});

var owl = $("#owl-demo");
owl.owlCarousel({
    slideSpeed : 300,
    singleItem:true
});
// Custom Navigation Events
$(".next").click(function(){
    owl.trigger('owl.next');
})
$(".prev").click(function(){
    owl.trigger('owl.prev');
})


$(window).scroll(function(){
	if ($(this).scrollTop() > 130) {
		$('.scrollToTop').fadeIn();
	} else {
		$('.scrollToTop').fadeOut();
	}
});
$('.scrollToTop').click(function(){
	$('html, body').animate({scrollTop : 0},800);
	return false;
});


var map = new GMaps({
    div: '#map',
    lat: 30.0548547,
    lng: 31.3384734
});
map.addMarker({
    lat: 30.0548547,
    lng: 31.3384734,
    title: '18 Mustafa El Nahas Street, Madinet El-Nasr. Cairo, Egypt',
});