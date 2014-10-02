<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) {
		_e('This post is password protected. Enter the password to view comments.');
		return;
	}
?>


<?php if ( have_comments() ) : ?>

	<section id="comments_wrap" class="group">
	
		<h3 id="comments">
			<?php comments_number(__('No Comments'), __('1 Comment'), __('% Comments'), 'comments_link', '');?>
		</h3>
	
		<ol class="commentlist">
			<?php wp_list_comments(); ?>
		</ol>
	
		<nav id="comments_nav" class="group">
			<span class="fl"><?php previous_comments_link() ?></span>
			<span class="fr"><?php next_comments_link() ?></span>
		</nav><!-- comments_nav -->
		
	</section><!-- comments_wrap -->
		
<?php else : // this is displayed if there are no comments so far ?>
	
	<?php if ( comments_open() ) : ?>
		
		<!-- If comments are open, but there are no comments. -->
	
	<?php else : // comments are closed ?>
		 
		<!-- <p>Comments are closed.</p> -->
	
	<?php endif; ?>
		
<?php endif; ?>

	
<?php if ( comments_open() ) : ?>
		
	<?php comment_form(); ?>
	
<?php endif; ?>