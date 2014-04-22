<?php

/* Template Name: Right Info Section */

?>

<section class="right">

<?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>

			<div id="content-cont">
                <span style="font-size: 26px; color: red; float: right;">I am right</span>
				<?php the_field( 'description' ); ?>
			</div>

    <?php endwhile; ?>

<?php endif; ?>

</section>