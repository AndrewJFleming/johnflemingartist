<?php /* Template Name: AboutTemplate */ ?>

<?php
    get_header();
?>
<p class="pageTypeHint">page-about.php</p>

    <div class="page-wrap">
        <div class="container">
            
            <h1 class="page-title"><?php the_title(); ?></h1>

            <div class="row">

                <!-- Content Column -->
                <div class="col-12">
                    <?php if( have_posts() ): while( have_posts() ): the_post();?>
                        
                        <?php if(has_post_thumbnail()) : ?>
                            
                                <img class="about-portrait" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">

                        <?php endif;?>
                        
                        <?php the_content();?>
                            
                    <?php endwhile; else: endif;?>
                </div>
                        
            </div><!-- END First Row -->
            

        </div><!-- END container -->


    </div><!-- END page-wrap -->  
         
</div><!-- END main -->    

<?php
    get_footer();
?>