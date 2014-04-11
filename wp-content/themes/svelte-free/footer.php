
</div><!-- /#container -->

<div id="footer-outer">
  
        <div id="footer">
          
                <div id="footer-widgets">
                  
                  <?php dynamic_sidebar('sidebar_footer_left') ?>
                  <?php dynamic_sidebar('sidebar_footer_mid') ?>                  
                  <?php dynamic_sidebar('sidebar_footer_right') ?>
                  
                  <div class="clear"></div>
                  
                </div><!-- #footer-widgets -->
                
                <div id="footer-bottom">

                          <div id="footer-copyright">
                              &copy; <?php echo date("Y"); ?> <a href="/" title="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a>. All Rights Reserved. <span class="powered">Powered by <a href="http://wordpress.org" target="_blank">WordPress</a>.</span>
                          </div><!-- #footer-copyright -->

                          <div id="footer-credit">
                              <a href="http://themecobra.com" target="_blank">Svelte</a> is crafted by <a href="http://themecobra.com" target="_blank">ThemeCobra</a>.
                          </div><!-- #footer-credit -->
                
                          <div class="clear"></div>
                
                </div><!-- #footer-bottom -->

        </div><!-- /#footer -->
  
</div><!-- #footer-outer -->

</div><!-- #outer-container -->  

<?php wp_footer(); ?>

</body>
</html>