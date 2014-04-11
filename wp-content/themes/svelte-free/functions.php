<?php

// Svelte Free functions.php index:

// 00. Defining
// 01. Post Thumbnails
// 02. WP3 Menu
// 03. Pagination
// 04. Include featured image in RSS
// 05. Enable Widgets
// 06. Svelte Options & Recommendations Panels
// 07. Theme Customizer
// 08. Enqueue Scripts and Styles
// 09. Comments
// 10. Timestamps in Comments
// 11. Set Excerpt Length
// 12. Slideshow
// 13. Your custom code
// 13. Theme Version Update Notifications

// -------------------------------------------------------------
// 00. Defining
// -------------------------------------------------------------

// Theme Version
define( 'SVELTE_THEME_VERSION' , '1.0.0' );
include("widget.php");
add_action( 'widgets_init', register_widget( 'svelte_instagram_widget' ));
add_action( 'widgets_init', register_widget( 'svelte_twitter_widget' ));
add_action( 'widgets_init', register_widget( 'svelte_social_Widget' ));
// Content Width
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 940;

// -------------------------------------------------------------
// 01. Post Thumbnails
// -------------------------------------------------------------

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 940, 500, true ); // Default featured image size for desktops, fixed width, fixed height, cropped
add_image_size( 'featured-image-tablet',  620, 330, true); // Tablet featured image with fixed width, fixed height, cropped
add_image_size( 'featured-image-thumb',  300, 190, true); // Thumbnails on all devices, Mobile featured image with fixed width, fixed height, cropped

// -------------------------------------------------------------
// 02. WP3 Menu
// -------------------------------------------------------------

function custom_nav_menu() {
	if ( function_exists( 'wp_nav_menu' ) )
		wp_nav_menu( array(
			'theme_location' => 'top-menu',
			'fallback_cb' => 'custom_list_pages',
			'container' => '%3$s',
			'items_wrap' => '%3$s'
			) );
	else
		custom_list_pages();
}

function custom_list_pages() {
	if ( is_home() || is_front_page() ) { ?>
		<ul><?php wp_list_pages( 'title_li=' ); ?></ul>
	<?php } else { ?>
		<ul>
			<li><a href="<?php echo home_url(); ?>"><?php _e( 'Home' ); ?></a></li>
			<?php wp_list_pages( 'title_li=' ); ?>
		</ul>
	<?php }
}

add_action( 'init', 'register_custom_menu' );
function register_custom_menu() {
	register_nav_menu( 'top-menu', __( 'Top Menu' ) );
}

// -------------------------------------------------------------
// 03. Pagination
// -------------------------------------------------------------

/* Function that Rounds To The Nearest Value.
   Needed for the pagenavi() function */
function round_num($num, $to_nearest) {
   /*Round fractions down (http://php.net/manual/en/function.floor.php)*/
   return floor($num/$to_nearest)*$to_nearest;
}

/* Function that performs a Boxed Style Numbered Pagination (also called Page Navigation).
   Function is largely based on Version 2.4 of the WP-PageNavi plugin */
