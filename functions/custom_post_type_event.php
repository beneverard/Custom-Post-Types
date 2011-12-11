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
		'show_ui'		=> TRUE
	);

	// register the post type along with it's arguments
	register_post_type('event', $args);
	
}

// end of custom_post_type_event.php