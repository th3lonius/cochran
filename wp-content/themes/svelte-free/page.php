<?php get_header(); ?>

	<div id="content">

		<div class="post-single">

            <!-- Section: Category list right at top -->
			      <h3 id="post-single-category"><?php  global $post; $slug = get_post( $post )->post_name; echo $slug ?></h3>

            <!-- Section: Featured Image -->
            <!-- If has featured image, then show it, else show nothing --> 
            <?php if ( '' != get_the_post_thumbnail() ) {echo '<div class="post-featured-image">';the_post_thumbnail(); echo '</div>';} else {echo '';}; ?>
              
             <!-- Start left column -->                
            <div class="post-single-left">
              
                      <div class="post-entry">

                            <!-- Section: Title and META -->                                 
                            <h1><?php the_title(); ?></h1>    
                                                      
                            <!-- Section: Post content -->
                    	          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    				    <?php the_content('<p>Read the rest of this entry &raquo;</p>'); ?>
                    				    <div class="clear"></div><!-- .clear -->  
                    				    
                       </div><!-- /.post-entry -->

                            <?php endwhile; else: ?>

                            		<p>Sorry, no posts matched your criteria.</p>

                            <?php endif; ?>
                            
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