<?php  
/*
Template Name: Full width help
*/
get_header(); ?>

	<section id="page_wrap" class="primary">

		<section id="content_wrap" class="primary group help">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('group'); ?>>
					<section id="title_wrap" class="grey">
						<div class="container_12 group">
							<h1 class="grey"><?php the_title(); ?></h1>
						</div>
					</section>
				
					<div class="entry group">	
						
						<?php the_content(); ?>
					
					</div><!-- entry -->
					
					<?php // pagination for long posts (aka nextpage tag) - we don't really need this 
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
					    wp_link_pages($args); ?>

				</article><!-- post-ID -->

				<?php comments_template(); ?>

			<?php endwhile; endif; ?>

		</section><!-- content_wrap -->

		<?php // get_sidebar(); ?>
			
	</section><!-- page_wrap -->
<div class="line"></div>
<?php get_footer(); ?>