function pagenavi($before = '', $after = '') {
    global $wpdb, $wp_query;
    $pagenavi_options = array();
    $pagenavi_options['pages_text'] = ('');
    $pagenavi_options['current_text'] = '%PAGE_NUMBER%';
    $pagenavi_options['page_text'] = '%PAGE_NUMBER%';
    $pagenavi_options['first_text'] = ('First Page');
    $pagenavi_options['last_text'] = ('Last Page');
    $pagenavi_options['next_text'] = '';
    $pagenavi_options['prev_text'] = '';
    $pagenavi_options['dotright_text'] = '...';
    $pagenavi_options['dotleft_text'] = '...';
    $pagenavi_options['num_pages'] = 5; //continuous block of page numbers
    $pagenavi_options['always_show'] = 0;
    $pagenavi_options['num_larger_page_numbers'] = 0;
    $pagenavi_options['larger_page_numbers_multiple'] = 5;

    //If NOT a single Post is being displayed
    /*http://codex.wordpress.org/Function_Reference/is_single)*/
    if (!is_single()) {
        $request = $wp_query->request;
        //intval — Get the integer value of a variable
        /*http://php.net/manual/en/function.intval.php*/
        $posts_per_page = intval(get_query_var('posts_per_page'));
        //Retrieve variable in the WP_Query class.
        /*http://codex.wordpress.org/Function_Reference/get_query_var*/
        $paged = intval(get_query_var('paged'));
        $numposts = $wp_query->found_posts;
        $max_page = $wp_query->max_num_pages;

        //empty — Determine whether a variable is empty
        /*http://php.net/manual/en/function.empty.php*/
        if(empty($paged) || $paged == 0) {
            $paged = 1;
        }

        $pages_to_show = intval($pagenavi_options['num_pages']);
        $larger_page_to_show = intval($pagenavi_options['num_larger_page_numbers']);
        $larger_page_multiple = intval($pagenavi_options['larger_page_numbers_multiple']);
        $pages_to_show_minus_1 = $pages_to_show - 1;
        $half_page_start = floor($pages_to_show_minus_1/2);
        //ceil — Round fractions up (http://us2.php.net/manual/en/function.ceil.php)
        $half_page_end = ceil($pages_to_show_minus_1/2);
        $start_page = $paged - $half_page_start;

        if($start_page <= 0) {
            $start_page = 1;
        }

        $end_page = $paged + $half_page_end;
        if(($end_page - $start_page) != $pages_to_show_minus_1) {
            $end_page = $start_page + $pages_to_show_minus_1;
        }
        if($end_page > $max_page) {
            $start_page = $max_page - $pages_to_show_minus_1;
            $end_page = $max_page;
        }
        if($start_page <= 0) {
            $start_page = 1;
        }

        $larger_per_page = $larger_page_to_show*$larger_page_multiple;
        //round_num() custom function - Rounds To The Nearest Value.
        $larger_start_page_start = (round_num($start_page, 10) + $larger_page_multiple) - $larger_per_page;
        $larger_start_page_end = round_num($start_page, 10) + $larger_page_multiple;
        $larger_end_page_start = round_num($end_page, 10) + $larger_page_multiple;
        $larger_end_page_end = round_num($end_page, 10) + ($larger_per_page);

        if($larger_start_page_end - $larger_page_multiple == $start_page) {
            $larger_start_page_start = $larger_start_page_start - $larger_page_multiple;
            $larger_start_page_end = $larger_start_page_end - $larger_page_multiple;
        }
        if($larger_start_page_start <= 0) {
            $larger_start_page_start = $larger_page_multiple;
        }
        if($larger_start_page_end > $max_page) {
            $larger_start_page_end = $max_page;
        }
        if($larger_end_page_end > $max_page) {
            $larger_end_page_end = $max_page;
        }
        if($max_page > 1 || intval($pagenavi_options['always_show']) == 1) {
            /*http://php.net/manual/en/function.str-replace.php */
            /*number_format_i18n(): Converts integer number to format based on locale (wp-includes/functions.php*/
            $pages_text = str_replace("%CURRENT_PAGE%", number_format_i18n($paged), $pagenavi_options['pages_text']);
            $pages_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pages_text);
            echo $before.'<div class="pagenavi">'."\n";

            if(!empty($pages_text)) {
                echo '<span class="pages">'.$pages_text.'</span>';
            }
            //Displays a link to the previous post which exists in chronological order from the current post.
            /*http://codex.wordpress.org/Function_Reference/previous_post_link*/
            /*previous_posts_link($pagenavi_options['prev_text']);*/

            if ($start_page >= 2 && $pages_to_show < $max_page) {
                $first_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['first_text']);
                //esc_url(): Encodes < > & " ' (less than, greater than, ampersand, double quote, single quote).
                /*http://codex.wordpress.org/Data_Validation*/
                //get_pagenum_link():(wp-includes/link-template.php)-Retrieve get links for page numbers.
                echo '<a href="'.esc_url(get_pagenum_link()).'" class="first" title="'.$first_page_text.'">1</a>';
                if(!empty($pagenavi_options['dotleft_text'])) {
                    echo '<span class="expand">'.$pagenavi_options['dotleft_text'].'</span>';
                }
            }

            if($larger_page_to_show > 0 && $larger_start_page_start > 0 && $larger_start_page_end <= $max_page) {
                for($i = $larger_start_page_start; $i < $larger_start_page_end; $i+=$larger_page_multiple) {
                    $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
                    echo '<a href="'.esc_url(get_pagenum_link($i)).'" class="single_page" title="'.$page_text.'">'.$page_text.'</a>';
                }
            }

            for($i = $start_page; $i  <= $end_page; $i++) {
                if($i == $paged) {
                    $current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['current_text']);
                    echo '<span class="current">'.$current_page_text.'</span>';
                } else {
                    $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
                    echo '<a href="'.esc_url(get_pagenum_link($i)).'" class="single_page" title="'.$page_text.'">'.$page_text.'</a>';
                }
            }

            if ($end_page < $max_page) {
                if(!empty($pagenavi_options['dotright_text'])) {
                    echo '<span class="expand">'.$pagenavi_options['dotright_text'].'</span>';
                }
                $last_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['last_text']);
                echo '<a href="'.esc_url(get_pagenum_link($max_page)).'" class="last" title="'.$last_page_text.'">'.$max_page.'</a>';
            }
            /* next_posts_link($pagenavi_options['next_text'], $max_page); */

            if($larger_page_to_show > 0 && $larger_end_page_start < $max_page) {
                for($i = $larger_end_page_start; $i <= $larger_end_page_end; $i+=$larger_page_multiple) {
                    $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
                    echo '<a href="'.esc_url(get_pagenum_link($i)).'" class="single_page" title="'.$page_text.'">'.$page_text.'</a>';
                }
            }
            echo '</div>'.$after."\n";
        }
    }
}

