<?php if(is_home()){
?>

        <ul class="filters">
        
        <?php
            $categories = get_categories();
            foreach($categories as $category)
                echo  '<li class="filter" data-filter="' . $category . -> category_nicename ">$category->cat_name</li>'; ?>
            
        </ul>

<?php }?>