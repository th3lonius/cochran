jQuery(document).ready(function($){      
   
    
/*AJAX LOADING*/
    
var hash = window.location.hash.substr(1);  
var href = $('#work-grid li a, #about-thru, #menu a, #next-thru, #prev-thru').each(function(){  
    var href = $(this).attr('href');  
    if(hash==href.substr(0,href.length-4)){  
        var toLoad = hash+'.php #content-cont';  
        $('#content-cont').load(toLoad)  
    }   
}); 
    
$("body").on('click', '#work-grid li a, #about-thru, #menu a, #next-thru, #prev-thru', function(event) {
    
    var toLoad = $(this).attr('href')+' #content-cont';
    var bkgdLoad = $(this).attr('href')+' #viewport';
    var leftpos = parseInt($('#left').css('left'), 10);
    
    if (leftpos == 0) {
        $('#left').animate({left: -600}),
        $('#main').animate({left: 0}),
        $('#main-menu, #right-tog, .bkgd-desc').fadeIn(300);
    };
    
    $('#content-cont').hide('fast', function(){
        var divpos = parseInt($('#right').css('right'), 10);
    
        if (divpos == 0) {
            $('#right').animate({right: -600}),
            $('#main').animate({right: 0}),
            $('#main-menu, #right-tog, .bkgd-desc').fadeIn(300);
        };
    }); 
    $('#viewport').fadeOut('fast',loadContent);
    $('#load').remove();  
    $('#wrapper').append('<span id="load">LOADING...</span>');  
    $('#load').fadeIn('normal');
 
    
    window.location.hash = $(this).attr('href').substr(0,$(this).attr('href').length-4);
    
    
    function loadContent() {  
        $('#content-cont').load(toLoad,''),
        $('#viewport').load(bkgdLoad,'',showNewContent());   
    }  
    function showNewContent() {  
        $('#content-cont').show('normal'),
        $('#viewport').fadeIn('5000',hideLoader());
    }  
    function hideLoader() {  
        $('#load').fadeOut('normal');  
    }   
    return false;  

}); 

/*END AJAX LOADING*/
    

/*RIGHT ANIMATIONS*/   
$("body").on('click', '#right-tog', function(event) {
    $('#right').animate({right: 0}),
    $('#main').animate({right: 300}),
    $('#main-menu, #right-tog, .bkgd-desc').fadeOut(300);
}); 
    
$("body").on('click', '#main, .click-thru', function(event) {    
    var divpos = parseInt($('#right').css('right'));
    
    if (divpos == 0) {
        $('#right').animate({right: -600}),
        $('#main').animate({right: 0}),
        $('#main-menu, #right-tog, .bkgd-desc').fadeIn(300);
    };
});
    
/*LINKS ANIMATIONS*/
$("body").on('click', '#links, #links-thru', function(event) { 
    $('#footer').animate({bottom: 0}),
    $('#main').animate({bottom: 100}),
    $('#main-menu, #right-tog, .bkgd-desc').fadeOut(300);
    
    var rightpos = parseInt($('#right').css('right'));
    
    if (rightpos == 0) {
        $('#right').animate({right: -600}),
        $('#main').animate({right: 0}),
        $('#main-menu, #right-tog, .bkgd-desc').fadeIn(300);
    };
});   
    
/*LEFT ANIMATIONS*/
$("body").on('click', '.work-link', function(event) { 
    $('#left').animate({left: 0}),
    $('#main').animate({left: 300}),
    $('#main-menu, #right-tog, .bkgd-desc').fadeOut(300);
});
    
$("body").on('click', '#main', function(event) {
    var divpos = parseInt($('#left').css('left'));
    
    if (divpos == 0) {
        $('#left').animate({left: -600}),
        $('#main').animate({left: 0}),
        $('#main-menu, #right-tog, .bkgd-desc').fadeIn(300);
    };
});
 
/*LINKS ANIMATIONS*/  
$("body").on('click', '#main', function(event) {
    var divpos = parseInt($('#footer').css('bottom'));
    
    if (divpos == 0) {
        $('#footer').animate({bottom: -200}),
        $('#main').animate({bottom: 0}),
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