<?php get_header(); ?>

<section class="content" role="main">

  <div class="container grid">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php comments_template(); ?>

    <?php endwhile; endif; ?>

  </div>

</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
