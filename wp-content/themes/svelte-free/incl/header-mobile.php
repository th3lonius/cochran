<!-- Mobile Only Starts Here -->
 <div id="mobile-only">
   
         <!-- Search form that pops out on mobile -->
         <div id="toggle-search-navigation" style="display: none">
           <div id="search-mobile">
               <form id="search-mobile-form"  action="<?php print get_site_url(); ?>/" method="get">
                   			<input type="text" id="search-mobile-field" name="s" value="<?php  if (is_search()) {esc_attr_e($s);} else {echo ('Search anything...');} ?>" onFocus="this.value=''" />
           		</form>
           </div><!-- #searchMobile -->
         </div><!-- #toggleSearchNavigation -->

          <!-- Navigation Icon/Button -->
         <div id="mobile-nav-button">
     			 <a id="mobile-nav-button-link" href="javascript:toggleNav();"> 
     			   <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             	 width="20px" height="13px" style="fill: #777;" viewBox="0 0 20 13" enable-background="new 0 0 20 13" xml:space="preserve">
             <g>
             	<path d="M1.5,3h17C19.328,3,20,2.329,20,1.5S19.328,0,18.5,0h-17C0.671,0,0,0.671,0,1.5S0.671,3,1.5,3z"/>
             	<path d="M18.5,5h-17C0.671,5,0,5.671,0,6.5C0,7.328,0.671,8,1.5,8h17C19.328,8,20,7.328,20,6.5C20,5.671,19.328,5,18.5,5z"/>
             	<path d="M18.5,10h-17C0.671,10,0,10.672,0,11.5S0.671,13,1.5,13h17c0.828,0,1.5-0.672,1.5-1.5S19.328,10,18.5,10z"/>
             </g>
             </svg>
     			 </a>
         </div><!-- #mobileNavButton -->

          <!-- Mobile Only Logo -->
         <div id="mobile-logo">
              <a href="<?php print get_home_url(); ?>" title="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>"></a>
         </div><!-- #mobile-logo -->

        <!-- Search Icon/Button -->
         <div id="mobile-search-button">
     			            <a id="mobile-search-button-link" href="javascript:toggleNavSearch();">
     			              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                      	 width="20px" height="20px" style="fill: #777;" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
                      <path d="M19.561,17.439l-4.943-4.944C15.489,11.214,16,9.667,16,8c0-4.418-3.582-8-8-8S0,3.582,0,8c0,4.418,3.582,8,8,8
                      	c1.667,0,3.215-0.511,4.496-1.383l4.943,4.943c0.586,0.586,1.535,0.586,2.121,0S20.146,18.025,19.561,17.439z M3,8
                      	c0-2.761,2.238-5,5-5s5,2.239,5,5s-2.238,5-5,5S3,10.761,3,8z"/>
                      </svg>
                      </a>
         </div><!-- #mobileSearchButton -->

         <div class="clear"></div>

          <!-- Mobile Only Navigation  -->
         <div id="toggle-mobile-navigation" style="display: none">
           <ul>
             <?php custom_nav_menu(); ?>
           </ul>
         </div><!-- #toggleMobileNavigation -->

 </div><!-- #mobile-only -->
<!-- Mobile Only End Here -->