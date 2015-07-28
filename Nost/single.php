<?php get_header(); ?>

	<section id="page_wrap" class="container_12 group">

		<section id="content_wrap" class="primary grid_12 group">

			<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
				<?php if(function_exists('bcn_display'))
				{
					bcn_display();
				}?></div>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('group grid_8'); ?>>
			
					<h2><?php the_title(); ?></h2>

					<div class="entry group">	
						
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
					
					<aside class="share group">

					    <div class="a2a_kit a2a_default_style">
						    <a class="a2a_button_facebook_like"></a>
						    <a class="a2a_button_twitter_tweet"></a>
						    <a class="a2a_button_google_plusone"></a>
						</div>
						
						<script type="text/javascript" src="http://static.addtoany.com/menu/page.js"></script>
					
					</aside><!-- sidebar -->
			
				</article><!-- post-ID -->

				<?php comments_template(); ?>

			<?php endwhile; endif; ?>

			<?php get_sidebar(); ?>

		</section> <!-- content_wrap -->
			
	</section><!-- page_wrap -->

<?php get_footer(); ?>