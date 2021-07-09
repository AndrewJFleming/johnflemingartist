<?php
function load_css()
{ 
    wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.1.0/css/all.css');
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), false, 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css', array(), false, 'all');
    wp_enqueue_style('magnific-popup');

    wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'load_css');

function load_flexslider() {

}
add_action('wp_enqueue_scripts', 'load_flexslider');

function load_js()
{
    wp_enqueue_script('jquery');

    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js', 'jquery', false, true);
    wp_enqueue_script('bootstrap');

    wp_register_script('magnificpopup', get_template_directory_uri() . '/js/jquery.magnific-popup.js', 'jquery', 1, true);
    wp_enqueue_script('magnificpopup');

    wp_register_script('customjs', get_template_directory_uri() . '/js/main.js', '', false, true);
    wp_enqueue_script('customjs');
}
add_action('wp_enqueue_scripts', 'load_js');

// Add style for Admin Menu Post type and icons, theme settings
function custom_admin_style() {
    wp_enqueue_style('my-admin-style', get_stylesheet_directory_uri() . '/css/admin-style.css');
}
add_action('admin_enqueue_scripts', 'custom_admin_style');

// Adding Theme Support
function jfa_init() {
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
    add_theme_support('widgets');
    add_theme_support('title-tag');
    add_theme_support('html5',
        array('comment-list','comment-form', 'search-form')
    );
    add_post_type_support( 'page', 'excerpt' );

    // Register menus
    register_nav_menus(
        array(
            'top-menu' => 'Top Menu',
            'portfolio-menu' => 'Portfolio Menu',
            'footer-menu' => 'Footer Menu'
        )
    );
}
add_action('after_setup_theme', 'jfa_init');

// Widget Locations
function jfa_init_widgets($id){

    register_sidebar(array(
        'name' => 'Portfolio Widget',
        'id' => 'portfolio-widget',
        'before_title' => '<h4 class="portfolio-widget-title">',
        'after_title' => '</h4>'
    ));
}
add_action('widgets_init', 'jfa_init_widgets');

// Custom Post Types
function post_type_portfolio(){
    $args = array(
        'labels' => array(
            'name' => 'Portfolio Items',
            'singular_name' => 'Portfolio Item',
        ),
        'hierarchical' => true,
        'public' => true,
        'menu_icon' => 'dashicons-art',
        'has_archive' => false,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes'),
        'rewrite' => array('slug' => 'portfolio'),
        'taxonomies' => array('post_tag') //add 'Tags' functionality to portfolio CPT
    );
    register_post_type('portfolio', $args);
}
add_action('init', 'post_type_portfolio');




// Custom Taxonomies
function create_portfolio_taxonomy() {
    $labels = array(
        'name'              => _x( 'Portfolio Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Portfolio Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Portfolio Categories', 'textdomain' ),
        'all_items'         => __( 'All Portfolio Categories', 'textdomain' ),
        'parent_item'       => __( 'Parent Portfolio Category', 'textdomain' ),
        'parent_item_colon' => __( 'Parent Portfolio Category:', 'textdomain' ),
        'edit_item'         => __( 'Edit Portfolio Category', 'textdomain' ),
        'update_item'       => __( 'Update Portfolio Category', 'textdomain' ),
        'add_new_item'      => __( 'Add New Portfolio Category', 'textdomain' ),
        'new_item_name'     => __( 'New Portfolio Category', 'textdomain' ),
        'menu_name'         => __( 'Portfolio Category', 'textdomain' ),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'portfolio-categories' ),
    );
    register_taxonomy( 'portfolio-categories', array( 'portfolio' ), $args );
    // unset( $args );
    // unset( $labels );
}
add_action( 'init', 'create_portfolio_taxonomy', 0 );




