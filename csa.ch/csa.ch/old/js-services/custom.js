$(function() {

	$('.owl-carousel-customization').owlCarousel({
		loop:true,
		lazyLoad:true,
		margin:0,
		autoplay:true,
		autoplayTimeout:10000,
		smartSpeed: 2000,
		touchDrag  : true,
		mouseDrag  : true,
		dots: false,
		nav:true,
		center: true,
		responsiveClass:true,
		responsive:{
			1366:{
				items:3,
			},
			1024:{
				items:3,
			},
			640:{
				items:2,
			},
			0:{
				items:1,
			}
		}
	})

	$('.owl-carousel-clientreviews').owlCarousel({
		loop:true,
		lazyLoad:true,
		margin:20,
		autoplay:true,
		autoplayTimeout:10000,
		smartSpeed: 2000,
		touchDrag  : true,
		mouseDrag  : true,
		dots: true,
		nav:false,
		responsiveClass:true,
		responsive:{
			1366:{
				items:4,
			},
			1280:{
				items:4,
			},
			1024:{
				items:4,
			},
			640:{
				items:2,
			},
			0:{
				items:1,
			}
		}
	})
});