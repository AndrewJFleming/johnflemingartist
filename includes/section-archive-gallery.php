<?php if( have_posts() ): while( have_posts() ): the_post();?>

    <div class="grid-item">
        <?php if(has_post_thumbnail()):?>
            <a href="<?php the_permalink();?>" class="details-wrapper">
                <span class="details">

                    <div class="caption">

                        <p class="title">
                            <?php the_title();?>
                        </p>

                        <p class="category">
                            <?php
                            // Get terms for post
                            $terms = get_the_terms( $post->ID , 'portfolio-categories' );
            
                            // Loop over each item since it's an array
                            if ( $terms != null ){
                            foreach( $terms as $term ) {

                            if ( $term->slug == 'featured' )
                            continue;

                            // Print the name method from $term which is an OBJECT
                            ?> <p class="grid-item-cat"><?php echo $term->name ;?></p><?php
                            // Get rid of the other data stored in the object, since it's not needed
                            unset($term);
                            } } ?>
                        </p>

                    </div>
                    
                </span>
                <img src="<?php the_post_thumbnail_url('');?>">
            </a>
        <?php endif;?>
    </div>

<?php endwhile; else: endif;?>