<?php
/**
 * The template for displaying posts in the Gallery post format
 *
 * @package WordPress
 * @subpackage tyler
 * @since tyler 1.0
 */
?>

<section id="left">
    <ul class="work-grid">
        <?php query_posts('category_name=portfolio&posts_per_page=999'); ?>
        <?php while (have_posts()) : the_post(); ?>
        <li id="work-one">
            <a class="work-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?>
                <?php the_post_thumbnail(); ?>
            </a>
            <div>
                <?php the_title( '<h3>', '</h3>' ); ?>
                <p><?php $key="creation-date"; echo get_post_meta($post->ID, $key, true); ?></p>
            </div>
        </li>
        <?php endwhile; ?>
    </ul>
</section>