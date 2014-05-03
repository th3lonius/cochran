<?php

/* Template Name: Exhibition Page */

get_header(); ?>

<?php get_template_part( 'exhibition', 'list' ); ?>

    <section id="content" role="main">

		<?php if ( have_posts() ) : ?>

		<div id="slides">

			<?php while ( have_posts() ) : the_post(); ?>

            <!-- Slider -->
            <?php if(get_field('images')): ?>

            <ul class="slides-container">

                <?php while(the_repeater_field('images')): ?>

                <li>
                    <?php $image = wp_get_attachment_image_src(get_sub_field('image'), 'full'); ?>
                    <img src="<?php echo $image[0]; ?>" alt="<?php the_sub_field('title');?>" rel="<?php echo $thumb[0]; ?>" />
                    <figcaption class="bkgd-desc">
                        <h3 class="bkgd-title"><?php the_title() ;?></h3>
                        <date><?php the_field( 'year' ); ?></date>
						<h4 class="image-title"><?php echo the_sub_field('title');?></h4>
                        <div class="right-tog">
                            <div class="right-tog-plus"></div>
                            <p class="p-alt">Learn More</p>
                        </div>
                    </figcaption>
                </li>

                <?php endwhile; ?>

            </ul><!-- .slides-container -->
            
            <nav class="slides-navigation">
                <a href="#" class="next"></a>
                <a href="#" class="prev"></a>
            </nav>

            <?php endif; ?>

			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</div><!-- #slides -->

	</section><!-- #content -->

    <?php get_template_part( 'left', 'none' ); ?>

	<?php get_template_part( 'right', 'none' ); ?>

<?php get_footer(); ?>