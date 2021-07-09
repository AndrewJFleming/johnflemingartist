<?php if( have_posts() ): while( have_posts() ): the_post();?>

<?php add_filter('the_content', 'remove_shortcode_from'); ?>
    <?php the_content(); ?>
<?php remove_filter('the_content', 'remove_shortcode_from') ?>

<?php endwhile; else: endif;?>