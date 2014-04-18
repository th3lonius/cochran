<?php get_header(); ?>

    <section id="main">
		<main id="viewport" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>


			<?php endwhile; ?>

			<?php tyler_paging_nav(); ?>

		<?php else : ?>



		<?php endif; ?>

		</main><!-- #viewport -->
	</section><!-- #main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>