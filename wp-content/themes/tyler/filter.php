<?php /* Template Name: Work List Section */ ?>
    
    <section class="left"> 
   
    <?php // for a given post type, return all
    $post_type = 'work';
    $taxonomy = 'work_category';
    $tax_terms = get_terms($taxonomy, array('orderby' => 'id', 'order' => 'ASC'));

    $tax_query = null;
    $tax_query = new WP_Query($args);
    
    
    if ($tax_terms) {       

        $count=0;
        $args = array(
                'post_type' => $post_type,
                'taxonomy' => $tax_term->slug,
                'posts_per_page' => - 1,
                'orderby' => 'title',
                'order' => 'ASC',
                'caller_get_posts' => 1
                ); // END $args
            $tax_query = null;
            $tax_query = new WP_Query($args);

        echo '<ul class="filters">';  
        foreach ($tax_terms as $tax_term) {
            $count++;

            if ($tax_query->have_posts()) {

                if ($count==1){
                    //echo $count; 
                    echo'<li><span class="filter active" data-filter="all">All</span></li>';
                    }

                echo '<li> <span class="filter" data-filter="'.$tax_term->slug.'">' . $tax_term->name . '</span></li>';
            } // END if have_posts loop             

        } // END foreach $tax_terms

        echo'</ul>';

        ?>
        

        <ul class="work-grid">
        
        <?php while ($tax_query->have_posts()) : $tax_query->the_post(); ?>
            
        <?php if( have_rows('images') ) :

            $rows = get_field('images'); // get all the rows
            $first_row = $rows[0]; // get the first row
            $first_row_image = $first_row['image' ]; // get the sub field value
			$size = 'thumbnail';
            $image = wp_get_attachment_image_src( $first_row_image, $size );

        ?>
            
            <li id="post-<?php the_ID(); ?>" class="portfolio logo1" data-cat="<?php echo $tax_term->slug ;?>">
            	
            	<img src="<?php echo $image[0]; ?>"/>
            	<a class="work-link text-title" href="<?php the_permalink(); ?>" title="<?php the_title();?>"><div><h3><?php the_title() ;?></h3></div></a>
            	<span class="text-category"><?php echo $tax_term->name; ?></span>

            </li>
            
                  <?php endif; ?>          

           <?php endwhile; ?>
        </ul>       
        


    <?php   wp_reset_query();//reset query
    } // END if $tax_terms
    ?>
    
    </section>