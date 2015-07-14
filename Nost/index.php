<?php get_header(); ?>

	<section id="page_wrap" class="container_12 group">

		<section id="content_wrap">

			<?php if (have_posts()) : ?>
			
				<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

				<?php if (is_category()) { ?>
					<h1><?php single_cat_title(); ?></h1>
	
				<?php } elseif( is_tag() ) { ?>
					<h1>Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h1>
	
				<?php } elseif (is_day()) { ?>
					<h1><?php the_time('F jS, Y'); ?></h1>
	
				<?php } elseif (is_month()) { ?>
					<h1><?php the_time('F Y'); ?></h1>
	
				<?php } elseif (is_year()) { ?>
					<h1><?php the_time('Y'); ?></h1>
	
				<?php } elseif (is_author()) { ?>
					<h1>Author Archive</h1>
	
				<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
					<h1>Blog Archives</h1>
				
				<?php } ?>
			
				<?php while (have_posts()) : the_post(); ?>
	
					<article id="post-<?php the_ID(); ?>" <?php post_class('group grid_3'); ?>>
						<div class="features-box">
							<div class="featured-image new_prod">
								<?php the_post_thumbnail('thumbnail'); ?>
							</div>
							<h5><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
							<div class="features-text"><?php the_excerpt(); ?></div>
						</div>
					</article>
	

				<?php endwhile; ?>
				
			<?php else : ?>

				<?php get_template_part('404'); ?>

			<?php endif; ?>
			
		</section><!-- content_wrap -->

		<!-- ?php get_sidebar(); ? -->
			
	</section><!-- page_wrap -->

<?php get_footer(); ?>