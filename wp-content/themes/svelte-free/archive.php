<?php get_header(); ?>

<div id="content">

  <div id="archive-header">

     <div id="archive-count">Selected category:</div><!-- #archiveCount -->    
     <div id="archive-term"><?php echo wp_title(''); ?></div><!-- #archiveTerm -->

   </div><!-- #archiveHeader -->

                     <div id="posts">

                          <?php if (have_posts()) : ?>

                          <?php get_template_part('loop'); ?>

                          <?php endif; ?>



                          <div id="browsing">
                              <div class="browseNav">

                                  <div class="browseNavLeft"><?php previous_posts_link('') ?>&nbsp;</div><!-- /.browseNavLeft -->
                                  <div class="browseNavMid"><div class="navigation"><?php if(function_exists('pagenavi')) { pagenavi(); } ?></div></div><!-- /.browseNavMid -->
                                  <div class="browseNavRight"><?php next_posts_link('') ?>&nbsp;</div><!-- /.browseNavRight -->
                              </div><!-- /.browseNav -->
                              <div class="clear"></div>
                          </div><!--  /#browsing -->

                      </div><!-- /#posts -->

                  </div><!-- /#content -->

                  <?php include("incl/keyboard-scrolling-archives.php"); ?>
                  <?php get_footer(); ?>