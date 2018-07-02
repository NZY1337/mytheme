<?php 


function register_my_menu() {
	register_nav_menu('navbar-nav' , __( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );


// let's add "*active*" as a class to the li

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}

// let's add our custom class to the actual link tag    

function atg_menu_classes($classes, $item, $args) {
  if($args->theme_location == '') {
    $classes[] = 'nav-link';
  }
  return $classes;
}

add_filter('nav_menu_css_class', 'atg_menu_classes', 1, 3);

function add_menuclass($ulclass) {
   return preg_replace('/<a /', '<a class="nav-link"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');



function mytheme_post_thumbnails() {
  add_theme_support( 'post-thumbnails' );
 
}
add_action( 'after_setup_theme', 'mytheme_post_thumbnails' );




function wpdocs_custom_excerpt_length( $length ) {
  return 40;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );



/////////////////////////////////////////////////////////////
/////// Creating a function for CPT EVENTS ///////
////////////////////////////////////////////////////////////
 
function _events() {
 
  // Set UI labels for Custom Post Type
      $labels = array(
          'name'                => _x( 'Events', 'Post Type General Name', 'myTheme' ),
          'singular_name'       => _x( 'Events', 'Post Type Singular Name', 'myTheme' ),
          'menu_name'           => __( 'Events', 'myTheme' ),
          'parent_item_colon'   => __( 'Parent Events', 'myTheme' ),
          'all_items'           => __( 'All Events', 'myTheme' ),
          'view_item'           => __( 'View Events', 'myTheme' ),
          'add_new_item'        => __( 'Add New Events', 'myTheme' ),
          'add_new'             => __( 'Add New', 'myTheme' ),
          'edit_item'           => __( 'Edit Events', 'myTheme' ),
          'update_item'         => __( 'Update Events', 'myTheme' ),
          'search_items'        => __( 'Search Events', 'myTheme' ),    
          'not_found'           => __( 'Not Found', 'myTheme' ),
          'not_found_in_trash'  => __( 'Not found in Trash', 'myTheme' ),
      );
       
  // Set other options for Custom Post Type

      $args = array(
          'label'               => __( 'Events', 'myTheme' ),
          'description'         => __( 'Events news and reviews', 'myTheme' ),
          'labels'              => $labels,
          // Features this CPT supports in Post Editor
          'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'category' ),
          // You can associate this CPT with a taxonomy or custom taxonomy. 
          /* A hierarchical CPT is like Pages and can have
          * Parent and child items. A non-hierarchical CPT
          * is like Posts.
          */ 
          'hierarchical'        => false,
          'public'              => true,
          'show_ui'             => true,
          'show_in_menu'        => true,
          'show_in_nav_menus'   => true,
          'show_in_admin_bar'   => true,
          'menu_position'       => 5,
          'can_export'          => true,
          'has_archive'         => true,
          'exclude_from_search' => false,
          'publicly_queryable'  => true,
          'capability_type'     => 'page',

          // This is where we add taxonomies to our CPT
        //  'taxonomies'          => array( 'events_categories', 'post_type')
      );    
       
      // Registering your Custom Post Type
      register_post_type( 'events', $args );
  }
   
  /* Hook into the 'init' action so that the function
  * Containing our post type registration is not 
  * unnecessarily executed. 
  */
   
  add_action( 'init', '_events', 0 );
  

//   ADDING TAGS FOR THE CUSTOM POST TYPE (EVENTS);
add_action( 'init', 'gp_register_taxonomy_for_object_type' );
function gp_register_taxonomy_for_object_type() {
    register_taxonomy_for_object_type( 'post_tag', 'events' );
};
  



function create_categories_for_events()
{
    $labels_events = array(
        'name' => _x( 'Categories', 'taxonomy general name' ),
        'singular_name' => _x( 'Category', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Categories' ),
        'popular_items' => __( 'Popular Categories' ),
        'all_items' => __( 'All Categories' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Category' ),
        'update_item' => __( 'Update Category' ),
        'add_new_item' => __( 'Add New Category' ),
        'new_item_name' => __( 'New Category Name' ),
        'separate_items_with_commas' => __( 'Separate categories with commas' ),
        'add_or_remove_items' => __( 'Add or remove categories' ),
        'choose_from_most_used' => __( 'Choose from the most used categories' ),
        'menu_name' => __( 'Categories' ),
    );

    register_taxonomy('events-categories', 'events' ,array(
        'hierarchical' => true,
        'labels' => $labels_events,
        'show_ui' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array( 'slug' => 'events_categories'),
    ));

}

add_action( 'init', 'create_categories_for_events', 0 );



//////////////////////////////////////////////////////////////////
/////// Creating a function for CPT CONFERENCES ///////
////////////////////////////////////////////////////////////////































?>