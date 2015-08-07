<title>
	<?php if (is_home()) { ?>
	
		<?php bloginfo('name'); ?> // <?php _e('Blog'); ?>
		
	<?php } elseif (is_front_page()) { ?>
	
		<?php bloginfo('name'); ?> // <?php bloginfo('description'); ?>
		
	<?php } elseif (!(is_404()) && (is_single()) || (is_page())) { ?>
	
		<?php the_title(); ?> // <?php bloginfo('name'); ?>
		
	<?php } elseif (is_category() || is_archive()) { ?>
	
		<?php if (is_date()) { ?>
		
			<?php bloginfo('name'); ?> // <?php bloginfo('description'); ?>
			
		<?php } else { ?>
		
			<?php single_cat_title(); ?> // <?php bloginfo('name'); ?>
			
		<?php } ?>
		
	<?php } elseif (is_taxonomy('name')) { ?>
	
		<?php single_term_title(); ?> // <?php bloginfo('name'); ?>
		
	<?php } elseif (is_tag('name')) { ?> 
	
		<?php single_tag_title();?> // <?php bloginfo('name'); ?>
		
	<?php } elseif (is_404()) { ?>
	
		<?php bloginfo('name'); ?> // <?php _e('Not Found'); ?>
		
	<?php } else { ?>
	
		<?php bloginfo('name'); ?> // <?php bloginfo('description'); ?>
	
	<?php } ?>
</title>