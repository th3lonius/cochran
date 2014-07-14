<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package tyler
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=no">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div class="blurry"></div>
	
	<header>
        <nav>
            <ul class="main-menu">
                <li class="home"><a href="<?php echo site_url(); ?>">Home</a></li>
                <li class="about-link"><a href="<?php echo site_url(); ?>/about">About</a></li>
                <li class="work-link"><a href="">Work</a></li>
                <li class="exhibitions-link"><a href="">Exhibitions</a></li>
            </ul>
           
<?php
 
    $args = array(
        'post_type' => 'social'
    );

    $social_query = new WP_Query( $args );

?>
            <ul class="social-links">
                <?php while ( $social_query->have_posts() ) : $social_query->the_post(); ?>
                <li class="linkedin"><a href="<?php the_field( 'linkedin' ); ?>">LinkedIn</a></li>
                <li class="twitter"><a href="<?php the_field( 'twitter' ); ?>">Twitter</a></li>
                <li class="facebook"><a href="<?php the_field( 'facebook' ); ?>">Facebook</a></li>
                <?php endwhile; ?>
            </ul>
		</nav><!-- #site-navigation -->
		<div role="banner"></div>
	</header><!-- #masthead -->

