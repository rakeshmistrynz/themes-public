<?php 
	// Template Name: Sales / Full Width 
get_header(); ?>
<!--section id="title_wrap">
	<div class="container_12 group">
		<h1 class="grid_12"><?php the_title(); ?></h1>
	</div>
</section-->

<section id="page_wrap">

	<section id="content_wrap" class="primary">
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
			<article id="page-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
				<section id="title_wrap" class="grey">
					<div class="container_12 group">
						<h1><?php the_title(); ?></h1>
					</div>
				</section>
				<?php the_content(); ?>
	
			</article><!-- page-ID -->
			

		<?php endwhile; endif; ?>
		
	</section><!-- content_wrap -->
	<!-- ?php get_sidebar(); ? -->
</section><!-- page_wrap -->

<?php get_footer(); ?>