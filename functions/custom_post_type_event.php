<?php

// when wordpress initialises, call our create event post type function
add_action('init', 'td_create_custom_post_type_event', 0);

function td_create_custom_post_type_event()
{

	// set the singular and plural label here, we can reuse these below
	$name = array(
		'singular'	=> 'Event',
		'plural'	=> 'Events'
	);
	
	$args = array(
		'labels' => array(
			// set the various label values
			'name'			=> $name['plural'],
			'singular_name'		=> $name['singular'],
			'add_new'		=> 'Add ' . $name['singular'], 'report',
			'add_new_item'		=> 'Add New ' . $name['singular'],
			'edit_item'		=> 'Edit ' . $name['singular'],
			'new_item'		=> 'New ' . $name['singular'],
			'view_item'		=> 'View ' . $name['singular'],
			'search_items'		=> 'Search ' . $name['plural'],
			// the next two values should be lowercase
			'not_found'		=> 'No ' . strtolower($name['plural']) . ' found',
			'not_found_in_trash'	=> 'No ' . strtolower($name['plural']) . ' found in Trash', 
			'parent_item_colon'	=> ''
		),
		'public'		=> TRUE,
		'publicly_queryable'	=> TRUE,
		'show_ui'		=> TRUE,
		'rewrite'		=> array('with_front' => false, 'slug' => 'events'),
		'register_meta_box_cb'	=> 'td_register_meta_box',
		'menu_position'		=> 100,
		'menu_icon'		=> get_bloginfo('template_url') . '/admin/event_icon.png'
	);

	// register the post type along with it's arguments
	register_post_type('event', $args);
	
}

	function td_register_meta_box()
	{
		
		// add our meta box, we can have many of these, good for seperating groups of options
		add_meta_box('event_options', 'Event Options', 'td_event_options', 'event', 'normal', 'high');
		
	}
	
	function td_event_options()
	{
	
		// get our previously saved data, we'll need it to display current option sata
		global $post;
		$custom = get_post_custom($post->ID);
		
		// generate our nonce string, for security purposes
		echo '<input type="hidden" name="td_noncename" id="ss_noncename" value="' . wp_create_nonce('td_event_noncename') . '" />';
		
	?>
		
		<div id="td_event_options_table_container1" style="margin: 15px 0 0 0;">
	
			<table id="td_event_options_table1" width="100%" cellspacing="5px">
				<tr valign="top">
					<td style="width: 20%;"><label for="td_event_location">Location: </label></td>
					<td>
						<input type="text" name="td_event_location" id="td_event_location" value="<?php echo $custom['td_event_location'][0]; ?>" />
					</td>
				</tr>
			</table>
		</div>
			
	<?php
	
	}
	
	function td_event_options_save_postdata($post_ID) {
		
		// check to ensure dealing with the event post type
		if (get_post_type($post_ID) != "event")
		{
			return $post_id;
		}
		
		// check the nonce string matches the one we set earlier
		if (!wp_verify_nonce($_POST['td_noncename'], 'td_event_noncename'))
		{
			return $post_id;
		}
	
		// if request is an autosave don't save meta data
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		{
			return $post_id;
		}
		
		// Check permissions
		if ('page' == $_POST['post_type'])
		{
		
			if (!current_user_can('edit_page', $post_id ))
			{
				return $post_id;
			}
			
		} 
		else
		{
			
			if (!current_user_can('edit_post', $post_id ))
			{
				return $post_id;
			}
			
		}
		
		// save data
		update_post_meta($post_ID, "td_event_location", $_POST['td_event_location']);
		
	}
	
	// when the save_post action is executed, tell wordpress to execute our save funciton (above)
	add_action('save_post', 'td_event_options_save_postdata');

// end of custom_post_type_event.php