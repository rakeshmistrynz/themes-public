<aside class="sidebar grid_4 group omega">

    <?php 
if (function_exists('dynamic_sidebar') && dynamic_sidebar('Blog Sidebar')) : else : 
// Add a documentation sidebar to Doc pages only
// Andy 09/05/2014
//if (function_exists('dynamic_sidebar') && in_array(10,wp_get_post_categories(get_the_ID())) && dynamic_sidebar('Doc Sidebar')) : elseif(function_exists('dynamic_sidebar') && !in_array(10,wp_get_post_categories(get_the_ID())) && dynamic_sidebar('Blog Sidebar')) : else :
//get_sidebar('doc');
//if (1):
?>

    	<?php get_search_form(); ?>
    
    	<nav id="page_nav" class="group">
    		<h2><?php _e('Pages'); ?></h2>
    		<ul>
    			<?php wp_list_pages('title_li='); ?>
    		</ul>
    	</nav><!-- page_nav -->
    
    	<nav id="archive_nav" class="group">
    		<h2><?php _e('Archives'); ?></h2>
    		<ul>
    			<?php wp_get_archives('type=monthly'); ?>
    		</ul>
    	</nav><!-- archive_nav -->
        
        <nav id="category_nav" class="group">
	        <h2><?php _e('Categories'); ?></h2>
	        <ul>
	    	   <?php wp_list_categories('show_count=1&title_li='); ?>
	        </ul>
        </nav><!-- category_nav -->
        
    	<nav id="bookmarks_nav" class="group">
    		<h2><?php _e('Bookmarks'); ?></h2>
    		<ul>
    			<?php wp_list_bookmarks('title_li=&categorize=0'); ?>
    		</ul>
    	</nav><!-- bookmarks-nav -->
    
    	<nav id="meta-nav" class="group">
	    	<h2><?php _e('Meta'); ?></h2>
	    	<ul>
	    		<?php wp_register(); ?>
	    		<li><?php wp_loginout(); ?></li>
	    		<li><a href="http://wordpress.org/" title="<?php _e('Powered by WordPress, state-of-the-art semantic personal publishing platform.'); ?>">WordPress</a></li>
	    		<?php wp_meta(); ?>
	    	</ul>
    	</nav><!-- meta-nav -->
    	
    	<nav id="subscribe-nav" class="group">
	    	<h2><?php _e('Subscribe'); ?></h2>
	    	<ul>
	    		<li><a href="<?php bloginfo('rss2_url'); ?>"><?php _e('Entries (RSS)'); ?></a></li>
	    		<li><a href="<?php bloginfo('comments_rss2_url'); ?>"><?php _e('Comments (RSS)'); ?></a></li>
	    	</ul>
    	</nav><!-- subscribe-nav -->
	
	<?php endif; ?>

</aside><!-- sidebar -->