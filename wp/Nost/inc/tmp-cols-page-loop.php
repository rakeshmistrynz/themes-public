<?php get_header(); ?>
<section id="page_wrap" class="secondary container_12 group">

	<section id="content_wrap" class="primary grid_12 group">	
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
			<article id="page-<?php the_ID(); ?>" <?php post_class('group'); ?>>
	
				<h1><?php the_title(); ?></h1>
				<?php global $class; ?>
				<div class="entry <?php echo $class; ?> group">
	
					<?php the_content(); ?>
	
				</div><!-- entry -->
				
				<?php 
					$args = array(
						'before'			=> '<nav class="pagination_nav group">
												<span class="label">' . __('Pages:', 'Nostrum_V1') . ' </span>',
						'after'				=> '</nav><!-- pagination_nav -->',
						'link_before'		=> '<span>',
						'link_after'		=> '</span>',
						'next_or_number'	=> 'number',
						'pagelink'			=> '%',
						'echo'				=> 1
					); 
				?>
				<?php wp_link_pages($args); ?>
	
			</article><!-- page-ID -->
	
		<?php endwhile; endif; ?>
	
	</section><!-- content_wrap -->
	
</section><!-- page_wrap -->

<?php get_footer(); ?>