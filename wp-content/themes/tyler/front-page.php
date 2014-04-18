<?php get_header(); ?>

    <section id="main">
		<main id="viewport" role="main">
                <ul class="bxslider">
                    <?php

                        $args = array(
                            'post-type' => 'work'
                        );

                        $the_query = new WP_Query( $args );

                    ?>
                    <?php if ( have_posts() ) : ?>

                    <?php /* Start the Loop */ ?>
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <li>
                        <figure><img src="<?php the_field( 'homepage_slider_image' ); ?>" alt="<?php the_title(); ?>" /></figure>
                        <figcaption class="bkgd-desc">
                            <h3 id="bkgd-title"><?php the_title(); ?></h3>
                            <p id="bkgd-sub">b. February 28, 1929</p>
                            <div id="right-tog">
                                <div id="right-tog-plus"></div>
                                <p class="p-alt">Learn More</p>
                            </div>
                        </figcaption>
                        <article id="right">
                            <div id="content-cont">
                                <?php the_field( 'description' ); ?>
                                <div class="foot">
                                    <a href="#" id="work-thru" class="click-thru">More work by Gehry</a>
                                    <a href="moreabout.php" id="about-thru" class="click-thru">More about the architect</a>
                                </div>
                            </div>
                        </article>
                    </li>
                    <?php endwhile; endif; ?>
                </ul>


		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #viewport -->
	</section><!-- #main -->

<?php get_footer(); ?>