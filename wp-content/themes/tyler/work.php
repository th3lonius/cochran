<?php

/* Template Name: Work Page */

get_header(); ?>

<?php

    $args = array(
        'post-type' => 'work'
    );

    $the_query = new WP_Query( $args );

?>

    <section id="main">
		<main id="viewport" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            
                <?php get_template_part( 'content', 'none' ); ?>

			<?php endwhile; endif; ?>

		</main><!-- #viewport -->
	</section><!-- #main -->

<?php get_footer(); ?>