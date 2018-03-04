<?php
/**
 * Class NewsCustomPostType
 */

class NewsCustomPostType {
	public function __construct() {
		add_action( 'init', array( $this, 'news_cpt_init' ) );
	}

	/**
	 * Register News custom post type
	 */

	function news_cpt_init() {
		$labels = array(
			'name'               => _x( 'News', 'post type general name', 'text_domain' ),
			'singular_name'      => _x( 'News', 'post type singular name', 'text_domain' ),
			'menu_name'          => _x( 'News', 'admin menu', 'text_domain' ),
			'name_admin_bar'     => _x( 'Book', 'add new on admin bar', 'text_domain' ),
			'add_new'            => _x( 'Add New', 'news', 'text_domain' ),
			'add_new_item'       => __( 'Add New News', 'text_domain' ),
			'new_item'           => __( 'New News', 'text_domain' ),
			'edit_item'          => __( 'Edit News', 'text_domain' ),
			'view_item'          => __( 'View News', 'text_domain' ),
			'all_items'          => __( 'All News', 'text_domain' ),
			'search_items'       => __( 'Search News', 'text_domain' ),
			'parent_item_colon'  => __( 'Parent News:', 'text_domain' ),
			'not_found'          => __( 'No News found.', 'text_domain' ),
			'not_found_in_trash' => __( 'No News found in Trash.', 'text_domain' )
		);

		$args = array(
			'labels'             => $labels,
			'description'        => __( 'Description.', 'text_domain' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,

			'taxonomies'         => array( 'post_tag', 'category' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_icon'          => 'dashicons-edit',
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		);

		register_post_type( 'news', $args );
		flush_rewrite_rules();
	}
}
new NewsCustomPostType();