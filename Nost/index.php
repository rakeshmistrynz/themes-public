<?php get_header(); ?>

	<section id="page_wrap" class="container_12 group help">

		<section id="content_wrap" class="primary grid_8 suffix_1 group">

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
	
					<article id="post-<?php the_ID(); ?>" <?php post_class('group'); ?>>
	
						<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
	
					</article><!-- post-ID -->
	
				<?php endwhile; ?>
				
			<?php else : ?>

				<?php get_template_part('404'); ?>

			<?php endif; ?>
			
		</section><!-- content_wrap -->

		<?php get_sidebar(); ?>
			
	</section><!-- page_wrap -->

<?php get_footer(); ?>