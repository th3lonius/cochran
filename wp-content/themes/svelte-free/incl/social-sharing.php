
   
     <div class="social-sharing">
        
        <!-- Twitter Share --> 
        <div class="twitter-share-button">
          <a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal"
          <?php if (get_option('mmminimal_twitter') != '') { ?>data-via="<?php echo get_option('mmminimal_twitter'); ?>"<?php } ?>
          >Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
        </div><!-- /.twitter-share-button -->   

        <!-- Facebook Share -->                        
        <div class="facebook-share-button">
           <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
           <fb:like layout="button_count" show_faces="false" font="arial"></fb:like>
         </div><!-- /.facebook-share-button -->

        <!-- Google Plus Share -->          
         <div class="gplus-share-button">          
           <g:plus action="share" annotation="bubble"></g:plus>        
           <script type="text/javascript">
             (function() {
               var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
               po.src = 'https://apis.google.com/js/plusone.js';
               var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
             })();
           </script>
          </div><!-- /.gplus-share-button -->

        <!-- Pinterest Share -->         
        <div class="pinterest-share-button">                            
          <?php $pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
          <a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink($post->ID)); ?>&media=<?php echo $pinterestimage[0]; ?>&description=<?php the_title(); ?>" class="pin-it-button" count-layout="horizontal"><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" /></a>
         </div><!-- /.pinterest-share-button --> 
      
        <div class="clear"></div>
        
      </div><!-- .social-sharing -->