<?php get_header(); ?>

	<div id="content">

		<div class="post-single">

            <!-- Section: Category list right at top -->
			      <h3 id="post-single-category"><?php  the_category(', ', 'parents' ); ?></h3>

            <!-- Section: Featured Image -->
            <!-- If has featured image, then show it, else show nothing --> 
            <?php if ( '' != get_the_post_thumbnail() ) {echo '<div class="post-featured-image">';the_post_thumbnail(); echo '</div>';} else {echo '';}; ?>
              
             <!-- Start left column -->                
            <div class="post-single-left">
              
                      <div class="post-entry">

                            <!-- Section: Title and META -->                                 
                            <h1><?php the_title(); ?></h1>    
                            <div class="post-meta">
                              <p>By               
                              <span class="post-meta-author">
                                <?php $username = get_userdata( $post->post_author ); ?>    
                                  <a href="<?php echo get_author_posts_url( $post->post_author ); ?>"><?php echo $username->user_nicename; ?></a>  
                               </span><!-- /.post-meta-author -->      
                                  on                                  
                              <span class="post-meta-date">                                  
                                  <?php the_time('F jS, Y') ?>
                              </span><!-- /.post-meta-date -->                           
                              </p>                           
                            </div><!-- .post-meta -->                              

                            <!-- Section: Post content -->
                    	          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    				    <?php the_content('<p>Read the rest of this entry &raquo;</p>'); ?>
                    				    <div class="clear"></div><!-- .clear -->  
                    				    
                            <!-- Section: Post Tags -->                    				    
                    				    <div class="post-tags-holder">   				      
                    				      <div class="post-tags-icon">           				        
                    				        <svg class="svg-tags" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
                                    <path d="M85.32,57.941L50.236,93.028L0,42.79V18.233L10.529,7.704h24.555L85.32,57.941z M13.289,20.992  c-1.41,1.412-1.41,3.706,0.001,5.118c1.41,1.411,3.706,1.411,5.116,0c1.413-1.409,1.413-3.706,0-5.118  C16.996,19.584,14.699,19.584,13.289,20.992z"/>
                                    <g>
                                    	<polygon points="49.765,7.704 42.491,7.704 92.728,57.941 61.28,89.392 64.916,93.028 100,57.941  "/>
                                    </g>
                                    </svg>
                    				      </div><!-- .post-tags-icon -->     				      
                    				      <div class="post-tags">
                      				      <ul class="tags">
                      				        <li><?php the_tags('', '</li><li> ', ' '); ?></li>
                      				      </ul>
                      				    </div><!-- .post-tags -->                  				    
                      				    <div class="clear"></div><!-- .clear -->                   				      
                    				    </div><!-- .post-tags-holder -->


                            <!-- Section: Post Categories -->
                                <div class="post-cat-holder">
                                  <div class="post-cat-icon">
                                    <svg class="svg-cat"  version="1.0" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    	 width="28px" height="25.391px" viewBox="0 0 100 90.682" enable-background="new 0 0 100 90.682" xml:space="preserve">
                                    <path d="M8.769,18.373v43.646h-6.53C1.004,62.019,0,61.024,0,59.78V3.459C0,1.554,1.42,0,3.372,0h28.857
                                    	c1.944,0,3.372,1.546,3.372,3.452v3.308h44.617c1.241,0,2.238,1.001,2.238,2.231v12.666H44.37v-3.315
                                    	c0-1.901-1.42-3.451-3.379-3.451H12.147C10.188,14.89,8.769,16.461,8.769,18.373z"/>
                                    <path d="M97.761,35.426H53.146v-3.308c0-1.905-1.429-3.452-3.381-3.452H20.914c-1.95,0-3.371,1.554-3.371,3.458V88.45
                                    	c0,1.237,0.997,2.231,2.239,2.231h6.527h71.451c1.241,0,2.239-0.994,2.239-2.231V37.657C100,36.427,99.002,35.426,97.761,35.426z"/>
                                    </svg>
                                  </div><!-- .post-cat-icon -->
                                  <div class="post-cat" >
                                    <?php the_category('  ') ?>
                                  </div><!-- /.post-cat -->
                                  <div class="clear"></div><!-- .clear -->
                                </div><!-- .post-cat-holder -->
                                
                                <!-- Arrows on the sides of the browser -->                            
                                <div class="floating-pagi">                      
                                  <span class="floating-pagi-next"><?php previous_post_link('%link', '<svg version="1.1" class="svg-pagi" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    	 width="60px" height="60px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve">
                                    <g>
                                    	<path d="M20,0C8.954,0,0,8.955,0,20c0,11.046,8.954,20,20,20c11.045,0,20-8.953,20-20C40,8.955,31.045,0,20,0z
                                    		 M20,37c-9.389,0-17-7.611-17-17c0-9.389,7.611-17,17-17c9.389,0,17,7.611,17,17C37,29.389,29.389,37,20,37z"/>
                                    </g>
                                    <path d="M27.191,18.586l-7.778-7.778c-0.781-0.781-2.047-0.781-2.828,0c-0.781,0.781-0.781,2.047,0,2.829L22.949,20
                                    	l-6.364,6.364c-0.781,0.781-0.781,2.048,0,2.829c0.781,0.78,2.047,0.781,2.828,0l7.778-7.779
                                    	C27.973,20.634,27.973,19.367,27.191,18.586z"/>
                                    </svg>'); ?></span>
                                  <span class="floating-pagi-prev"><?php next_post_link('%link', '  <svg version="1.1" class="svg-pagi" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    	 width="60px" height="60px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve">
                                    <g>
                                    	<path d="M0,20c0,11.046,8.955,20,20,20c11.046,0,20-8.953,20-20C40,8.955,31.047,0,20,0C8.955,0,0,8.955,0,20z
                                    		 M3,20c0-9.389,7.611-17,17-17c9.388,0,17,7.611,17,17c0,9.388-7.611,17-17,17C10.611,37,3,29.389,3,20z"/>
                                    </g>
                                    <path d="M12.809,18.586l7.778-7.778c0.781-0.781,2.047-0.781,2.828,0c0.781,0.781,0.781,2.047,0,2.829L17.051,20
                                    	l6.363,6.364c0.781,0.781,0.781,2.048,0,2.829c-0.78,0.78-2.047,0.781-2.828,0l-7.778-7.779
                                    	C12.027,20.634,12.027,19.367,12.809,18.586z"/>
                                    </svg>'); ?></span>
                                </div><!-- .floating-pagi -->                                
  
                       </div><!-- /.post-entry -->

                            <?php endwhile; else: ?>

                            		<p>Sorry, no posts matched your criteria.</p>

                            <?php endif; ?>
                            
                            <div class="clear"></div><!-- .clear -->
                            
                            
                            <!-- Section: Author Profile -->                            
                             <div class="post-author">
                                <h3 class="separator">Author</h3>
                                  <div class="post-author-avatar">
                                    <?php echo get_avatar( get_the_author_meta('user_email'), $size = '100'); ?>                           
                                  </div><!-- .post-author-avatar -->
                                  <div class="post-author-info">
                                    <div class="post-author-info-name"><?php echo get_the_author_meta('nickname'); ?></div>
                                    <div class="post-author-info-bio"><?php echo get_the_author_meta('description'); ?></div>
                                    <div class="post-author-info-link"><a href="<?php echo get_the_author_meta('user_url'); ?>"><?php echo get_the_author_meta('user_url'); ?></a></div>
                                  </div><!-- .post-author-info -->
                                  <div class="clear"></div><!-- .clear -->
                              </div><!-- .post-author -->
                              
                              
                            <!-- Section: Related Posts -->
                            <div id="posts-related">   
                                      <h3 class="separator" id="h3-related">Related Articles</h3>
                                          <div id="posts">
                                            		<?php
                                          				global $post; 
                                          				$categories = get_the_category();
                                          				$category = array_shift($categories);
                                          				query_posts(array(
                                          					'posts_per_page' => 2,
                                          					'numberposts' => 2,
                                          					'category_name' => $category->slug,
                                          					'post__not_in' => array($post->ID)
                                          				));
                                          				get_template_part('loop', 'related');
                                          				wp_reset_query();
                                                ?>                            
                                          </div><!-- #posts -->
                            </div><!-- #posts-related -->

                            <!-- Section: Post Comments -->                            
                            <div class="post-comments">
                               <?php comments_number(
                               ' ', 
                               '<h3 class="separator" id="h3-related">1 Comment</h3>', 
                               '<h3 class="separator" id="h3-related">% Comments</h3>' );?>
                                <?php comments_template(); ?>
                            </div><!-- .post-comments -->
                            
            </div><!-- .post-single-left -->  
                       
            <div class="post-single-right">
              
              <?php get_sidebar(); ?>
              
            </div><!-- .post-single-right -->     
            
            <div class="clear"></div>

			  </div><!-- /.post-single -->   
			  			
    </div><!-- /#content -->

<?php get_footer(); ?>