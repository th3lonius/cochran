<?php

/* Template Name: Right Info Section */

?>

<section class="right">
    
    <a class="exit"></a>
    
<?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>

			<div id="content-cont">
                <h3 class="bkgd-title"><?php the_title() ;?></h3>
                <date><?php the_field( 'year' ); ?></date>
				<?php the_field( 'description' ); ?>
				<h5><?php previous_post_link( '%link', '<< Previous' ); ?></h5>
				<h5><?php next_post_link( '%link', 'Next >>' );	?></h5>
			</div>

    <?php endwhile; ?>

<?php endif; ?>

</section>