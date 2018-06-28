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





?>