// -------------------------------------------------------------
// 04. Include Featured image in RSS feed
// -------------------------------------------------------------

add_filter('the_excerpt_rss', 'eg_insertthumbnailrss');
add_filter('the_content_feed', 'eg_insertthumbnailrss');
function eg_insertthumbnailrss($content) {
   global $post;
   if ( has_post_thumbnail( $post->ID )) {
    $content = "<p>" . get_the_post_thumbnail ( $post->ID, 'featured-image' ) . "</p><br />" . $content;
  }
  return $content;
}

// -------------------------------------------------------------
 // 05. Enable Widgets
 // -------------------------------------------------------------

add_action('widgets_init', 'svelte_register_sidebars');
function svelte_register_sidebars(){
	register_sidebar(array(
		'name' => 'Post Sidebar',
		'id' => 'sidebar_posts',
		'before_widget' => '<div class="sidebar-widget">',
		'after_widget' => '</div><div class="clear-widget"></div>',
		'before_title' => '<span class="sidebar-widget-title">',
		'after_title' => '</span>',
	));
	
register_sidebar(array(
	'name' => 'Header',
	'id' => 'sidebar_header',
	'before_widget' => '<div class="header-widget">',
	'after_widget' => '</div>',
	'before_title' => '<span class="header-widget-title">',
	'after_title' => '</span>',
));	

register_sidebar(array(
	'name' => 'Footer Left',
	'id' => 'sidebar_footer_left',
	'before_widget' => '<div class="footer-widget">',
	'after_widget' => '</div>',
	'before_title' => '<span class="footer-widget-title">',
	'after_title' => '</span>',
));

register_sidebar(array(
	'name' => 'Footer Middle',
	'id' => 'sidebar_footer_mid',
	'before_widget' => '<div class="footer-widget">',
	'after_widget' => '</div>',
	'before_title' => '<span class="footer-widget-title">',
	'after_title' => '</span>',
));

register_sidebar(array(
	'name' => 'Footer Right',
	'id' => 'sidebar_footer_right',
	'before_widget' => '<div class="footer-widget" id="footer-widget-right">',
	'after_widget' => '</div>',
	'before_title' => '<span class="footer-widget-title">',
	'after_title' => '</span>',
));
	
}

