<?php
    get_header();
?>
<p class="pageTypeHint">archive-portfolio.php</p>

<div class="page-wrap">
    <div class="container">
                    
        <!-- Portfolio menu above -->
        <?php if(is_active_sidebar('portfolio-widget') ):?>
            <?php dynamic_sidebar('portfolio-widget');?>
        <?php endif;?> 

        <h1 class="taxonomy-title"> <?php echo get_theme_mod('portfolio_archive_title', 'Portfolio'); ?></h1>

        <div class="grid-container">
            <?php get_template_part('includes/section', 'archive-gallery');?>
        </div>
        
        <!-- Next/Previous Page -->
        <div class="page-nav">                        
            <?php jfa_pagination(); ?>
        </div>

    </div><!-- END container -->

</div><!-- END page-wrap -->  
        
</div><!-- END main -->    

<?php get_footer(); ?>