// Filter Portfolio Items by taxonomy
function filter_portfolio_items_by_taxonomies( $post_type, $which ) {

	// Apply this only on a specific post type
	if ( 'portfolio' !== $post_type )
		return;

	// A list of taxonomy slugs to filter by
	$taxonomies = array( 'portfolio-categories' );

	foreach ( $taxonomies as $taxonomy_slug ) {

		// Retrieve taxonomy data
		$taxonomy_obj = get_taxonomy( $taxonomy_slug );
		$taxonomy_name = $taxonomy_obj->labels->name;

		// Retrieve taxonomy terms
		$terms = get_terms( $taxonomy_slug );

		// Display filter HTML
		echo "<select name='{$taxonomy_slug}' id='{$taxonomy_slug}' class='postform'>";
		echo '<option value="">' . sprintf( esc_html__( 'Show All %s', 'text_domain' ), $taxonomy_name ) . '</option>';
		foreach ( $terms as $term ) {
			printf(
				'<option value="%1$s" %2$s>%3$s (%4$s)</option>',
				$term->slug,
				( ( isset( $_GET[$taxonomy_slug] ) && ( $_GET[$taxonomy_slug] == $term->slug ) ) ? ' selected="selected"' : '' ),
				$term->name,
				$term->count
			);
		}
		echo '</select>';
	}

}
add_action( 'restrict_manage_posts', 'filter_portfolio_items_by_taxonomies' , 10, 2);


// Custom Logo
add_theme_support( 'custom-logo', array(
    'height'      => 100,
    'width'       => 400,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
) );



// Customizer File
require get_template_directory() . '/includes/customizer.php';



// Misc Functions

// Custom Pagination
function jfa_pagination(){
    echo paginate_links( 
        array(
            'prev_next' => false,
        )
    );
}

// Remove gallery shortcode from $content to only display text and embeds
function remove_shortcode_from($content) {
    $content = strip_shortcodes( $content );
    return $content;
}

// Remove attached images from $content 
// (not currently utilized)
function strip_images($content){
    return preg_replace('/<img[^>]+./','',$content);
}

//Aqua Resizer - for thumbnails in 'section-image-gallery.php'.
require get_template_directory() . '/includes/aq_resizer.php';




// Order Column

// add order column to admin listing screen
function add_new_portfolio_column($post_columns) {
    $post_columns['menu_order'] = "Order";
    return $post_columns;
  }
  add_action('manage_edit-portfolio_columns', 'add_new_portfolio_column');

// show custom order column values
function show_order_column($name){
    global $post;
   
    switch ($name) {
      case 'menu_order':
        $order = $post->menu_order;
        echo $order;
        break;
     default:
        break;
     }
  }
  add_action('manage_portfolio_posts_custom_column','show_order_column');

// make column sortable by order
function order_column_register_sortable($columns){
    $columns['menu_order'] = 'menu_order';
    return $columns;
  }
  add_filter('manage_edit-portfolio_sortable_columns','order_column_register_sortable');

// Sort post archive by menu_order 
// For archive-porfolio.php and taxonomy-portfolio-categories.php
add_action( 'pre_get_posts', 'portfolio_sort_order'); 
function portfolio_sort_order($query){
	if( (is_archive() && !is_admin()) || (is_front_page() && !is_admin()) ):
	   $query->set( 'order', 'ASC' );
       $query->set( 'orderby', 'menu_order' );
	endif;    
};



// Featured Image Thumbnail Column in Admin

// add Featured Image Thumbnail column to admin listing screen
add_filter('manage_portfolio_posts_columns', 'featured_image_column_filter');  
function featured_image_column_filter($defaults) {  
    $defaults['featured_image'] = 'Featured Image';  
    return $defaults;  
}

// Populate column with items' respective thumbnail
add_action( 'manage_portfolio_posts_custom_column', 'featured_image_column', 10, 2);
function featured_image_column( $column, $post_id ) {
  // Image column
  if ( 'featured_image' === $column ) {
    echo get_the_post_thumbnail( $post_id, array(80, 80) );
  }
}



// Register Custom Navigation Walker
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
    // File does not exist... return an error.
    return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
    // File exists... require it.
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}