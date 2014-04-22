<?php get_header(); ?>

<section id="content" role="main">
    <figcaption class="bkgd-desc">
        <h3 class="bkgd-title"><?php echo $bloginfo = get_bloginfo( name ); ?></h3>
        <p id="bkgd-sub"><?php the_field( 'date' ); ?></p>
        <div class="right-tog">
            <div class="right-tog-plus"></div>
            <p class="p-alt">Learn More</p>
        </div>
    </figcaption>


    <!-- Home page slider of portfolio work -->
    <?php

        $args = array(
            'post_type' => 'work',
            'category_name' => 'featured'
        );

        $slideshow_query = new WP_Query( $args );

    ?>
    <?php if ( have_posts() ) : ?>

    <ul class="bxslider">

        <?php while ( $slideshow_query->have_posts() ) : $slideshow_query->the_post(); ?>

        <?php if( have_rows('images') ) :

            $rows = get_field('images'); // get all the rows
            $first_row = $rows[0]; // get the first row
            $first_row_image = $first_row['image' ]; // get the sub field value
            $image = wp_get_attachment_image_src( $first_row_image, 'full' );

        ?>

        <li>
            <img src="<?php echo $image[0]; ?>" alt="<?php the_sub_field('title');?>" rel="<?php echo $thumb[0]; ?>" />
        </li>

        <?php endif; ?>

        <?php endwhile; ?>

    </ul>

        <?php endif; ?>

</section><!-- #content -->

    <?php get_template_part( 'left', 'none' ); ?>

	<?php get_template_part( 'right', 'none' ); ?>


<?php get_footer(); ?>