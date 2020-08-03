<?php
// let's create the function for the custom type
function faction_post_type() { 
	// creating (registering) the custom type 
	register_post_type( 'faction_post', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Factions', 'jointswp'), /* This is the Title of the Group */
			'singular_name' => __('Faction', 'jointswp'), /* This is the individual type */
			'all_items' => __('All Factions', 'jointswp'), /* the all items menu item */
			'add_new' => __('Add New Faction', 'jointswp'), /* The add new menu item */
			'add_new_item' => __('Add New Factions', 'jointswp'), /* Add New Display Title */
			'edit' => __( 'Edit Faction', 'jointswp' ), /* Edit Dialog */
			'edit_item' => __('Edit Faction', 'jointswp'), /* Edit Display Title */
			'new_item' => __('New Faction', 'jointswp'), /* New Display Title */
			'view_item' => __('View Faction', 'jointswp'), /* View Display Title */
			'search_items' => __('Search Faction', 'jointswp'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'jointswp'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'jointswp'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the example service post type', 'jointswp' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-universal-access-alt', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
			// 'rewrite'	=> array( 'slug' => 'factions/%category%', 'with_front' => false ), /* you can specify its url slug */
			'rewrite'	=> array( 'slug' => 'factions', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'factions', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => true,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt',  'page-attributes' , 'trackbacks', 'custom-fields', 'revisions', 'sticky'),
			'show_in_rest' => true
	 	) /* end of options */
	); /* end of register post type */
	
	
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type('post_tag', 'faction_post');
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'faction_post_type');
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	// now let's add custom categories (these act like categories)
    register_taxonomy( 'faction_cat', 
    	array('faction_post'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    	array('hierarchical' => true,     /* if this is true, it acts like categories */             
    		'labels' => array(
    			'name' => __( 'Faction Categories', 'jointswp' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Faction Category', 'jointswp' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Faction Categories', 'jointswp' ), /* search title for taxomony */
    			'all_items' => __( 'All Faction Categories', 'jointswp' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Faction Category', 'jointswp' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Faction Category:', 'jointswp' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Faction Category', 'jointswp' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Faction Category', 'jointswp' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Faction Category', 'jointswp' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Faction Category Name', 'jointswp' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true, 
    		'show_ui' => true,
    		'query_var' => true,
    		'rewrite' => array( 'slug' => 'factions-category','with_front' => false ),
    	)
	);   
    

    
    /*
    	looking for custom meta boxes?
    	check out this fantastic tool:
    	https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
    */