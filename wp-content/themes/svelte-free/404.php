<?php get_header(); ?>

	<div id="content">

		<div class="post-single">

            <!-- Section: Category list right at top -->
			      <h3 id="post-single-category">Error Page</h3>

            <!-- Section: Featured Image -->
            <!-- If has featured image, then show it, else show nothing --> 
            <?php if ( '' != get_the_post_thumbnail() ) {echo '<div class="post-featured-image">';the_post_thumbnail(); echo '</div>';} else {echo '';}; ?>
              
             <!-- Start left column -->                
            <div class="post-single-left">
              
                      <div class="post-entry">

                            <!-- Section: Title and META -->                                 
                            <h1>404!</h1>    
                                                      
                            <!-- Section: Post content -->
                    	          <p>Unfortunately the page your are looking for does not exist.</p>
                    				    <div class="clear"></div><!-- .clear -->  
                    				    
                       </div><!-- /.post-entry -->
                            
                            <div class="clear"></div><!-- .clear -->

            </div><!-- .post-single-left -->  
                       
            <div class="post-single-right">
              
              <?php get_sidebar(); ?>
              
            </div><!-- .post-single-right -->     
            
            <div class="clear"></div>

			  </div><!-- /.post-single -->   
			  			
    </div><!-- /#content -->

<?php include("incl/keyboard-scrolling-posts.php"); ?>
<?php get_footer(); ?>