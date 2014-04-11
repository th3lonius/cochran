<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
  <title>
  <?php if (function_exists('is_tag') && is_tag()) {
    echo 'Tag Archive for &quot;'.$tag.'&quot; - '; }
    elseif (is_archive()) { wp_title('');
    echo ' Archive - '; }
    elseif (!(is_404()) && (is_single()) || (is_page())) { wp_title('');
    echo ' - '; }
    elseif (is_404()) {
      echo 'Not Found - '; }
      if (is_home()) { bloginfo('name');
      echo ' - '; bloginfo('description'); }
      else { bloginfo('name'); } ?>
  </title>
	
	<!-- Meta -->
	<meta charset = "UTF-8" />
	
	<!-- Responsive stylesheet -->
	<meta name="viewport" content="width=device-width; initial-scale=1.0" />
	
	<!-- IE stylesheet -->
	<!--[if lte IE 8]><link rel="stylesheet" type="text/css" href="<?php print get_template_directory_uri(); ?>/styles/ie.css" /><![endif]-->
	
	<!-- RSS Feed -->
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	
	<!-- Pingbacks -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  
<div id="outer-container">
  
    <div id="top-container">
      
        <div id="top">
      
            <!-- Mobile only header import -->  
            <?php include('incl/header-mobile.php'); ?>
        
            <!-- Normal header navigation & search -->    
            <div id="top-navigation">
              <div id="navigation">
                 <ul>
                   <?php custom_nav_menu(); ?>
                 </ul>
               </div><!-- #navigation -->
            </div><!-- #top-navigation -->   
         
            <div id="top-search">         
              <div id="top-search-mglass">
                
                <svg class="svg-search" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
              	 width="20px" height="20px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
              <path d="M19.561,17.439l-4.943-4.944C15.489,11.214,16,9.667,16,8c0-4.418-3.582-8-8-8S0,3.582,0,8c0,4.418,3.582,8,8,8
              	c1.667,0,3.215-0.511,4.496-1.383l4.943,4.943c0.586,0.586,1.535,0.586,2.121,0S20.146,18.025,19.561,17.439z M3,8
              	c0-2.761,2.238-5,5-5s5,2.239,5,5s-2.238,5-5,5S3,10.761,3,8z"/>
              </svg>
                
              </div><!-- /#top-search-mglass -->  
              
              <div id="top-search-form">
                
                <form action="<?php print get_site_url(); ?>/" name="search-form" method="get" id="search-form">
                 <div class="search-form-focus">
                  <input type="text" name="s" maxlength="64" id="search-form-field" onfocus="if(this.value == 'Search anything &amp; hit enter') { this.value = ''; }" value="Search anything &amp; hit enter" />
                 </div><!-- .search-form-focus -->
               </form>
                
              </div><!-- #top-search-form -->
                    
            </div><!-- #top-search -->
         
            <div class="clear"></div><!-- .clear -->
            <!-- Normal header navigation & search  end here --> 
         
        </div><!-- #top -->  
      
    </div><!-- #top-container -->
  
<div id="container">

    <div id="header">

        <div id="header-logo">

          <?php $logo = get_option('svelte_logo'); if ($logo != '') {?>
          <h1><a href="<?php print get_home_url(); ?>" title="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>"><img src="<?php echo $logo; ?>" alt="<?php bloginfo('name'); ?>"/></a></h1>
    			<?php
    			} else {?>
    			<h1><a href="<?php print get_home_url(); ?>" title="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h1>
    			<?php } ?>
          
          
        </div><!-- /#header-logo -->
        
        <div id="header-ad">
            <?php dynamic_sidebar('sidebar_header') ?>
        </div><!-- /#header-ad -->
          
        <div class="clear"></div>

    </div><!-- /#header -->