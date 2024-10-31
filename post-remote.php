<?php
function duplicate_this_post_to_remote( $ID, $post ) {
	$wpdb_old = wp_clone($GLOBALS['wpdb']); //backup original db
	
	$wpdb_new = &$GLOBALS['wpdb'];			//connent new remote db
	$wpdb_new = new wpdb(get_option('nam_remote_dbuser'), get_option('nam_remote_dbpass'), get_option('nam_remote_dbname'), get_option('nam_remote_hostname'));
	$wpdb_new->set_prefix(get_option('nam_remote_table_prefix'));
	
	if (count(get_posts( array( 'name' => $post->post_name ))) == 0){
		$post_arr = array(
			'ID'					=>	0,
			'post_content'			=>	$post->post_content,
			'post_name'				=>	$post->post_name,
			'post_title'			=>	$post->post_title,
			'post_status'			=>	$post->post_status,
			'post_type'				=>	$post->post_type,
			'post_author'			=>	$post->post_author,
			'ping_status'			=>	$post->ping_status,
			'post_parent'			=>	$post->post_parent,
			'menu_order'			=>	$post->menu_order,
			'to_ping'				=>	$post->to_ping,
			'pinged'				=>	$post->pinged,
			'post_password'			=>	$post->post_password,
			'guid'					=>	$post->guid,
			'post_content_filtered'	=>	$post->post_content_filtered,
			'post_excerpt'			=>	$post->post_excerpt,
			'post_date'				=>	$post->post_date,
			'post_date_gmt'			=>	$post->post_date_gmt,
			'comment_status'		=>	$post->comment_status
		);
		wp_insert_post($post_arr);
	}
	
	$wpdb = $wpdb_old;	//restore original db data
}
add_action( 'publish_post', 'duplicate_this_post_to_remote', 10, 2 );