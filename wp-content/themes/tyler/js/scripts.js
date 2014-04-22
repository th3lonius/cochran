jQuery(document).ready(function($){

  $('.bxslider').bxSlider({
      auto: true,
      speed: 1800,
      mode: 'fade'
  });


$(".links a, .work a").removeAttr("href").addClass('no-ajaxy');

/*RIGHT ANIMATIONS*/
$("body").on('click', '.right-tog', function(event) {
    $('.right').animate({right: 0}),
    $('#content').animate({right: 300}),
    $('#main-menu, .right-tog, .bkgd-desc').fadeOut(300);
});

$("body").on('click', '#content, .click-thru', function(event) {
    var divpos = parseInt($('.right').css('right'));

    if (divpos == 0) {
        $('.right').animate({right: -550}),
        $('#content').animate({right: 0}),
        $('#main-menu, .right-tog, .bkgd-desc').fadeIn(300);
    };
});

/*LINKS ANIMATIONS*/
$("body").on('click', '.links, .links-thru', function(event) {
    $('#footer').animate({bottom: 0}),
    $('#content').animate({bottom: 100}),
    $('#main-menu, #right-tog, .bkgd-desc').fadeOut(300);

    var rightpos = parseInt($('.right').css('right'));

    if (rightpos == 0) {
        $('.right').animate({right: -600}),
        $('#content').animate({right: 0}),
        $('#main-menu, #right-tog, .bkgd-desc').fadeIn(300);
    };
});

/*LEFT ANIMATIONS*/
$("body").on('click', '.work', function(event) {
    $('.left').animate({left: 0}),
    $('#content').animate({left: 300}),
    $('#main-menu, #right-tog, .bkgd-desc').fadeOut(300);
});

$("body").on('click', '#content, .work-link', function(event) {
    var divpos = parseInt($('.left').css('left'));

    if (divpos == 0) {
        $('.left').animate({left: -600}),
        $('#content').animate({left: 0}),
        $('#main-menu, #right-tog, .bkgd-desc').fadeIn(300);
    };
});

/*LINKS ANIMATIONS*/
$("body").on('click', '#content', function(event) {
    var divpos = parseInt($('footer').css('bottom'));

    if (divpos == 0) {
        $('footer').animate({bottom: -200}),
        $('#content').animate({bottom: 0}),
        $('#main-menu, #right-tog, .bkgd-desc').fadeIn(300);
    };
});


/*CLICK THRU FUNCTIONS*/
$("body").on('click', '#work-thru', function(event) {
    $('#left').animate({left: 0}),
    $('#main').animate({left: 300}),
    $('#right').animate({right: -600}),
    $('#main').animate({right: 0}),
    $('#main-menu, #right-tog, .bkgd-desc').fadeOut(300);
});
$("body").on('click', '#about-thru', function(event) {
    $('#right').animate({right: -600}),
    $('#main').animate({right: 0}),
    $('#main-menu, #right-tog, .bkgd-desc').fadeIn(300);
});

});