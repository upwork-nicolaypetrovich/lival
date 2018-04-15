var mob = 767; //mob version
var img_path;  //path to image in lightbox

window.addEventListener("touchmove", Scroll);
window.addEventListener("scroll", Scroll);


$(document).ready(function () {	
	//sliders init
    if ($('#nm-slider-home').length) {
        $('#nm-slider-home').slick({
            arrows: true, 
			dots: false,
			infinite: true,
			autoplay: false,
			draggable: false,
			swipe: false,
			swipeToSlide: false,
			fade: true,
			speed: 1000,
			slidesToShow: 1,
			slidesToScroll: 1,
			prevArrow: $('.prev'),
			nextArrow: $('.next')
		})
    }
	
    if ($('#nm-slider-categories-nav').length) {
        $('#nm-slider-categories-nav').slick({
            arrows: true, 
			dots: false,
			infinite: true,
			autoplay: false,
			draggable: false,
			swipe: true,
			swipeToSlide: true,
			fade: false,
			//speed: 1000,
			slidesToShow: 1,
			slidesToScroll: 1,
			asNavFor: '#nm-slider-categories'
		})
    }
	
    if ($('#nm-slider-categories').length) {
        $('#nm-slider-categories').slick({
            arrows: false, 
			dots: false,
			infinite: true,
			autoplay: false,
			draggable: false,
			swipe: false,
			swipeToSlide: false,
			fade: true,
			//speed: 500,
			slidesToShow: 1,
			slidesToScroll: 1,
			asNavFor: '#nm-slider-categories-nav'
		})
    }

    if ($('.nm-products-slider').length) {
        $('.nm-products-slider').slick({
            arrows: false, 
			dots: false,
			infinite: true,
			autoplay: false,
			draggable: false,
			swipe: true,
			swipeToSlide: true,
			fade: false,
			//speed: 1000,
			slidesToShow: 4,
			slidesToScroll: 1,
			prevArrow: $('.prev'),
			nextArrow: $('.next'),
			responsive: [
				{
				  breakpoint: 1366,
					  settings: {
						slidesToShow: 3
					  }
				},
				{
				  breakpoint: 1024,
					  settings: {
						slidesToShow: 2
					  }
				},
				{
				  breakpoint: 441,
					  settings: {
						slidesToShow: 1
					  }
				}				
			]
		})
    }

	if ($('#nm-slider-product').length) {
        $('#nm-slider-product').slick({
            arrows: false, 
			dots: false,
			infinite: true,
			autoplay: false,
			draggable: false,
			swipe: false,
			swipeToSlide: false,
			fade: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			//asNavFor: '#nm-slider-product-nav'
		})
    }
	
	 if ($('#nm-slider-product-nav').length) {
        $('#nm-slider-product-nav').slick({
            arrows: true, 
			dots: false,
			infinite: true,
			autoplay: false,
			draggable: true,
			swipe: true,
			swipeToSlide: true,
			fade: false,
			slidesToShow: 2,
			slidesToScroll: 1,
			focusOnSelect: true,
			//asNavFor: '#nm-slider-product'
		})
    }
	
	//init lightgallery
	if ($('#nm-slider-product').length) {
        $('#nm-slider-product').slickLightbox ({
			itemSelector: '.nm-slide-img',
			background: 'rgba(0,0,0,.9)'
		})
	}
	
	Scroll();
	slider_prod_pos();
	
	
	//slide slider on produtos page
	var location = window.location.href;
	var slide_index;
	if ( $("body").hasClass("category") && (location.search('/#') !== -1) ) {
		slide_index = /[^/#]*$/.exec(location)[0];
		var slick_index = $("#nm-slider-categories-nav").find(":not(.slick-cloned)[data-catid="+slide_index+"]").data("slick-index");
		$("#nm-slider-categories-nav")[0].slick.slickGoTo(slick_index, true)
	}
})


$(window).resize(function() {
	//expand header when site resizes from mobile to desktop
	if (window.innerWidth > mob) {
		$("nav").removeAttr("style");
		$("nav").removeClass("nm-show");
		$("html").removeClass("nm-fixed");
		$(".nm-menu-expand").removeClass("nm-active")
	}
	
	slider_prod_pos()
})


//add bg to header on page scrool
function Scroll() {
	if ($(window).scrollTop() > 0)
		$("header").addClass("nm-bg")
	else
		$("header").removeClass("nm-bg")
	
	var scrollPos = $(document).scrollTop();
    $('body:not(#nm-inner-page) nav a').each(function () {
        var currLink = $(this);
        var refElement = $(currLink.attr("href"));
        if (refElement.position().top-40 <= scrollPos && refElement.position().top-40 + refElement.outerHeight() > scrollPos) {
            $('nav ul li').removeClass("current");
            currLink.parent("li").addClass("current")
        }
        else
            currLink.parent("li").removeClass("current")
    })
}


//positioning sliders on product page (mobile version)
function slider_prod_pos() {
	if ($(".nm-product-sliders-overwrap").length) {
		var device_pad;
		if (window.innerWidth < 767 && window.innerWidth > 575) {
			device_pad = 60
		}
		else {
			device_pad = 40
		}
		var top_offset = $(".nm-back").outerHeight() + $(".nm-category-name").outerHeight() + device_pad;
		$(".nm-product-sliders-overwrap").css("top", top_offset);
	}
	
	if ($("body").hasClass("single-post") && (!$(".nm-product-sliders-overwrap").length)) {
		$(".nm-text-block").addClass("nm-no-images")
	}
}


//menu toggle
$(".nm-menu-expand").on("click", function(e) {
	e.stopPropagation();
	e.preventDefault();
	if (!($(this).hasClass("nm-active"))) {
		$(this).addClass("nm-active");
		$("html").addClass("nm-fixed");
		$("nav").addClass("nm-show");
		$("nav").css("display","table").fadeIn(200)
	}
	else {
		$(this).removeClass("nm-active");
		$("nav").fadeOut(300);
		$("html").removeClass("nm-fixed");
		setTimeout(function(){$("nav").removeClass("nm-show")},200)
	}
})


//navigation by sections from menu links 
$("body:not(#nm-inner-page) nav a").on("click", function(e){
	e.preventDefault();
	$("nav li").removeClass("current");
	$(this).parent("li").addClass("current");
	var target = this.hash,
		menu = target;
	$target = $(target);
	$('html, body').stop().animate({
		'scrollTop': $target.offset().top
	}, 500, 'swing', function () {})
	
	if (window.innerWidth <= mob) {
		$(".nm-menu-expand").removeClass("nm-active");
		$("nav").fadeOut(300);
		$("html").removeClass("nm-fixed")
	}
})


//anchors
$(".nm-anchor").on("click", function (e){
    e.preventDefault();
    var id = $(this).attr('href'),
    top = $(id).offset().top;
    $('body,html').animate({ scrollTop: top }, 500)
})


//sliders products navigation
$(".product-prev").on("click",function(e){
	e.preventDefault();
	$(".nm-categories-slide.slick-active .nm-products-slider").slick('slickPrev')
})

$(".product-next").on("click",function(e){
	e.preventDefault();
	$(".nm-categories-slide.slick-active .nm-products-slider").slick('slickNext')
})


//custom navigation betweeen product slider slides
$("#nm-slider-product-nav .nm-slide-img").on("click", function(){
	var slider = $(this).closest("#nm-slider-product-nav");
	
	setTimeout(function(){
		var cur = slider.slick('slickCurrentSlide');
		$("#nm-slider-product")[0].slick.slickGoTo(cur)
	},10)
})


// ajax form sending
$(function() {
	$('form').submit(function(e) {
		var $form = $(this);
		$.ajax({
			type: $form.attr('method'),
			url: $form.attr('action'),
			data: $form.serialize()
		}).done(function() {
			console.log('form sent');
			$form.find(".nm-success-block").show()
		}).fail(function() {
			console.log('form fail');
		});
		e.preventDefault(); 
	});
});

