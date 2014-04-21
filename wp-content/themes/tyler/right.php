<?php

/* Template Name: Right Info Section */

get_header(); ?>

<?php

    $args = array(

    );

    $info_query = new WP_Query( $args );

?>

<section class="left">

<?php if (is_front_page() || is_home()) {

<?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>

		<article class="right">
			<div id="content-cont">
				<?php the_field( 'description' ); ?>
			</div>
		</article>

    <?php endwhile; ?>

<?php endif; ?>

} else {

<?php if ( $info_query->have_posts() ) : ?>

    <?php while ( $info_query->have_posts() ) : $info_query->the_post(); ?>

		<article class="right">
			<div id="content-cont">
				<?php the_field( 'description' ); ?>
			</div>
		</article>

    <?php endwhile; ?>

<?php endif; ?>

}

<?php wp_reset_postdata(); ?>

</section>