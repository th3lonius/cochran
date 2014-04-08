$(document).ready(function(){
    
    $("body").on('click', '#work-grid li a, #about-thru, #menu a, #next-thru, #prev-thru', function(event) {
        
        var toLoad = $(this).attr(':permlink/>')+' #content-cont';
        var bkgdLoad = $(this).attr('<txp:permlink/>')+' #viewport';
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
        
    }); 
    
});