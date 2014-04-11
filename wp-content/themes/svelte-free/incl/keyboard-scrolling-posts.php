<!-- Keyboard navigation -->
<script type="text/javascript"> 


$(document).keydown(function(e) {

    if (e.keyCode == 37) {
        window.location = '<?php echo get_permalink(get_adjacent_post(false,'',false)); ?>';
    } else if (e.keyCode == 39) {
        window.location = '<?php echo get_permalink(get_adjacent_post(false,'',true)); ?>';
    }

});

</script>