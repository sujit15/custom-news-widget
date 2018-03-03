<?php
/**
 * Class NewsCustomPostType
 */

class NewsCustomPostType {
	public function __construct() {
		add_action( 'init', array( $this, 'news_cpt_init' ) );
	}

	function news_cpt_init() {
		$labels = array(
			'name'               => _x( 'News', 'post type general name', 'your-plugin-textdomain' ),
			'singular_name'      => _x( 'News', 'post type singular name', 'your-plugin-textdomain' ),
			'menu_name'          => _x( 'News', 'admin menu', 'your-plugin-textdomain' ),
			'name_admin_bar'     => _x( 'Book', 'add new on admin bar', 'your-plugin-textdomain' ),
			'add_new'            => _x( 'Add New', 'news', 'your-plugin-textdomain' ),
			'add_new_item'       => __( 'Add New News', 'your-plugin-textdomain' ),
			'new_item'           => __( 'New News', 'your-plugin-textdomain' ),
			'edit_item'          => __( 'Edit News', 'your-plugin-textdomain' ),
			'view_item'          => __( 'View News', 'your-plugin-textdomain' ),
			'all_items'          => __( 'All News', 'your-plugin-textdomain' ),
			'search_items'       => __( 'Search News', 'your-plugin-textdomain' ),
			'parent_item_colon'  => __( 'Parent News:', 'your-plugin-textdomain' ),
			'not_found'          => __( 'No News found.', 'your-plugin-textdomain' ),
			'not_found_in_trash' => __( 'No News found in Trash.', 'your-plugin-textdomain' )
		);

		$args = array(
			'labels'             => $labels,
			'description'        => __( 'Description.', 'your-plugin-textdomain' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'book' ),
			'taxonomies'         => array( 'post_tag', 'category' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_icon'          => 'dashicons-edit',
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		);

		register_post_type( 'news', $args );
	}
}
new NewsCustomPostType();
