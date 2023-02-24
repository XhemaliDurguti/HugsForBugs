<?php

/**
 * hugs_for_bugs functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package hugs_for_bugs
 */

if (!function_exists('hugs_for_bugs_setup')) :

  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */

  function hugs_for_bugs_setup()
  {

    /*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
        * provide it for us.
        */
    add_theme_support('title-tag');

    /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */

    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.

    register_nav_menus(array(
      'primary' => esc_html__('Primary', 'hugs_for_bugs'),
      'footer' => esc_html__('Footer', 'hugs_for_bugs')
    ));
  }

endif;

add_action('after_setup_theme', 'hugs_for_bugs_setup');

/**
 * Enqueue scripts and styles.
 */

function hugs_for_bugs_scripts()
{
  wp_enqueue_style('hugs_for_bugs-style', get_stylesheet_uri());
  wp_enqueue_style('hugs_for_bugs-main-style', get_template_directory_uri() . '/assets/dist/style.css', array(), null);
  wp_enqueue_style('hugs_for_bugs-tailwind-style', get_template_directory_uri() . '/assets/dist/tailwind.css', array(), null);
  wp_enqueue_script('hugs_for_bugs-main-js', get_template_directory_uri() . '/assets/js/index.js', array(), null, true);


  // Add Fontawesome with css and js
  wp_enqueue_style('hugs_for_bugs_fontawesome', get_template_directory_uri() . '/assets/fonts/all.css', array(), null);
  wp_enqueue_script('hugs_for_bugs_fontawesome-js', get_template_directory_uri() . '/assets/js/all.js', array(), null, true);
}

add_action('wp_enqueue_scripts', 'hugs_for_bugs_scripts');


//Theme Options
if (function_exists('acf_add_options_page')) {
  acf_add_options_page(array(
    'page_title' => 'Website Settings',
    'menu_title' => 'Website Settings',
    'menu_slug' => 'website-settings',
    'capabitily' => 'edit_posts',
    'icon_url' => 'dashicons-admin-tools'
  ));
}
function atg_menu_classes($classes, $item, $args) {
  if($args->theme_location == 'wpj-main-menu') {
    $classes[] = 'pt-2 text-white font-bold  md:flex md:justify-between  md:pt-0';
  }
  return $classes;
}
add_filter('nav_menu_css_class','atg_menu_classes',1,3);

//li a add class
function add_link_atts($atts) {
  $atts['class'] = "mb-1 md:p-4 px-4 py-2 block hover:text-white hover:bg-orange-400 rounded-lg  ";
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_link_atts');
// Ensures this function is only called after the theme is setup
// You could bind to the "init" event if "after_setup_theme" doesn't work well for you.
add_action('after_setup_theme', 'create_404_page');

// Insert a privately published page we can query for our 404 page
function create_404_page()
{

  // Check if the 404 page exists
  $page_exists = get_page_by_title('404');

  if (!isset($page_exists->ID)) {

    // Page array
    $page = array(
      'post_author' => 1,
      'post_content' => '',
      'post_name' =>  '404',
      'post_status' => 'private',
      'post_title' => '404',
      'post_type' => 'page',
      'post_parent' => 0,
      'menu_order' => 0,
      'to_ping' =>  '',
      'pinged' => '',
    );

    $insert = wp_insert_post($page);

    // The insert was successful
    if ($insert) {
      // Store the value of our 404 page
      update_option('404pageid', (int) $insert);
    }
  }
}
?>