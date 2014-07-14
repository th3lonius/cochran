<?php get_header(); ?>

<?php

    $args = array(
        'post_type' => 'work',
        'cat' => '4'
    );

    $the_query = new WP_Query( $args );

?>

<section id="exhibitions"></section>

<section id="content" role="main">

<div class="splash"></div>

	<?php if ( $the_query->have_posts() ) : ?>

		<div id="slides">

            <ul class="slides-container">
                
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

            <!-- Slider -->
			<?php if( have_rows('images') ) :

				$rows = get_field('images'); // get all the rows
				$first_row = $rows[0]; // get the first row
				$first_row_image = $first_row['image' ]; // get the sub field value
				$size = 'full';
				$image = wp_get_attachment_image_src( $first_row_image, $size );

			?>
                
                <li>
                    <img src="<?php echo $image[0]; ?>" alt="<?php the_sub_field('title');?>" rel="<?php echo $thumb[0]; ?>" />
                    <figcaption>
                        <h3 class="bkgd-title"><?php the_title() ;?></h3>
                        <date><?php the_field( 'year' ); ?></date>
						<h4 class="image-title"><?php echo the_sub_field('title');?></h4>
                    </figcaption>
                </li>
                
				<?php endif; ?>

			<?php endwhile; ?>

            </ul><!-- .slides-container -->
            
		</div><!-- #slides -->
		
		<?php endif; ?>

</section><!-- #content -->

<?php get_template_part( 'left', 'none' ); ?>
    
<?php get_footer(); ?>