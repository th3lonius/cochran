<?php if(have_posts()) : ?>
	
		<?php while(have_posts()): the_post(); ?>

        	  <div class="post">
        	    
        	        <a href="<?php the_permalink() ?>">
                    <span class="post-thumb"><?php	the_post_thumbnail('featured-image-thumb');	?></span><!-- /.post-thumb -->
                    <span class="post-plus">
                        <svg  class="svg-plus" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        	 width="29px" height="29px" viewBox="0 0 29 29" enable-background="new 0 0 29 29" xml:space="preserve">
                        <path d="M29,14.5c0-1.381-1.119-2.5-2.5-2.5c-0.035,0-0.067,0.009-0.102,0.01H17.01v-9.5c0-1.381-1.119-2.5-2.5-2.5
                        	c-1.381,0-2.5,1.119-2.5,2.5v9.5h-9.5c-1.381,0-2.5,1.119-2.5,2.5c0,1.38,1.119,2.5,2.5,2.5h9.5v9.389
                        	C12.009,26.433,12,26.465,12,26.5c0,1.381,1.119,2.5,2.5,2.5c1.377,0,2.493-1.113,2.499-2.49h0.011v-9.5h9.5v-0.011
                        	C27.887,16.993,29,15.877,29,14.5z"/>
                        </svg>
                    </span><!-- /.post-plus -->
                    <span class="post-category"><?php $categories = get_the_category(); $separator = ', '; $output = ''; if($categories){ foreach($categories as $category) {$output .= ''.$category->cat_name.''.$separator;} echo trim($output, $separator);}?></span><!-- /.post-category -->
                    <span class="post-title"><h3><?php the_title(); ?></h3></span><!-- /.post-title -->
                    <span class="post-excerpt"><?php $excerpt = strip_tags(better_excerpt('18'));echo $excerpt;?></span><!-- /.post-excerpt -->    
                  </a>
        
              </div><!-- .post -->

		<?php endwhile; ?>
	
<?php endif ?>