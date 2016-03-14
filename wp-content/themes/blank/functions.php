<?php

add_action('after_setup_theme', 'blank_setup');

function blank_setup() {

  load_theme_textdomain('blank', get_template_directory() . '/languages');

  add_theme_support('automatic-feed-links');

  add_theme_support('post-thumbnails');

  global $content_width;

  if (!isset($content_width))

    $content_width = 640;

  register_nav_menus(array(

    'main-menu' => __('Main Menu', 'blank')

  ));

}

add_action('wp_enqueue_scripts', 'blank_load_scripts');

function blank_load_scripts() {

  wp_enqueue_script('jquery');

}

add_action('comment_form_before', 'blank_enqueue_comment_reply_script');

function blank_enqueue_comment_reply_script(){

  if (get_option('thread_comments')) {

    wp_enqueue_script('comment-reply');

  }

}

add_filter('the_title', 'blank_title');

function blank_title($title) {

  if ($title == '') {

    return '&rarr;';

  } else {

    return $title;

  }

}

add_filter('wp_title', 'blank_filter_wp_title');

function blank_filter_wp_title($title) {

  return $title . esc_attr(get_bloginfo('name'));

}

function blank_widgets_init() {

  register_sidebar(array(

    'name' => __('Sidebar Widget Area', 'blank'),

    'id' => 'primary-widget-area',

    'before_widget' => '<li id="%1$s" class="%2$s">',

    'after_widget' => "</li>",

    'before_title' => '<h2>',

    'title' => null,

    'after_title' => '</h2>'

  ));

}

add_action('widgets_init', 'blank_widgets_init');

function blank_custom_pings($comment) {

  $GLOBALS['comment'] = $comment;

?>

<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>

<?php }

/*  REMOVED FOR NOW

add_filter('get_comments_number', 'blank_comments_number');

function blank_comments_number($count) {

  if (!is_admin()) {

    global $id;

    $comments_by_type =& separate_comments(get_comments('status=approve&post_id=' . $id));

    return count($comments_by_type['comment']);

  } else {

    return $count;

  }

} */



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

  wp_register_style('theme_style', $template_uri . '/css/style.css');

  wp_enqueue_style('theme_style');

}

add_action('wp_enqueue_scripts', 'style_script_includes');

add_filter( 'pre_get_posts', 'my_get_posts' );

function my_get_posts( $query ) {

  if ( is_home() && $query->is_main_query() )
    $query->set( 'post_type', array( 'product') );

  return $query;
}

function include_additional_files() {
  $template_url = get_template_directory();
  require_once $template_url . '/includes/custom-metaboxes.php';
}

add_action('init', 'include_additional_files');

function create_posttype() {

    register_post_type('product',
      [
        'labels'          => [
          'name'          => 'Products',
          'singular_name' => 'Product'
        ],
        'public'          => true,
        'menu_position'   => '1',
        'menu_icon'       => 'dashicons-cart',
        'capability_type' => 'page',
        'supports'        => [
          'title',
          'editor',
          'thumbnail',
          'page-attributes'
        ],
        'rewrite'      => [
          'slug'       => 'products',
          'with_front' => false
        ],
        'has_archive'  => true
      ]
    );

    register_post_type('course',
      [
        'labels'          => [
          'name'          => 'Courses',
          'singular_name' => 'Course'
        ],
        'public'          => true,
        'menu_position'   => '1',
        'menu_icon'       => 'dashicons-shield',
        'capability_type' => 'page',
        'supports'        => [
          'title',
          'editor',
          'thumbnail',
          'page-attributes'
        ],
        'rewrite'      => [
          'slug'       => 'courses',
          'with_front' => false
        ],
        'has_archive'  => true
      ]
    );
  }

  add_action( 'init', 'create_posttype' );
  flush_rewrite_rules();

/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

  register_sidebar( array(
    'name'          => 'Contact Details',
    'id'            => 'contact_details',
    'before_widget' => '<div class="contact-details">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="contact-title">',
    'after_title'   => '</h2>',
  ) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );
