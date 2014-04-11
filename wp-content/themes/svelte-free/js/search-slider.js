$(document).ready(function() {

	$height = 92;
	$('#toggle-search').css('overflow', 'hidden').css('height', 0);
	$('#search').hide();

    $('#toggle-search-button').toggle(function() {
		$('#toggle-search').animate({height:$height}, {duration: 700, easing: "easeInOutExpo"});
		$('#search').fadeIn(1500);

	}, function(){
		$('#search').fadeOut(600);
		$('#toggle-search').animate({height:0}, {duration: 700, easing: "easeInOutExpo"});
	});
});