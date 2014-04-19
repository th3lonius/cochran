<?php get_header(); ?>

    <section id="main">
		<main id="content" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
            
            <?php if(get_field('images')): ?>
                <?php while(the_repeater_field('images')): ?>
                <figure>
                    <?php $image = wp_get_attachment_image_src(get_sub_field('image'), 'full'); ?>
                    <img class="img-bkgd" src="<?php echo $image[0]; ?>" alt="<?php the_sub_field('title');?>" rel="<?php echo $thumb[0]; ?>" />
                </figure>
                <?php endwhile; ?>
            <?php endif; ?>
            
            <figcaption class="bkgd-desc">
                <h3 class="bkgd-title"><?php the_title() ;?></h3>
                <date id="bkgd-sub"><?php the_field( 'date' ); ?></date>
                <div class="right-tog">
                    <div class="right-tog-plus"></div>
                    <p class="p-alt">Learn More</p>
                </div>
            </figcaption>
            <article class="right">
                <div id="content-cont">
                    <?php the_field( 'description' ); ?>
                </div>
            </article>

			<?php endwhile; ?>

			<?php/* tyler_paging_nav(); */?>

		<?php else : ?>



		<?php endif; ?>

		</main><!-- #content -->
	</section><!-- #main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>