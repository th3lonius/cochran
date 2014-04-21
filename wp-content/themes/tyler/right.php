<?php

/* Template Name: Right Info Section */

get_header(); ?>

<?php

    $args = array(

    );

    $info_query = new WP_Query( $args );

?>

<section class="right">

<?php if ( $info_query->have_posts() ) : ?>

    <?php while ( $info_query->have_posts() ) : $info_query->the_post(); ?>

		<article class="right">
			<div id="content-cont">
				<?php the_field( 'description' ); ?>
			</div>
		</article>

    <?php endwhile; ?>

<?php endif; ?>


<?php wp_reset_postdata(); ?>

</section>