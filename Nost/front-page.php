<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<section id="post-<?php the_ID(); ?>" <?php post_class('primary -container_12'); ?>>
  <article id="page-<?php the_ID(); ?>" class="group">
    <div class="entry">
      <?php the_content(); ?>
    </div>
  </article>
</section>
<?php endwhile; endif; ?>

<?php get_footer(); ?>