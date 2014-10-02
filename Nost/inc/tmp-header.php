	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<section id="post-<?php the_ID(); ?>" <?php post_class('primary container_12 group'); ?>>

			<article id="page-<?php the_ID(); ?>" class="group">
			
				<h1><?php the_title(); ?></h1>
				
				<div class="entry">
				
					<?php the_content(); ?>
					
				</div><!-- entry -->
				
			</article>

		</section><!-- post-ID -->

	<?php endwhile; endif; ?>