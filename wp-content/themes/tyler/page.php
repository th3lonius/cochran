<?php get_header(); ?>

<?php get_template_part( 'events', 'none' ); ?>

    <section id="content" role="main">

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

			<?php endwhile; ?>

			<?php/* tyler_paging_nav(); */?>

		<?php else : ?>



		<?php endif; ?>

	</section><!-- #content -->

    <?php get_template_part( 'left', 'none' ); ?>

	<?php get_template_part( 'right', 'none' ); ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>