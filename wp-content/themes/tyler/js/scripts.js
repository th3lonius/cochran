jQuery(document).ready(function($){

$('#slides').superslides({
    play: 8000,
	animation: 'fade',
	animation_speed: 'normal',
    pagination: false
});
    
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

$(".links a, .work a, .events a, .about-link a").removeAttr("href").addClass('tooltips');
$(".slides-navigation a").addClass('no-ajaxy');

/*RIGHT ANIMATIONS*/
$("body").on('click', '.right-tog', function(event) {
    $('.right').animate({right: 0}),
    $('#content').animate({right: 300}),
    $('header nav, .right-tog, .bkgd-desc').fadeOut(300);
});

$("body").on('click', '#content, .click-thru', function(event) {
    var divpos = parseInt($('.right').css('right'));

    if (divpos == 0) {
        $('.right').animate({right: -550}),
        $('#content').animate({right: 0}),
        $('header nav, .right-tog, .bkgd-desc').fadeIn(300);
    };
});

/*LINKS ANIMATIONS*/
$("body").on('click', '.events', function(event) {
    $('#events').animate({top: 0}),
    $('#content').animate({top: 100}),
    $('header nav, #right-tog, .bkgd-desc').fadeOut(300);

    var rightpos = parseInt($('.right').css('right'));

    if (rightpos == 0) {
        $('.right').animate({right: -600}),
        $('#content').animate({right: 0}),
        $('#main-menu, #right-tog, .bkgd-desc').fadeIn(300);
    };
});
    
$("body").on('click', '.links, .links-thru', function(event) {
    $('#footer').animate({bottom: 0}),
    $('#content').animate({bottom: 100}),
    $('header nav, #right-tog, .bkgd-desc').fadeOut(300);

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
    $('header nav, #right-tog, .bkgd-desc').fadeOut(300);
});

$("body").on('click', '#content, .work-link, a[role=close]', function(event) {
    var divpos = parseInt($('.left').css('left'));

    if (divpos == 0) {
        $('.left').animate({left: -1000}),
        $('#content').animate({left: 0}),
        $('header nav, #right-tog, .bkgd-desc').fadeIn(300);
    };
});
    
$("body").on('click', 'header nav', function(event) {
    var target = $( event.target );
    var divwidth = parseInt($(this).css('width'));
    
    if (divwidth < 130 & target.is('header nav') ) {
        $(this).animate({width: 130}, 100),
        $('header h1').animate({left: 160}, 150, function(){
            $(this).delay(60).animate({left: 140}, 100);
        });
    } else {
        $(this).animate({width: 60}, 100),
        $('header h1').animate({left: 70}, 100);
    }
});

/*LINKS ANIMATIONS*/
$("body").on('click', '#content', function(event) {
    var divpos = parseInt($('footer').css('bottom'));
    var eventspos = parseInt($('#events').css('top'));

    if (divpos == 0 || eventspos == 0) {
        $('footer').animate({bottom: -200}),
        $('#events').animate({top: -200}),
        $('#content').animate({bottom: 0, top: 0}),
        $('header nav, #right-tog, .bkgd-desc').fadeIn(300);
    };
});


/*CLICK THRU FUNCTIONS*/
$("body").on('click', '#work-thru', function(event) {
    $('#left').animate({left: 0}),
    $('#main').animate({left: 300}),
    $('#right').animate({right: -600}),
    $('#main').animate({right: 0}),
    $('header nav, #right-tog, .bkgd-desc').fadeOut(300);
});
$("body").on('click', '#about-thru', function(event) {
    $('#right').animate({right: -600}),
    $('#main').animate({right: 0}),
    $('header nav, #right-tog, .bkgd-desc').fadeIn(300);
});
    
/*CATEGORY FILTER*/
$('#filter li a').click(function() {
    $('#filter li .current').removeClass('current');
    $(this).parent().addClass('current');

    var filterVal = $(this).text().replace(/ /g,'-');

    if(filterVal == 'All') {
        $('.work-grid li.hidden').fadeIn('slow').removeClass('hidden');
    } else {
        $('.work-grid li').each(function() {
            if(!$(this).hasClass(filterVal)) {
                $(this).fadeOut(600).addClass('hidden');
            } else {
                $(this).fadeIn(600).removeClass('hidden');
            }
        });
    }

    return false;
});
    
    

});