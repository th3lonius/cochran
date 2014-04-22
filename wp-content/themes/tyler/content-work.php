<?php

/* Template Name: Work Page */

get_header(); ?>

<span style="font-size: 26px; color: red; float: right;">I am content-work</span>

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
            
                <a href="<?php the_permalink() ;?>"><?php the_title() ;?></a>
				<?php the_field( 'description' ); ?>

			<?php endwhile; ?>

		<?php else : ?>

			

		<?php endif; ?>

		</main><!-- #viewport -->
	</section><!-- #main -->

<?php get_footer(); ?>