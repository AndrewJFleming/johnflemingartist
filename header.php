<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,400&family=Source+Serif+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,400&display=swap" rel="stylesheet">
  <link href="http://fonts.cdnfonts.com/css/optima" rel="stylesheet">

  <?php wp_head();?>
</head>
 
<body>
  
  <!-- Navbar -->
  <nav class="navbar navbar-expand-md navbar-dark bg-dark" role="navigation">
    
  <div class="container">

    <!-- Brand and toggle get grouped for better mobile display -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'your-theme-slug' ); ?>">
        <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand" href="<?php echo get_site_url(); ?>">
    <?php 
      $custom_logo_id = get_theme_mod( 'custom_logo' );
      $logo_image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    ?>
    <img src="<?php echo $logo_image[0]; ?>" alt="">
    </a>

    <!-- Bootstrap Navwalker -->
    <?php
    wp_nav_menu( array(
        'theme_location'    => 'top-menu',
        'depth'             => 2,
        'container'         => 'div',
        'container_class'   => 'collapse navbar-collapse',
        'container_id'      => 'bs-example-navbar-collapse-1',
        'menu_class'        => 'nav navbar-nav',
        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
        'walker'            => new WP_Bootstrap_Navwalker(),
    ) );
    ?>

  </div>

</nav>

<div class="main">