// -------------------------------------------------------------
// 06. Svelte Options & Recommendations Panels
// -------------------------------------------------------------

 add_action('admin_menu', 'svelte_options_menu');
 /*adding recommendation page on theme*/
 add_action('admin_menu', 'svelte_recommendations_menu');
 function svelte_options_menu() {
 	add_theme_page("Svelte Options", "Theme Options", 'edit_themes', basename(__FILE__), 'svelte_options_page');
 }
 function svelte_recommendations_menu() {
	add_theme_page("Recommendations", "Recommendations", 'read', 'recommendations', 'svelte_recommendations_page');
 }

function svelte_recommendations_page()
{
	 /*Your HTML code for recommendations page goes over here..*/
	 ?>
	 
	<div class="wrap" style="width: 600px;">
	  
	  <h2>Svelte Recommendations & Tips</h2>
	  
	  <h3>Updates and Backing Up</h3>
	  
	  <p>All ThemeCobra themes are continuously updated and improved. Each time a new update goes live, 
	  you receive an update notification in your WordPress Dashboard. What is important to know is if you update
	  the theme using the update function, all your custom code edits are overwritten. So you will lose custom code edits.</p>
	  
	  <p>To ensure your updates go smoothly, we recommend these 2 plugins:</p>
	  
	  <p>
	    For <strong>statistics</strong>, use the very lightweight plugin called <a href="http://wordpress.org/extend/plugins/googleanalytics/" target="_blank">Google Analytics</a><br />
     For <strong>custom CSS edits</strong>, use this neat plugin called <a href="http://wordpress.org/extend/plugins/pc-custom-css/  " target="_blank">PC Custom CSS</a><br /><br />	
     <em>The above two plugins store stats and style info outside of the theme folder, so upgrading your theme does not effect the relevant code.</em>  
	  </p>
	  
	  <h3>Image Sizes</h3>
	  
	  <p>
	    Set your 'Large Image Size' at 620px wide in the <a href="<?php echo home_url(); ?>/wp-admin/options-media.php">Media section</a> of Settings. This will optimize image load as that is the max-width of the content throughout the blog.
	  </p>
	  
   <h2>Follow ThemeCobra</h2>
   
   <p>To make sure you are the first to know about new ThemeCobra themes, follow us:</p>
   <p>  
     <a href="http://eepurl.com/rIDub" target="_blank">Newsletter</a> |    
     <a href="http://twitter.com/ThemeCobra" target="_blank">Twitter</a> | 
     <a href="http://www.facebook.com/ThemeCobra" target="_blank">Facebook</a> | 
     <a href="http://themecobra.com" target="_blank">Visit Website</a>
   </p>

	</div> <!-- #wrap -->
<?php }
function svelte_options_page()
{
	if (@$_POST['update_themeoptions'] == 'true' ) {svelte_themeoptions_update(); }
	?>
	<div class="wrap">

	    <h2>Svelte Theme Options</h2>
	    <?php
	    if (@$_POST['action'] == 'save') {
	    ?>
	    <div style="border-radius: 2px; height: 20px; width: 360px; background-color: #d8fcc4; text-align:center; padding:5px;">
	    Nice one! Theme options updated.
	    </div>
	    <?php } ?>

	    <form method="POST" action="">
	        <input type="hidden" name="update_themeoptions" value="true" />

	        <p>Simply fill out as much as you can below, hit 'Update Options' at the bottom and you are winning!</p>
	        <p>Problems? Visit the <a href="http://themecobra.com/support/category/svelte/" target="_blank" title="See Svelte Documentation">svelte Documentation</a> online.</p>
	        <p>Also don't forget to read our <a href="<?php echo home_url(); ?>/wp-admin/themes.php?page=recommendations" title="See Svelte Recommendations">svelte Recommendations</a> to optimize your site.</p>
	        <br />

	        <h3>Normal Logo</h3>
	        <p><i>Full URL, recommended 50px high</i></p>
	        <p><input type="text" name="logo" id="logo" size="40" value="<?php echo get_option('svelte_logo'); ?>" /></p>
	        <br />

	        <h3>Favicon</h3>
	        <p><i>Full URL, recommended 32px x 32px</i></p>
	        <p><input type="text" name="favicon" id="favicon" size="40" value="<?php echo get_option('svelte_favicon'); ?>" /></p>
            <br />		
            
                           
			<h3>Home Page Slider Category</h3>
			<p>
            <?php wp_dropdown_categories(array('show_count' => 1, 'selected' => get_option('svelte_sliderCategory'),'hide_empty' => 1, 'name' => 'categorySlider', 'hierarchical' => true)); ?>            
            </p>
			<br />	
	    <input type="hidden" name="action" value="save" />
	    <p><input type="submit" name="search" value="Update Options" class="button" /></p>
	  </form>

	 </div> <!-- #wrap -->

	 <?php
} 

