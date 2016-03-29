<?php

function style_script_includes() {

  $template_uri = get_template_directory_uri() . '/build';

  wp_enqueue_script('jquery');
  wp_register_script('main', $template_uri . '/js/main.js', '', '', true);
  wp_enqueue_script('main');
  wp_register_script('respond', '//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js', '', '1.4.2', true);
  wp_enqueue_script('respond');
  wp_register_script('modernizr', '//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', '', '2.8.3', true);
  wp_enqueue_script('modernizr');
  wp_register_script('selectivizr', '//cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js', '', '1.0.2', true);
  wp_enqueue_script('selectivizr');
  wp_enqueue_style( 'dashicons', get_stylesheet_uri(), array( 'dashicons' ), '1.0' );
  wp_enqueue_style('dashicons');
  wp_register_style('theme_style', 'style.css');
  wp_enqueue_style('theme_style');

}

add_action('wp_enqueue_scripts', 'style_script_includes');

add_filter( 'pre_get_posts', 'my_get_posts' );

register_nav_menus([
  'main_menu'   => 'Primary navigation menu',
  'footer_menu' => 'Secondary navigation menu (in side menu)'
]);

function include_additional_files() {
  $template_url = get_template_directory();
  require_once $template_url . '/includes/custom-metaboxes.php';
}
add_action('init', 'include_additional_files');
