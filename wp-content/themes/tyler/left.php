<?php

/* Template Name: Work List Section */

get_header(); ?>

<?php

    $args = array(
        'post_type' => 'work'
    );

    $work_query = new WP_Query( $args );

?>

<section class="left">

<?php if ( $work_query->have_posts() ) : ?>
    
    <ul class="work-grid">

    <?php /* Start the Loop */ ?>
    <?php while ( $work_query->have_posts() ) : $work_query->the_post(); ?>
        
        <li>
            <a class="work-link" href="<?php the_permalink(); ?>"></a>
            <div>
                <h3><?php the_title() ;?></h3>
                <p><?php the_field( 'date' ); ?></p>
            </div>
        </li>

    <?php endwhile; ?>

    </ul>
    
<?php endif; ?>
    
<?php wp_reset_postdata(); ?>
    
</section>