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
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header role="banner">
        <nav id="main-menu">
            <div id="main-logo"><h1><?php bloginfo( 'name' ); ?></h1></div>
            <?php

                $args = array(
                    'menu' => 'main-menu',
                    'container' => false,
                    'menu_class' => false,
                    'menu_id' => 'menu'
                );
                wp_nav_menu( $args );

            ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

