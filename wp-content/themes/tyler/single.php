<?php

/* Template Name: Work Page */

get_header(); ?>

    <section id="main">
		<main id="viewport" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
            
                <?php the_title() ;?>
				<?php the_field( 'description' ); ?>

			<?php endwhile; ?>

			<?php tyler_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #viewport -->
	</section><!-- #main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>