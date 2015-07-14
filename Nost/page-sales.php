<?php 
// Template Name: Sales / Full Width 
get_header(); ?>

<section id="page_wrap" class="primary">

	<section id="content_wrap">
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
			<article id="page-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
				<section id="title_wrap" class="grey">
					<div class="container_12 group">
						<h1 class="grey"><?php the_title(); ?></h1>
					</div>
				</section>
				<?php the_content(); ?>
	
			</article><!-- page-ID -->
			

		<?php endwhile; endif; ?>
		
	</section><!-- content_wrap -->

</section><!-- page_wrap -->

<?php get_footer(); ?>