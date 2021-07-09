<?php
    get_header();
?>
<p class="pageTypeHint">single-portfolio.php</p>

<div class="page-wrap">
        <div class="container">

            <!-- Portfolio menu above -->
            <?php if(is_active_sidebar('portfolio-widget') ):?>
                <?php dynamic_sidebar('portfolio-widget');?>
            <?php endif;?> 

            <h4 class="page-title"><?php the_title();?></h4>

            <?php get_template_part('includes/section', 'single-content');?>
            <?php get_template_part('includes/section', 'magnific');?>

        </div><!-- END container -->

    </div><!-- END page-wrap -->  
        
</div><!-- END main -->    

<?php get_footer(); ?>