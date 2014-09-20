<?php

add_action('admin_menu', 'add_ts_interface');
function add_ts_interface() {
	add_theme_page('themes.php', 'Theme Settings', 'edit_theme_options', 'theme-settings', 'editthemesettings');
}
function editthemesettings() {
	$social_icons = array(
		'Creatica',
		'Delicious',
		'Dribble',
		'Facebook',
		'Flickr',
		'Github',
		'GooglePlus',
		'LastFm',
		'LinkedIn',
		'Myspace',
		'Pinterest',
		'Twitter',
		'Vimeo',
		'YouTube',
		'RSS'
	); 
		
	$custom_colors = array(
		__('Menu Background'),
		__('Menu Links'),
		__('Header Background'),
		__('Content Headings'),
		__('Content Links'),
		__('Submit Buttons')
	); ?>

	<div class="wrap">
		
		<div id="icon-options-general" class="icon32"></div>
		<h2><?php _e('Theme Settings'); ?></h2>
		<form method="post" action="options.php">
			<?php wp_nonce_field('update-options') ?>
			
			<h3><?php _e('Appearance Options'); ?></h3>
			<table class="form-table">
				<tbody>
					
					<?php foreach ($custom_colors as $color_field) { ?>
					
						<tr valign="top">
							<th scope="row">
								<label><?php echo $color_field; ?>:</label>
							</th>
							<td>
								<?php 
									 $str = $color_field;
									 $str = str_replace(" ", "", $str);
									 $str = strtolower($str);
								?>
								<input type="text" id="<?php echo $str; ?>" name="<?php echo $str; ?>" value="<?php if (get_option($str)) { echo get_option($str); } else { echo '#'; } ?>" />
								<div id="<?php echo $str; ?>colorpicker"></div>
							</td>
						</tr>
						<script type="text/javascript">
							jQuery(document).ready(function() {
								jQuery('#<?php echo $str; ?>colorpicker').hide();
								jQuery('#<?php echo $str; ?>colorpicker').farbtastic("#<?php echo $str; ?>");
								jQuery("#<?php echo $str; ?>").click(function(){
									jQuery('#<?php echo $str; ?>colorpicker').slideToggle()
								});
							});
						</script>
						
					<?php } ?>
					
				</tbody>
			</table><br /><br /><br />

			
			
			<h3><?php _e('Social Network Links'); ?></h3>
			<p><?php _e('Enter the URLs in the corresponding fields below. Make sure to include'); ?> <strong>http://</strong></p>
			<table class="form-table">
				<tbody>
				
					<?php foreach ($social_icons as $icon) { ?>
						<tr valign="top">
							<th scope="row"><label><?php echo $icon; ?>:</label></th>
							<td><input type="text" name="<?php echo $icon; ?>" size="30" value="<?php echo get_option($icon); ?>" /></td>
						</tr>
					<?php } ?>
	
				</tbody>
			</table>
	
	
			
			<p class="submit">
				<input type="submit" class="button-primary" name="Submit" value="<?php _e('Update Settings'); ?>" />
			</p>
			
			<input type="hidden" name="action" value="update" />
			
			
			<input type="hidden" name="page_options" value="customlogo,<?php foreach ($custom_colors as $color) { $color = str_replace(" ", "", $color); $color = strtolower($color).','; echo $color; } foreach ($social_icons as $icon) { echo $icon.','; } ?>" />
		</form>
	</div><?php
}

// Register and enqueue scripts for 'Theme Settings' page
function my_admin_scripts() {

	// script for color picker
	wp_enqueue_script( 'farbtastic' );

}

// Register styles for 'Theme Settings' page
function my_admin_styles() {
	
	// styles for color picker
	wp_enqueue_style( 'farbtastic' );
}
	
if (isset($_GET['page']) && $_GET['page'] == 'theme-settings') {
	add_action('admin_print_scripts', 'my_admin_scripts');
	add_action('admin_print_styles', 'my_admin_styles');
}