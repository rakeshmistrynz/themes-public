<?php
// REGISTER CUSTOM POST TYPE FOR HOME PROMOS
function nostrum_promo_post_type() {
	
	$labels = array(
		'name'					=> _x('Promos', 'post type genaral name'),
		'singular_name'			=> _x('Promo', 'post type singular name'),
		'menu_name'				=> __('Promos'),
		'add_new'				=> _x('Add new', 'Promo'),
		'add_new_item'			=> __('Add new Promo'),
		'edit_item'				=> __('Edit Promo'),
		'new_item'				=> __('New Book'),
		'all_items'				=> __('All Promos'),
		'view_item'				=> __('View Promo'),
		'search_items'			=> __('Search Promos'),
		'not_found'				=> __('No Promos found'),
		'not_found_in_trash'	=> __('No Promos found in Trash'),
		'parent_item_colon'		=> '',
	);
	
	$args = array(
		'labels'				=> $labels,
		'public'				=> true,
		'publicly_queryable'	=> true,
		'show_ui'				=> true,
		'show_in_menu'			=> true,
		'query_var'				=> true,
		'rewrite'				=> true,
		'capability_type'		=> 'post',
		'has_archive'			=> false,
		'hierarchical'			=> false,
		'menu_position'			=> null,
		'supports'				=> array('title', 'editor')
	);
	register_post_type('nostrum-promo', $args);
	
}
add_action( 'init', 'nostrum_promo_post_type' );


// CREATE CUSTOM META BOXES FOR PROMOS
add_action('load-post.php', 'nostrum_promo_link_meta_box_setup');
add_action('load-post-new.php', 'nostrum_promo_link_meta_box_setup');

function nostrum_promo_link_meta_box_setup() {
	add_action('add_meta_boxes', 'nostrum_add_promo_meta_boxes');
	add_action('save_post', 'nostrum_save_promo_link_meta', 10, 2);
}

function nostrum_add_promo_meta_boxes() {
	add_meta_box('promo-link', 'Promo Link', 'nostrum_promo_link_meta_box', 'nostrum-promo', 'advanced', 'low');
}

function nostrum_promo_link_meta_box($object, $box) {
	wp_nonce_field( basename( __FILE__ ), 'nostrum_promo_link_nonce' ); ?>
	<p>
		<label for="promolink">
			<?php _e( 'Enter the destination URL for this promo', 'example' ); ?>
		</label>
		<br />
		<input class="widefat" type="text" name="promolink" value="<?php echo get_post_meta( $object->ID, 'promolink', true ); ?>" size="30" />
	</p>
<?php 
}

function nostrum_save_promo_link_meta( $post_id, $post ) {

	/* Verify the nonce before proceeding. */
	if ( !isset( $_POST['nostrum_promo_link_nonce'] ) || !wp_verify_nonce( $_POST['nostrum_promo_link_nonce'], basename( __FILE__ ) ) ) {
		return $post_id;
	}

	/* Get the post type object. */
	$post_type = get_post_type_object( $post->post_type );

	/* Check if the current user has permission to edit the post. */
	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
		return $post_id;

	/* Get the posted data and sanitize it for use as an HTML class. */
	$new_meta_value = $_POST['promolink'];

	/* Get the meta key. */
	$meta_key = 'promolink';

	/* Get the meta value of the custom field key. */
	$meta_value = get_post_meta( $post_id, $meta_key, true );

	/* If a new meta value was added and there was no previous value, add it. */
	if ( $new_meta_value && '' == $meta_value ) {
		add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	}

	/* If the new meta value does not match the old value, update it. */
	elseif ( $new_meta_value && $new_meta_value != $meta_value ) {
		update_post_meta( $post_id, $meta_key, $new_meta_value );
	}

	/* If there is no new meta value but an old value exists, delete it. */
	elseif ( '' == $new_meta_value && $meta_value ) {
		delete_post_meta( $post_id, $meta_key, $meta_value );
	}
}

?>