<?php
   // Include WordPress

  define('WP_USE_THEMES', false);

  require_once('../../../wp-blog-header.php'); 
  
  ?>

<?php

/* Template Name: exhibition */

?>

<?php

    $args = array(
        'post_type' => 'exhibition'
    );

    $work_query = new WP_Query( $args );

?>

<?php if ( $work_query->have_posts() ) : ?>
    
    <ul id="exhibition-list">
    
        <li><h2>Exhibitions</h2></li>

    <?php /* Start the Loop */ ?>
    <?php while ( $work_query->have_posts() ) : $work_query->the_post(); ?>

        <li>
            <a href="<?php the_field( 'link' ); ?>">
            <h3><?php the_title() ;?></h3>
            <h4><?php the_field( 'space' ); ?> // <?php the_field( 'location' ); ?></h4>
            </a>
        </li>

    <?php endwhile; ?>

    </ul>

<?php endif; ?>