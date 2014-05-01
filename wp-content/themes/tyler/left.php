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
    
    <ul id="filter">
        <?php wp_list_categories('hierarchical=0&title_li=&show_option_all=All&hide_empty=0&exclude=1'); ?>
        <a role="close"></a>
    </ul>

    <ul class="work-grid">

    <?php /* Start the Loop */ ?>
    <?php while ( $work_query->have_posts() ) : $work_query->the_post(); ?>

        <?php if( have_rows('images') ) :

            $rows = get_field('images'); // get all the rows
            $first_row = $rows[0]; // get the first row
            $first_row_image = $first_row['image' ]; // get the sub field value
			$size = 'thumbnail';
            $image = wp_get_attachment_image_src( $first_row_image, $size );

        ?>

        <li class="<?php
 foreach((get_the_category()) as $category) {
 echo $category->cat_name . ' ';
 }
 ?>">
			<img src="<?php echo $image[0]; ?>"/>
            <a class="work-link" href="<?php the_permalink(); ?>"><div><h3><?php the_title() ;?></h3></div></a>
        </li>

		<?php endif; ?>

    <?php endwhile; ?>

    </ul>

<?php endif; ?>

</section>