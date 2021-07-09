<?php
/*
Template Name: Portfolio series template
Template Post Type: portfolio
*/
?>

<?php
    get_header();
?>
<p class="pageTypeHint">template-portfolio-series.php</p>

    <div class="page-wrap">
        <div class="container">

            <h4 class="page-title mb-2"><?php the_title();?></h4>

            <?php get_template_part('includes/section', 'single-content');?>

            <hr class="mt-3 mb-2">

            <p class="font-italic mb-4">
                <?php echo get_theme_mod(
                'portfolio_series_message', 
                'To view a project belonging to this series, please click on one of the thumbnails below.'); 
                ?>
            </p>

            <div class="row">


            <?php
            /* The loop */
            while ( have_posts() ) :
                the_post();
                if ( get_post_gallery() ) :
                    $gallery = get_post_gallery( get_the_ID(), false );
                    /* create an array of IDs from  */
                    $gids = explode( ",", $gallery['ids'] );
                    /* Loop through all the image and output them one by one */
                    foreach ($gids as $id) {
                        /* pull all the available attachment data with the new function */
                        $attachment = wp_prepare_attachment_for_js($id);
                        /* Uncomment the next line to see all the available data in $attachment */
                        // var_dump($attachment); 

                        /* pick and choose which bits are needed */
                        ?>
            
            
                        <div class="col-6 col-lg-3">

                        <a class="front-item-title" href="<?php echo $attachment['description'];?>"><?php echo $attachment['title'];?></a>

                        <a href="<?php echo $attachment['description'];?>">
                            <img class="w-100 py-2" src="<?php echo $attachment['sizes']['thumbnail']['url']; ?>" data-target="#carouselTarget" data-slide-to="<?php echo $i;?>" alt="<?php echo $attachment['title']; ?>-thumb">
                        </a>

                        <p class="credit"><?php echo $attachment['caption'];?></p>

                        </div>

                        
                        <?php
                    }
                endif;
            endwhile;
            ?>


            </div><!-- END First Row -->

        </div><!-- END container -->

</div><!-- END page-wrap -->  
    
</div><!-- END main -->    

<?php get_footer(); ?>