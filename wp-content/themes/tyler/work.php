<?php

/* Template Name: Work Page */

get_header(); ?>

<section id="exhibitions"></section>

<?php

    $args = array(
        'post_type' => 'work'
    );

    $the_query = new WP_Query( $args );

?>

    <section id="content" role="main">

		<?php if ( $the_query->have_posts() ) : ?>

			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            
                

			<?php endwhile; endif; ?>

	</section><!-- #content -->

<?php get_template_part( 'left', 'none' ); ?>

<?php get_footer(); ?>