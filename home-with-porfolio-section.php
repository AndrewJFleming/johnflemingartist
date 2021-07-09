<?php
/*
Template Name: Homepage with Porfolio Section
*/
?>
<?php
    get_header();
?>
<p class="pageTypeHint">home-with-porfolio-section.php</p>

<div class="page-wrap">
    <div class="container">

        <!-- home-with-porfolio-section.php.bak has title and content code. -->

        <!-- Portfolio menu above -->
        <?php if(is_active_sidebar('portfolio-widget') ):?>
            <?php dynamic_sidebar('portfolio-widget');?>
        <?php endif;?> 

        <div class="grid-container">

        <?php
        // Custom Post Query 

        $count = get_theme_mod('themeslug_number_setting_id', 10);

        $args = array (
            'posts_per_page' => $count,
            'post_type' => 'portfolio',

            // Display only portfolio posts with 'featured' category.
            'tax_query' => array(
                array(
                    'taxonomy' => 'portfolio-categories',
                    'field' => 'slug',
                    'terms' => 'featured'
                )),

            // Display only portfolio posts with 'featured' tag.
            // 'tag' => 'featured'
        );

        $the_query = new WP_Query($args);
        

        while( $the_query->have_posts() ) : $the_query->the_post();
        ?>


        <?php get_template_part('includes/section', 'homepage-gallery');?>

        <?php endwhile; ?>

        <!-- Next/Previous Page -->
        <div class="page-nav">                        

        </div>

        <?php wp_reset_postdata(); ?>

 


        </div> <!-- grid-container -->








    </div><!-- END container -->

</div><!-- END page-wrap -->  
        
</div><!-- END main -->    

<?php get_footer(); ?>