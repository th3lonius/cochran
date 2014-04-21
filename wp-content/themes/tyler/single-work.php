<?php

/* Template Name: Work Page */

get_header(); ?>

    <section id="content" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
            
            <!-- Slider -->
            <?php if(get_field('images')): ?>
            
            <ul class="bxslider">
                <?php while(the_repeater_field('images')): ?>
                <li>
                    <?php $image = wp_get_attachment_image_src(get_sub_field('image'), 'full'); ?>
                    <img src="<?php echo $image[0]; ?>" alt="<?php the_sub_field('title');?>" rel="<?php echo $thumb[0]; ?>" />
                </li>
                <?php endwhile; ?>
            </ul>
            
            <?php endif; ?>
            
                    <figcaption class="bkgd-desc">
                        <h3 class="bkgd-title"><?php the_title() ;?></h3>
                        <p id="bkgd-sub"><?php the_field( 'date' ); ?></p>
                        <div class="right-tog">
                            <div class="right-tog-plus"></div>
                            <p class="p-alt">Learn More</p>
                        </div>
                    </figcaption>
                    <article class="right">
                        <div id="content-cont">
                            <h2><?php the_title() ;?></h2>
                            <?php the_field( 'description' ); ?>
                        </div>
                    </article>
            
			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

	</section><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

