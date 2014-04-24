<?php /* Template Name: Work List Section */ ?>

<?php

    $args = array(
        'post_type' => 'work'
    );

    $work_query = new WP_Query( $args );

?>

<span style="font-size: 26px; color: red; float: right;">I am left</span>

<section class="left">

<?php if ( $work_query->have_posts() ) : ?>

    <ul class="work-grid">

    <?php /* Start the Loop */ ?>
    <?php while ( $work_query->have_posts() ) : $work_query->the_post(); ?>

        <?php if( have_rows('images') ) :

            $rows = get_field('images'); // get all the rows
            $first_row = $rows[0]; // get the first row
            $first_row_image = $first_row['image' ]; // get the sub field value
			$size = 'medium';
            $image = wp_get_attachment_image_src( $first_row_image, $size );

        ?>

        <li>
			<img src="<?php echo $image[0]; ?>"/>
            <a class="work-link" href="<?php the_permalink(); ?>"></a>
            <div>
                <h3><?php the_title() ;?></h3>
                <date><?php the_field( 'date' ); ?></date>
            </div>
        </li>

		<?php endif; ?>

    <?php endwhile; ?>

    </ul>

<?php endif; ?>

</section>