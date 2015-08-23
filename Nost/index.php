<?php get_header(); ?>
	<section class="primary">

			<?php if (have_posts()) : ?>
			
				<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

				<?php if (is_category()) { ?>
				<section id="title_wrap" class="grey">
					<div class="container_12">
						<h1 class="grey"><?php single_cat_title(); ?></h1>
					</div>
				</section>
	
				<?php } elseif( is_tag() ) { ?>
				<section id="title_wrap" class="grey">
					<div class="container_12">
						<h1 class="grey">Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h1>
					</div>
				</section>
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
			<section id="content_wrap" class="container_12 group">
				<div class="post-box group">
				<?php while (have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('group grid_3'); ?>>
						<div class="features-box">
							<div class="featured-image new_prod">
								<?php the_post_thumbnail('thumbnail'); ?>
							</div>
							<h5><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
							<div class="features-text"><?php echo strip_tags(get_the_excerpt()); ?></div>
						</div>
					</article>
				<?php endwhile; ?>
				</div>					
			</section>
				
			<?php else : ?>

				<?php get_template_part('404'); ?>

			<?php endif; ?>
			
		</section><!-- content_wrap -->

		<!-- ?php get_sidebar(); ? -->
			
	</section><!-- page_wrap -->

<?php get_footer(); ?>