function svelte_themeoptions_update(){
	update_option('svelte_logo', $_POST['logo']);
	update_option('svelte_favicon', $_POST['favicon']);
	update_option('svelte_sliderCategory', $_POST['categorySlider']);
}

// -------------------------------------------------------------
// 07. Theme Customizer
// ------------------------------------------------------------- 

// Register svelte customizer 	
add_action( 'customize_register', 'svelte_options_theme_customizer_register' );
function svelte_options_theme_customizer_register(WP_Customize_Manager $wp_customize) {

// Deregister some sections 	
$wp_customize->remove_section( 'title_tagline');
$wp_customize->remove_section( 'nav');
$wp_customize->remove_section( 'static_front_page');
	
/// ----------------------------		
/// Add Text & Links section 	
/// ----------------------------

	/* Add Section */
	$wp_customize->add_section( 'svelte_options_theme_customizer_appearance', array(
		'title' => __( 'Text & Links', 'svelte_options_theme_customizer' ),
		'priority' => 100
	) );
	
	/* Link Color */
	$wp_customize->add_setting( 'svelte_options_theme_customizer[svelte_link_color]', array(
		'default' => '#127BFF'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'svelte_options_theme_customizer_link_color', array(
		'label'    => __( 'Link Color', 'svelte' ),
		'section'  => 'svelte_options_theme_customizer_appearance',
		'settings' => 'svelte_options_theme_customizer[svelte_link_color]',
		'priority' => 1,
		) ) );			
	
	
} // don't delete this guy

