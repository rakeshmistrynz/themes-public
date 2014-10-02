<?php get_header(); ?>

	<?php if (have_posts()) : ?>

		<h2>Search Results</h2>

		<?php get_template_part('inc/', 'nav'); ?>

		<?php while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" class="post group">

				<h2><?php the_title(); ?></h2>

				<?php get_template_part('inc/', 'meta'); ?>

				<div class="entry group">
					<?php the_excerpt(); ?>
				</div><!-- entry -->
				
				<aside class="postmetadata group">
					<?php the_tags('Tags: ', ', ', '<br />'); ?>
					Posted in <?php the_category(', ') ?> | 
					<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
				</aside><!-- postmetadata -->

			</article><!-- post-ID -->

		<?php endwhile; ?>

		<?php get_template_part('inc/', 'nav'); ?>

	<?php else : ?>

		<article class="no-posts post group">
		
			<h2><?php _e('Nothing Found'); ?></h2>
			<div class="entry">
			
				<p><?php _e('Your search query returned no results. Please try another search'); ?></p>
				
				<?php get_search_form(); ?>
				
			</div><!-- entry -->

		</article><!-- no-posts -->

	<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
