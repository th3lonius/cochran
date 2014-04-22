<?php

/* Template Name: Work Page */

get_header(); ?>

<span style="font-size: 26px; color: red; float: right;">I am single-work</span>

    <section id="content" role="main">

		<?php if ( have_posts() ) : ?>

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
            
			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

	</section><!-- #content -->

    <?php get_template_part( 'left', 'none' ); ?>

	<?php get_template_part( 'right', 'none' ); ?>

<?php get_footer(); ?>