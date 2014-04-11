$(function(){
	
	$('#navigation li').each(function(){
	
		if( $(this).find('>ul').length > 0 ){
			
			$(this).hover(function(){
				if( $(this).parent().parent().is('#navigation') ){
					clearTimeout(window.$menu_timer);
					window.$menu_timer = null;
					if( window.$current_menu )
						$('#' + window.$current_menu).find('ul').stop().fadeOut();
						
					window.$current_menu = $(this).attr('id');
				};
					
				$(this).find('ul:first').stop().css('opacity', '').fadeIn();
			}, function(){
				
				if( $(this).parent().parent().is('#navigation') ){
					window.$menu_timer = setTimeout(function(){
						$('#' + window.$current_menu).find('ul').stop().fadeOut();
					}, 500);
				}
				else
					$(this).find('>ul').stop().fadeOut(500);
			});
		
		}
	
	});
	
});