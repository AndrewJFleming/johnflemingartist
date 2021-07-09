<footer>

    <div class="container">
        <div class="row">

            <!-- Left Footer -->
            <div class="col-sm-12 footer-col">
                <?php
                wp_nav_menu(
                    array(
                    'theme_location' => 'footer-menu',
                    'menu_class' => 'bottom-bar'
                    )
                );
                ?>
            </div>       
            <!-- END Left Footer -->

        </div><!-- END row -->

        <div class="row">

            <!-- Left Footer -->
            <div class="col-sm-12 footer-col">

                <!-- Author from User Profile setting 'Display name publicly as' -->
                <div class="copyright">
                    <p>&copy; <?php echo Date('Y'); ?> - <?php the_author_meta('display_name', 1); ?></p>
                </div>
                
            </div>       
            <!-- END Left Footer -->

        </div><!-- END row -->
    </div><!-- END container -->
    
</footer>

<?php wp_footer();?>

</body>
</html>