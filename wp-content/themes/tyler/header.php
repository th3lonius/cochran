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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header>
        <nav>
            <ul id="menu">
                <li class="home"><a href="<?php echo site_url(); ?>">Home</a></li>
                <li class="about-link"><a href="">About</a></li>
                <li class="work"><a href="">Work</a></li>
                <li class="exhibitions-link"><a href="">Exhibitions</a></li>
                <li class="links"><a href="">Events</a></li>
            </ul>
            <ul id="social">
                <li class="linkedin"><a href="">linkedIn</a></li>
                <li class="twitter"><a href="">Twitter</a></li>
                <li class="facebook"><a href="">Facebook</a></li>
            </ul>
		</nav><!-- #site-navigation -->
		<div role="banner"></div>
	</header><!-- #masthead -->

