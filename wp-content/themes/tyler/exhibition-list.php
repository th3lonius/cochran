<?php /* Template Name: Exhibition List Section */ ?>

<?php

    $args = array(
        'post_type' => 'exhibition'
    );

    $work_query = new WP_Query( $args );

?>

<section id="exhibitions">

<?php if ( $work_query->have_posts() ) : ?>
    
    <ul class="exhibition-list">
    
        <li><h2>Exhibitions</h2></li>

    <?php /* Start the Loop */ ?>
    <?php while ( $work_query->have_posts() ) : $work_query->the_post(); ?>

        <li>
            <a href="<?php the_permalink(); ?>">
            <h3><?php the_title() ;?></h3>
            <h4><?php the_field( 'space' ); ?> // <?php the_field( 'location' ); ?></h4>
            </a>
        </li>

    <?php endwhile; ?>

    </ul>

<?php endif; ?>

</section>