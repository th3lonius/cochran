<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', false);

/** Loads the WordPress Environment and Template */
require( dirname( __FILE__ ) . '/wp-blog-header.php' );

include('head.php'); ?>

<body>
    
    <section id="main">
        <?php include('menu.php'); ?>
        
        <main id="viewport">
    
    		<?php
			if ( have_posts() ) :
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );

				endwhile;
				// Previous/next post navigation.
				

			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );

			endif; ?>
        
            <figure><img class="img-bkgd" src="css/images/images/portrait1.jpg"/></figure>
            <figcaption class="bkgd-desc">
                <h3 id="bkgd-title">Frank Gehry</h3><br/>
                <p id="bkgd-sub">b. February 28, 1929</p>
                <div id="right-tog">
                    <div id="right-tog-plus"></div>
                    <p class="p-alt">Learn More</p>
                </div>
            </figcaption>
        </main>
    </section>
    

    <?php include('right.php'); ?>
    <?php include('footer.php'); ?>
    
</body>
</html>
    
    