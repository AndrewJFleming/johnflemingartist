<?php
/* The loop */
while ( have_posts() ) :
    the_post();
    if ( get_post_gallery() ) :
        $gallery = get_post_gallery( get_the_ID(), false );
        /* create an array of IDs from  */
        $gids = explode( ",", $gallery['ids'] );
        /* Loop through all the image and output them one by one */
        ?>

        <ul class="row list-unstyled gallery-ul">

        <div class="loader"></div>
        
        <?php foreach ($gids as $id) {
            /* pull all the available attachment data with the new function */
            $attachment = wp_prepare_attachment_for_js($id);
            /* Uncomment the next line to see all the available data in $attachment */
            // var_dump($attachment); 
            /* pick and choose which bits are needed */
            ?>

            <li class="col-6 col-sm-4 col-md-3 gallery pt-3">

                <a href="<?php echo $attachment['sizes']['full']['url']; ?>" class="gallery-item">
                    <img class="w-100" src="<?php echo $attachment['sizes']['thumbnail']['url']; ?>" alt="<?php echo $attachment['title'];?>-thumb">
                </a>

                <p class="gallery-item-caption"><?php echo $attachment['caption']; ?></p>

            </li>

            <?php
        } ?>

        </ul>

        <?php endif;
endwhile;
?>