<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
  <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:700,400,300' rel='stylesheet' type='text/css'>
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

