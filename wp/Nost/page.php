<?php get_header(); ?>

<section id="page_wrap" class="container_12 group">

	<section id="content_wrap" class="primary grid_8 suffix_1 group alpha">
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
			<article id="page-<?php the_ID(); ?>" <?php post_class('group'); ?>>
	
				<h1><?php the_title(); ?></h1>
	
				<div class="entry group">
	
					<?php the_content(); ?>
	
				</div><!-- entry -->
				
	
			</article><!-- page-ID -->
			

		<?php endwhile; endif; ?>
		
	</section><!-- content_wrap -->
	<?php get_sidebar(); ?>
</section><!-- page_wrap -->

<?php get_footer(); ?>