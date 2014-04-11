<?php get_header(); ?>

<div id="content">

  <div id="archive-header">

    <div id="archive-count"><?php printf( __( '%d %s' ), $wp_query->found_posts, _n( 'result for:', 'results for:', $wp_query->found_posts), get_search_query() ); ?></div><!-- #archiveCount -->    
    <div id="archive-term"><?php echo '&ldquo;'.wp_specialchars($s).'&rdquo;'; ?></div><!-- #archiveTerm -->

  </div><!-- #archiveHeader -->

         <div id="posts">

                <?php if (have_posts()) : ?>

                <?php get_template_part('loop-search'); ?>

                <?php endif; ?>

      
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

          
          </div><!-- /#posts -->

      </div><!-- /#content -->

      <?php include("incl/keyboard-scrolling-archives.php"); ?>
      <?php get_footer(); ?>