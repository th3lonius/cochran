<?php

/* Template Name: Work Page */

get_header(); ?>

<?php get_template_part( 'exhibition', 'list' ); ?>

<?php

    $args = array(
        'post_type' => 'work'
    );

    $the_query = new WP_Query( $args );

?>

<span style="font-size: 26px; color: red; float: right;">I am work</span>

    <section id="content" role="main">

		<?php if ( $the_query->have_posts() ) : ?>

			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            
                

			<?php endwhile; endif; ?>

	</section><!-- #content -->

<?php get_footer(); ?>