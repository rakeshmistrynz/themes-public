<?php get_header(); ?>
	
	<?php if (have_posts()) : ?>

	<section id="title_wrap" class="grey">
		<div class="container_12">
			<h1 class="grey">Search Results</h1>
		</div>
	</section>

	<section id="content_wrap" class="container_12 results">

		<?php get_template_part('inc/', 'nav'); ?>

		<?php while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" class="post group">

			<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>

			<?php get_template_part('inc/', 'meta'); ?>

			<?php echo search_content(get_the_excerpt());?>

			<?php the_tags('<p class="tags">Tags: ', ', ', '<p/>'); ?>

		</article><!-- post-ID -->
		<hr>

	<?php endwhile; ?>

	<?php get_template_part('inc/', 'nav'); ?>

<?php else : ?>

	<section id="title_wrap" class="grey">
		<div class="container_12">
			<h1 class="grey">Search Results</h1>
		</div>
	</section>

	<section id="content_wrap" class="container_12 results">

		<article class="no-posts post group">
			
			<p><?php _e('Your search query returned no results. Please try another search'); ?></p>

			<?php get_search_form(); ?>

		</article><!-- no-posts -->

	<?php endif; ?>

</section><!-- content_wrap -->

</section><!-- page_wrap -->

<?php get_footer(); ?>
