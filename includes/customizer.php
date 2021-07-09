<?php
  function jfa_customize_register($wp_customize){

  // MISC OPTIONS
  $wp_customize->add_section('misc', array(
    'title'   => __('Misc', 'johnflemingartist'),
    'description' => sprintf(__('Misc Customization Options','johnflemingartist')),
    'priority'    => 145
  ));
  
  // Customizer for Navbar Logo Text found in header.php
  // $wp_customize->add_setting('featured_posts_title', array(
  //   'default'   => _x('Featured Projects:', 'johnflemingartist'),
  //   'type'      => 'theme_mod'
  // ));

  // $wp_customize->add_control('featured_posts_title', array(
  //   'label'   => __('Featured Projects Title', 'johnflemingartist'),
  //   'section' => 'misc',
  //   'priority'  => 1
  // ));
  
  // Customizer for Navbar Logo image found in header.php
  $wp_customize->add_setting('logo_image', array(
    'default'   => get_bloginfo('template_directory').'/img/jfa-logo-default.jpg',
    'type'      => 'theme_mod'
  ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo_image', array(
    'label'   => __('Logo Image', 'johnflemingartist'),
    'section' => 'header',
    'settings' => 'Logo Image',
    'priority'  => 2
  )));

  // Customizer for footer sections headings
  // $wp_customize->add_setting('footer_left_heading', array(
  //   'default'   => _x('Quick Links', 'johnflemingartist'),
  //   'type'      => 'theme_mod'
  // ));

  // $wp_customize->add_control('footer_left_heading', array(
  //   'label'   => __('Footer Left Heading', 'johnflemingartist'),
  //   'section' => 'misc',
  //   'priority'  => 3
  // ));

  // Customizer for Navbar Logo Text found in header.php
  // $wp_customize->add_setting('portfolio_archive_title', array(
  //   'default'   => _x('Portfolio', 'johnflemingartist'),
  //   'type'      => 'theme_mod'
  // ));

  // $wp_customize->add_control('portfolio_archive_title', array(
  //   'label'   => __('Portfolio Archive Title', 'johnflemingartist'),
  //   'section' => 'misc',
  //   'priority'  => 4
  // ));

  // Customizer for Navbar Logo Text found in header.php
  $wp_customize->add_setting('portfolio_series_message', array(
    'default'   => _x('To view a project belonging to this series, please click on one of the thumbnails below.', 'johnflemingartist'),
    'type'      => 'theme_mod'
  ));

  $wp_customize->add_control('portfolio_series_message', array(
    'label'   => __('Portfolio Series Page Message', 'johnflemingartist'),
    'section' => 'misc',
    'priority'  => 5
  ));
  



  $wp_customize->add_setting( 'themeslug_number_setting_id', array(
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'themeslug_sanitize_number_absint',
    'default' => 12,
  ) );
  
  $wp_customize->add_control( 'themeslug_number_setting_id', array(
    'type' => 'number',
    'section' => 'misc', // Add a default or your own section
    'label' => __( 'Featured Post Count' ),
    'description' => __( 'Number of posts displayed in homepage gallery' ),
  ) );
  
  function themeslug_sanitize_number_absint( $number, $setting ) {
    // Ensure $number is an absolute integer (whole number, zero or greater).
    $number = absint( $number );
  
    // If the input is an absolute integer, return it; otherwise, return the default
    return ( $number ? $number : $setting->default );
  }





  }
  add_action('customize_register', 'jfa_customize_register');