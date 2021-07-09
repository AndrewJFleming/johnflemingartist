<?php
    get_header();
?>
<p class="pageTypeHint">index.php</p>

<div class="page-wrap">
    <div class="container">             

        <h1 class="page-title"><?php the_title(); ?></h1>

        <div class="grid-container">

            <?php if( have_posts() ): while( have_posts() ): the_post();?>

                <div class="grid-item">
                    <?php if(has_post_thumbnail()):?>
                        <a href="<?php the_permalink();?>" class="details-wrapper">
                            <img src="<?php the_post_thumbnail_url('');?>">
                        </a>
                    <?php endif;?>
                </div>

            <?php endwhile; else: endif;?>

        </div>
        
        <!-- Next/Previous Page -->
        <div class="page-nav">                        
            <?php jfa_pagination(); ?>
        </div>

    </div><!-- END container -->

</div><!-- END page-wrap -->  
        
</div><!-- END main -->    

<?php get_footer(); ?>