<?php get_header(); global $paged; ?>

<!-- Slideshow code only for home page -->
<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
        effect: 'fade', // Specify sets like: 'fold,fade,sliceDown'
        slices: 15, // For slice animations
        boxCols: 8, // For box animations
        boxRows: 4, // For box animations
        animSpeed: 500, // Slide transition speed
        pauseTime: 3000, // How long each slide will show
        startSlide: 0, // Set starting Slide (0 index)
        directionNav: true, // Next & Prev navigation
        controlNav: true, // 1,2,3... navigation
        controlNavThumbs: false, // Use thumbnails for Control Nav
        pauseOnHover: true, // Stop animation while hovering
        manualAdvance: false // Force manual transitions       
    });});
</script>

 <div id="content">

    <!-- Slideshow - if home page = show, if not = don't show anything -->
    <?php if(! $paged || $paged < 2) :  ?>
      
    <div id="featured">
      
        <h3 class="separator" id="h3-featured">Featured</h3>
    
        <?php	
            $args = array( 'posts_per_page' => 5, 'order'=> 'DESC', 'category' =>  get_option('svelte_sliderCategory') );
            $myposts = get_posts( $args );?>   
        
    		<div class="slider-wrapper theme-svelte">	  
    		   
                  <div id="slider" class="nivoSlider">
                        <?php
                        foreach( $myposts as $post ) : setup_postdata($post);?>
    
                        <?php if ( has_post_thumbnail() ) {
                          echo the_post_thumbnail( array(940,500) , "title=#htmlcaption_".$post->ID); } ?>
                        <?php endforeach; ?>
                         <?php	
                       $args = array( 'posts_per_page' => 5, 'order'=> 'DESC', 'category' =>  get_option('svelte_sliderCategory') );
                       $myposts = get_posts( $args );?> 
                  </div><!-- /#slider -->
                                    
                    <?php
                    foreach( $myposts as $post ) : setup_postdata($post);?>

                        <div id="htmlcaption_<?php echo $post->ID;?>" class="nivo-html-caption">
                          <div class="nivo-caption-holder">
                                <a href="<?php the_permalink() ?>">
                                  <div class="nivo-title"><?php echo the_title(); ?></div>
                                  <div class="nivo-excerpt"><?php echo the_excerpt_max_charlength(100) ; ?></div>
                                </a>
                          </div><!-- /.nivo-caption-holder -->
                        </div><!-- /#htmlcaption -->

                    <?php endforeach; ?>
                    
        </div><!-- /.slider-wrapper -->
    
    </div><!-- /#featured -->
    
    <?php endif; ?>

    <!-- Posts --> 
    <h3 class="separator" id="h3-recent-articles">Recent Articles</h3>
    <div id="posts">
        <?php if (have_posts()) : ?>
        <?php get_template_part('loop'); ?>
        <?php endif; ?>
    </div><!-- /#posts -->    
    
    <!-- Arrows on the sides of the browser -->                            
    <div class="floating-pagi">                      
      <span class="floating-pagi-next"><?php next_posts_link('<svg version="1.1" class="svg-pagi" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        	 width="60px" height="60px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve">
        <g>
        	<path d="M20,0C8.954,0,0,8.955,0,20c0,11.046,8.954,20,20,20c11.045,0,20-8.953,20-20C40,8.955,31.045,0,20,0z
        		 M20,37c-9.389,0-17-7.611-17-17c0-9.389,7.611-17,17-17c9.389,0,17,7.611,17,17C37,29.389,29.389,37,20,37z"/>
        </g>
        <path d="M27.191,18.586l-7.778-7.778c-0.781-0.781-2.047-0.781-2.828,0c-0.781,0.781-0.781,2.047,0,2.829L22.949,20
        	l-6.364,6.364c-0.781,0.781-0.781,2.048,0,2.829c0.781,0.78,2.047,0.781,2.828,0l7.778-7.779
        	C27.973,20.634,27.973,19.367,27.191,18.586z"/>
        </svg>'); ?>&nbsp;</span>
      <span class="floating-pagi-prev"><?php previous_posts_link('<svg version="1.1" class="svg-pagi" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            	 width="60px" height="60px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve">
            <g>
            	<path d="M0,20c0,11.046,8.955,20,20,20c11.046,0,20-8.953,20-20C40,8.955,31.047,0,20,0C8.955,0,0,8.955,0,20z
            		 M3,20c0-9.389,7.611-17,17-17c9.388,0,17,7.611,17,17c0,9.388-7.611,17-17,17C10.611,37,3,29.389,3,20z"/>
            </g>
            <path d="M12.809,18.586l7.778-7.778c0.781-0.781,2.047-0.781,2.828,0c0.781,0.781,0.781,2.047,0,2.829L17.051,20
            	l6.363,6.364c0.781,0.781,0.781,2.048,0,2.829c-0.78,0.78-2.047,0.781-2.828,0l-7.778-7.779
            	C12.027,20.634,12.027,19.367,12.809,18.586z"/>
            </svg>'); ?>&nbsp;</span>
    </div><!-- .floating-pagi -->

    <!-- Pagination -->    
    <div id="browsing">
      <div class="browseNav">
          <div class="browseNavLeft"><?php previous_posts_link('<svg class="svg-pagi" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="40px" height="40px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve"><g><path d="M0 20c0 11 9 20 20 20c11.046 0 20-8.953 20-20C40 9 31 0 20 0C8.955 0 0 9 0 20z M3 20c0-9.389 7.611-17 17-17c9.388 0 17 7.6 17 17c0 9.388-7.611 17-17 17C10.611 37 3 29.4 3 20z"/></g><path d="M12.809 18.586l7.778-7.778c0.781-0.781 2.047-0.781 2.8 0c0.781 0.8 0.8 2 0 2.829L17.051 20 l6.363 6.364c0.781 0.8 0.8 2 0 2.829c-0.78 0.78-2.047 0.781-2.828 0l-7.778-7.779 C12.027 20.6 12 19.4 12.8 18.586z"/></svg>') ?>&nbsp;</div><!-- /.browseNavLeft -->
          <div class="browseNavMid">
            <div class="navigation"><?php if(function_exists('pagenavi')) { pagenavi(); } ?></div>
          </div><!-- /.browseNavMid -->
          <div class="browseNavRight"><?php next_posts_link('<svg version="1.1" class="svg-pagi" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            	 width="40px" height="40px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve">
            <g>
            	<path d="M20,0C8.954,0,0,8.955,0,20c0,11.046,8.954,20,20,20c11.045,0,20-8.953,20-20C40,8.955,31.045,0,20,0z
            		 M20,37c-9.389,0-17-7.611-17-17c0-9.389,7.611-17,17-17c9.389,0,17,7.611,17,17C37,29.389,29.389,37,20,37z"/>
            </g>
            <path d="M27.191,18.586l-7.778-7.778c-0.781-0.781-2.047-0.781-2.828,0c-0.781,0.781-0.781,2.047,0,2.829L22.949,20
            	l-6.364,6.364c-0.781,0.781-0.781,2.048,0,2.829c0.781,0.78,2.047,0.781,2.828,0l7.778-7.779
            	C27.973,20.634,27.973,19.367,27.191,18.586z"/>
            </svg>') ?>&nbsp;</div><!-- /.browseNavRight -->
      </div><!-- /.browseNav -->
      <div class="clear"></div>
    </div><!--  /#browsing -->

</div><!-- /#content -->


<?php get_footer(); ?>