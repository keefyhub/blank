<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width" />
  <title>
    <?php wp_title( ' | ', true, 'right' ); ?>
  </title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header role="banner" class="site-header">
    <section class="container">
      <div class="site-title">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( get_bloginfo( 'name' ), 'blank' ); ?>" rel="home">
          <h1><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h1>
        </a>
      </div>
      <div class="site-description">
        <?php bloginfo( 'description' ); ?>
      </div>
    </section>

    <span class="nav-menu-button">
      <i class="dashicons dashicons-menu"></i>
    </span>
    <nav class="nav-menu" role="navigation">
      <div class="search">
      <?php get_search_form(); ?>
      </div>
      <?php wp_nav_menu( array( 'theme_location'=> 'main-menu' ) ); ?>
    </nav>
    </header>