/// ----------------------------		
/// Embed custom styles in head 	
/// ----------------------------

  add_action('wp_head', 'svelte_customizer_styles');
  function svelte_customizer_styles(){
	$color = get_theme_mod('svelte_options_theme_customizer');
	$color = wp_parse_args($color, array(
		'svelte_link_color' => '#127BFF',		
	));
	$background = get_option('svelte_options_theme_customizer');
	$background = wp_parse_args($background, array(
    'svelte_browser_background_image' => get_template_directory_uri().'/img/bg.jpg',
    'svelte_headfoot_background_image' => get_template_directory_uri().'/img/bg-dark.jpg',
	));
	
	$logourlmobile = get_option('svelte_logo_mobile');
	
	?>

	<style>
	
  /* These must replicate the theme customizer */
  /* Numbers in brackets show priority in customizer section */
	
	  /* Link Color (1) */
    #posts .post a:hover .post-title h3,
    .post-single .post-entry a:hover,
    .post-single .post-entry p a:hover,
    #browsing a:hover,
    #navigation li a:hover,
    #navigation li ul li a:hover,
    .post-single .post-entry .post-meta .post-meta-author a,
    .sidebar-widget a,
    .sidebar-widget p a,
    .post-author-info-link a,
    .sidebar-widget ul li,
    .sidebar-widget ul li a:hover,
    .post-single .post-entry .tags a:hover,
    .post-single .post-entry .post-cat a:hover,
    .footer-widget a:hover, 
    .footer-widget p a:hover, 
    #commentform p a
		{color: <?php echo $color['svelte_link_color']; ?> !important;}

	  /* Link Border Color (1) */		
	  #featured .theme-svelte .nivo-controlNav a:hover,
		.sidebar-widget a, 
    .sidebar-widget p a,
    .sidebar-widget a:hover, 
    .sidebar-widget p a:hover,
    .post-author-info-link a,
    .post-single .post-entry a, 
    .post-single .post-entry p a,
    .post-single .post-entry .tags a:hover,
    .post-single .post-entry .tags a:hover:before,
    .post-single .post-entry .tags a:hover:after,        
    .post-single .post-entry .post-cat a:hover,
    .footer-widget a, 
    .footer-widget p a,
    #top-search input#search-form-field:focus,
    .comment-bottom input#com-submit:hover    
    {border-color: <?php echo $color['svelte_link_color']; ?> !important;}
    
	  /* Link Background Color (1) */		    
    .comment-bottom input#com-submit:hover	  
    {background-color: <?php echo $color['svelte_link_color']; ?> !important;}	  
	  
	  /* Text Highlight Color (1) */	    
    ::selection {background: <?php echo $color['svelte_link_color']; ?> !important;}
    ::-moz-selection {background: <?php echo $color['svelte_link_color']; ?> !important;}	  
    
    /* SVG Highlight Color (1) */
    .svg-plus,
    .svg-pagi:hover,
    .svg-social:hover,
    .theme-svelte a.nivo-prevNav:hover .svg-pagi-slides,
    .theme-svelte a.nivo-nextNav:hover .svg-pagi-slides
    {fill: <?php echo $color['svelte_link_color']; ?> !important;}
    
    /* Custom overrides to do with ordering  */    
    .commentlist li:last-child {box-shadow: none !important;}

	</style>
	
	<?php // don't delete this guy
	
} // don't delete this guy



// -------------------------------------------------------------
// 08. Enqueue Scripts and Styles
// -------------------------------------------------------------

add_filter( 'template_include', 'var_template_include', 1000 );
function var_template_include( $t ){
    $GLOBALS['current_theme_template'] = basename($t);
    return $t;
}

function get_current_template( $echo = false ) {
    if( !isset( $GLOBALS['current_theme_template'] ) )
        return false;
    if( $echo )
        echo $GLOBALS['current_theme_template'];
    else
        return $GLOBALS['current_theme_template'];
}
add_action('wp_enqueue_scripts', 'svelte_enqueue_scripts');
function svelte_enqueue_scripts(){	
	// svelte Stylesheet	
	wp_enqueue_style( 'svelte', get_stylesheet_uri(), array(), SVELTE_THEME_VERSION );
	

	// jQuery
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js');
	wp_enqueue_script( 'jquery' );
	
	// svelte Scripts
	wp_enqueue_script('nivo-slider', get_template_directory_uri().'/js/jquery.nivo.slider.js'); // Slider code	
}

// Favicon
add_action('wp_head', 'svelte');
function svelte(){
	$favicon = get_option('svelte');
	if ($favicon != '') {
        ?><link rel="shortcut icon" href="<?php echo $favicon; ?>" /><?php
	}
}


// -------------------------------------------------------------
// 09. Comments
// -------------------------------------------------------------

if ( ! function_exists( 'svelte_comment' ) ) :

function svelte_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
			?>
			<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<div id="comment-<?php comment_ID(); ?>">
			  
			  <div class="comment-content">
			    
  			  <div class="comment-content-name">
  			    
  			    					<div class="comment-author vcard">
          						 <?php printf( __( '%s ', 'svelte' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
          						</div><!-- .comment-author .vcard -->
          						<?php if ( $comment->comment_approved == '0' ) : ?>
          							<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'svelte' ); ?></em>
          						<?php endif; ?>

  			  </div><!-- .commentContentName -->			    
			    
  			  <div class="comment-content-date">
  			    
  			    <a href="#comment-<?php comment_ID() ?>"><? if(!function_exists('how_long_ago')){the_time('F jS, Y'); } else { echo how_long_ago(get_comment_time('U')); } ?></a>

  			  </div><!-- .commentContentDate -->		
  			  
  			  <div class="clear"></div>	    
  			  
  			  <div class="comment-content-body">
  			    
  			    <?php comment_text(); ?>

  			  </div><!-- .commentContentBody -->
			  
			  </div><!-- .commentContent -->		
			  
			  <div class="clear"></div>
					
			</div><!-- /#comment  -->
			<?php
			break;
		case 'pingback'  :
		case 'trackback' :
			?>
			<li class="post pingback">
				<p><?php _e( 'Pingback:', 'svelte' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'svelte' ), ' ' ); ?></p>
			<?php
			break;
	endswitch;
}
endif;

// -------------------------------------------------------------
// 10. Timestamps in Comments
// -------------------------------------------------------------

if(!function_exists('how_long_ago')){
        function how_long_ago($timestamp){
                     
            $difference = current_time('timestamp') - $timestamp;

            if($difference >= 60*60*24*365){        // if more than a year ago
                $int = intval($difference / (60*60*24*365));
                $s = ($int > 1) ? 's' : '';
                $r = $int . ' year' . $s . ' ago';
            } elseif($difference >= 60*60*24*7*5){  // if more than five weeks ago
                $int = intval($difference / (60*60*24*30));
                $s = ($int > 1) ? 's' : '';
                $r = $int . ' month' . $s . ' ago';
            } elseif($difference >= 60*60*24*7){        // if more than a week ago
                $int = intval($difference / (60*60*24*7));
                $s = ($int > 1) ? 's' : '';
                $r = $int . ' week' . $s . ' ago';
            } elseif($difference >= 60*60*24){      // if more than a day ago
                $int = intval($difference / (60*60*24));
                $s = ($int > 1) ? 's' : '';
                $r = $int . ' day' . $s . ' ago';
            } elseif($difference >= 60*60){         // if more than an hour ago
                $int = intval($difference / (60*60));
                $s = ($int > 1) ? 's' : '';
                $r = $int . ' hour' . $s . ' ago';
            } elseif($difference >= 60){            // if more than a minute ago
                $int = intval($difference / (60));
                $s = ($int > 1) ? 's' : '';
                $r = $int . ' minute' . $s . ' ago';
            } else {                                // if less than a minute ago
                $r = 'moments ago';
            }

            return $r;
        }
    }
    
// -------------------------------------------------------------
// 11. Set Excerpt Length
// -------------------------------------------------------------    

add_filter('excerpt_length', 'my_excerpt_length');
function my_excerpt_length($length) {
    return '500';
}

function better_excerpt($limit, $id = '') {
global $post;

if($id == '') $id = $post->ID;
else $id = $id;

$postinfo = get_post($id);
if($postinfo->post_excerpt != '')
  $post_excerpt = $postinfo->post_excerpt;
else 
  $post_excerpt = $postinfo->post_content;

$myexcerpt = explode(' ', $post_excerpt, $limit);
if (count($myexcerpt) >= $limit) {
  array_pop($myexcerpt);
  $myexcerpt = implode(' ',$myexcerpt).'...';
} else {
  $myexcerpt = implode(' ',$myexcerpt);
}   
$myexcerpt = preg_replace('`\[[^\]]*\]`','',$myexcerpt);
$stripimages = preg_replace('/<img[^>]+\>/i', '', $myexcerpt);
return $stripimages;
}

// -------------------------------------------------------------
// 12. Slideshow
// -------------------------------------------------------------

the_excerpt_max_charlength(140);

function the_excerpt_max_charlength($charlength) {
	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( '', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo '...';
	} else {
		echo $excerpt;
	}
}

// -------------------------------------------------------------
// 13. Your Custom Code
// -------------------------------------------------------------

/* Add you code below this line */


/* End your code above this line */

// -------------------------------------------------------------
// 14. Theme Version Update Notifications
// -------------------------------------------------------------

require_once('wp-updates-theme.php');
new WPUpdatesThemeUpdater( 'http://wp-updates.com/api/1/theme', 342, basename(get_template_directory()) );
