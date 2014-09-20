<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
 <!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie.css" type="text/css" />
  <![endif]-->
  <?php get_template_part('inc/tmp','seotitles'); ?>
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <?php if (is_search()) { ?><meta name="robots" content="noindex, nofollow" /><?php } ?>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header>
  <div id="header-wrapper">
  <div class="container_12 group">
    <div class="grid-inner">
      <h1>
        <a title="<?php bloginfo('description') ?>" href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a>
      </h1>

      <?php if (has_nav_menu('global-nav')) : ?>
      <nav>
        <?php wp_nav_menu(array('theme_location' => 'global-nav', 'fallback_cb' => false, 'container' => false, 'menu_class' => '', 'items_wrap' => '<ul>%3$s</ul>', 'before' => '<h5>', 'after' => '</h5>')); ?>
      </nav>
      <?php endif; ?>
    </div>
  </div>
  </div>

</header>