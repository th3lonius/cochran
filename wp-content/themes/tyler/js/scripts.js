jQuery(document).ready(function($){
	
	$('.work-link, .exhibitions-link').children('a').removeAttr("href");
	
	document.addEventListener('touchstart',this.touchstart);
	document.addEventListener('touchmove',this.touchmove);
	
	function touchstart(e) {
		e.preventDefault()
	}
	
	function touchmove(e) {
		e.preventDefault()
	}

/*SUPERSLIDES*/
$('#slides').superslides({
    play: 8000,
	animation: 'fade',
	animation_speed: 'normal',
    pagination: false
});
	
/*SLIDER NAV*/
$("body").mousemove(function(event){       
    var mouseX = event.pageX / $(window).width();

    if (mouseX < 0.8) {
        $('a.next').stop().animate({
            opacity: 0
        }, 100, "linear");
    } else {
        $('a.next').stop().animate({
            opacity: 1
        }, 100, "linear");
    };
    
    if (mouseX < 0.2) {
        $('a.prev').stop().animate({
            opacity: 1
        }, 100, "linear");
    } else {
        $('a.prev').stop().animate({
            opacity: 0
        }, 100, "linear");
    };
    event.stopPropagation();
});
	
/*MIXITUP*/
$(function () {

	var filterList = {

		init: function () {

			// MixItUp plugin
			// http://mixitup.io
			$('.work-grid').mixitup({
				targetSelector: '.item',
				filterSelector: '.filter',
				effects: ['fade'],
				easing: 'snap',
				// call the hover effect
				onMixEnd: filterList.hoverEffect()
			});				

		},

		hoverEffect: function () {

			// Simple parallax effect
			$('.work-grid .item').hover(
				function () {
					$(this).find('img').stop().animate({top: -12}, 500, 'easeOutQuad');				
				},
				function () {
					$(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');								
				}		
			);				

		}

	};

	// Run the show!
	filterList.init();

});	
	
/*GLOBALS*/
var $rightDiv = $('.right');
var $navsOne = $('header nav, .right-tog, .bkgd-desc');
var $mainNav = $('header nav');
var $rightToggle = $('.right-tog');
var $caption = $('figcaption');
var $content = $('#content'); 
    
/*RIGHT ANIMATIONS*/
$("body").on('click', '.right-tog, .right .exit', function(event) {
	var divpos = parseInt(($rightDiv).css('right'));
	if (divpos == 0) {
		$rightDiv.animate({right: '-100%'});
        $mainNav.fadeIn(800,'easeOutQuad');
		$rightToggle.fadeIn('easeOutQuad');
		$caption.fadeIn('easeOutQuad');
	} else {
		$rightDiv.animate({right: 0});
		$content.animate({right: 100},200,function(){
			$(this).animate({right: 0});
		});
        $mainNav.fadeOut(800,'easeOutQuad');
		$rightToggle.fadeOut('easeOutQuad');
		$caption.fadeOut('easeOutQuad');
	};
});

/*LINKS ANIMATIONS*/
$("body").on('click', '.exhibitions-link', function(event) {
	var toLoad = 'http://cochranmurray.com/wp-content/themes/tyler/exhibition-list.php #exhibition-list';
	$('#exhibitions').append('<div class="spinner"></div>');
	$('#exhibitions').fadeIn().load(toLoad,'',function(){
		$('.spinner').fadeOut();
	});
	$('#exhibitions').animate({top: 0});
    $content.animate({top: 100});
    $navsOne.fadeOut(300);

    var rightpos = parseInt($('.right').css('right'));

    if (rightpos == 0) {
        $rightDiv.animate({right: -600}),
        $content.animate({right: 0}),
        $('#main-menu, #right-tog, .bkgd-desc').fadeIn(300);
    };
});
    
$("body").on('click', '.links, .links-thru', function(event) {
    $('#footer').animate({bottom: 0}),
    $content.animate({bottom: 100}),
    $navsOne.fadeOut(300);

    var rightpos = parseInt($('.right').css('right'));

    if (rightpos == 0) {
        $rightDiv.animate({right: -600}),
        $content.animate({right: 0}),
        $('#main-menu, #right-tog, .bkgd-desc').fadeIn(300);
    };
});

/*LEFT ANIMATIONS*/
$("body").on('click', '.work-link', function(event) {
    $('.left').animate({left: 0}, 1).fadeIn();
    $navsOne.fadeOut(300);
	$('.slides-container li img, #content iframe, .splash').removeClass('notblurry').addClass('blurry');
});

$("body").on('click', '#content, .left .exit', function(event) {
    var divPosition = $('.left').css('display');
    if (divPosition == 'block') {
        $('.left').fadeOut();
        $navsOne.fadeIn(300);
		$('.slides-container li img, #content iframe, .splash').removeClass('blurry').addClass('notblurry');
    };
});

/*LINKS ANIMATIONS*/
$("body").on('click', '#content', function(event) {
    var divpos = parseInt($('footer').css('bottom'));
    var eventspos = parseInt($('#exhibitions').css('top'));

    if (divpos == 0 || eventspos == 0) {
        $('footer').animate({bottom: '-60%'}),
        $('#exhibitions').animate({top: '-60%'}),
        $content.animate({bottom: 0, top: 0}),
        $navsOne.fadeIn(300);
    };
});

/*CLICK THRU FUNCTIONS*/
$("body").on('click', '#work-thru', function(event) {
    $('#left').animate({left: 0}),
    $('#main').animate({left: 300}),
    $('#right').animate({right: -600}),
    $('#main').animate({right: 0}),
    $navsOne.fadeOut(300);
});
$("body").on('click', '#about-thru', function(event) {
    $('#right').animate({right: -600}),
    $('#main').animate({right: 0}),
    $navsOne.fadeIn(300);
});
    

// Find all YouTube videos
var $allVideos = $("iframe[src^='//player.vimeo.com'], iframe[src^='http://www.youtube.com']"),

    // The element that is fluid width
    $fluidEl = $("body");

// Figure out and save aspect ratio for each video
$allVideos.each(function() {

  $(this)
    .data('aspectRatio', this.height / this.width)

    // and remove the hard coded width/height
    .removeAttr('height')
    .removeAttr('width');

});

// When the window is resized
$(window).resize(function() {

  var newWidth = $fluidEl.width();

  // Resize all videos according to their own aspect ratio
  $allVideos.each(function() {

    var $el = $(this);
    $el
      .width(newWidth)
      .height(newWidth * $el.data('aspectRatio'));

  });

// Kick off one resize to fix all videos on page load
}).resize();

});