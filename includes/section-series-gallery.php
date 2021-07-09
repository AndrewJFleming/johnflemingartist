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

                        <a class="series-item-img" href="<?php echo $attachment['description'];?>">
                            <img class="w-100 py-2" src="<?php echo $attachment['sizes']['thumbnail']['url']; ?>" alt="<?php echo $attachment['title'];?>-thumb">
                        </a>

                        <p class="credit"><?php echo $attachment['caption'];?></p>

                        </div>

                        <?php
                    }
                endif;
            endwhile;
            ?>