<!-- Keyboard navigation for left and right -->
<script type="text/javascript"> 


$(document).keydown(function(e) {

var currentPage = '<?php echo $paged; ?>';
var totalPage = '<?php echo $wp_query->max_num_pages; ?>';
    if (e.keyCode == 37) {
        window.location = '<?php echo get_previous_posts_page_link(); ?> ';
    } else if (e.keyCode == 39) {
	if(currentPage != totalPage )
	{
		window.location = '<?php echo get_next_posts_page_link(); ?>';
	}
    }

});

</script>    