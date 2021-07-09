<?php
    get_header();
?>
<p class="pageTypeHint">taxonomy-portfolio-categories.php</p>

<div class="page-wrap">
        <div class="container page-content">
            
            <!-- Portfolio menu above -->
            <?php if(is_active_sidebar('portfolio-widget') ):?>
                <?php dynamic_sidebar('portfolio-widget');?>
            <?php endif;?> 

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