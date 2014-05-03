<?php

/* Template Name: Right Info Section */

?>

<section class="right">
    
    <a role="close"></a>
    
<?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>

			<div id="content-cont">
                <h3 class="bkgd-title"><?php the_title() ;?></h3>
                <date><?php the_field( 'year' ); ?></date>
				<?php the_field( 'description' ); ?>
			</div>

    <?php endwhile; ?>

<?php endif; ?>

</section>