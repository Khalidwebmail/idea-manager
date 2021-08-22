<?php

namespace Idea\Manager\Admin;

/**
 * Class Wp_Idea
 * @package Idea\Manager\Admin
 */
class Wp_Idea {
    public function __construct() {
        add_action( 'init', [ $this, 'wp_cpt_idea' ] );
        add_action( 'init', [ $this, 'wp_cpt_hierarchical_taxonomy' ], 0 );
    }

    /**
     * 
     */
    public function wp_cpt_idea() {

        $labels = [
            'name'               => __( 'Ideas', 'idea-manager' ),
            'singular_name'      => __( 'Idea', 'idea-manager' ),
            'menu_name'          => __( 'Wp Idea Manager', 'idea-manager' ),
            'name_admin_bar'     => __( 'Idea', 'idea-manager' ),
            'add_new'            => __( 'Add New', 'idea-manager' ),
            'add_new_item'       => __( 'Add New Idea', 'idea-manager' ),
            'new_item'           => __( 'New Idea', 'idea-manager' ),
            'edit_item'          => __( 'Edit Idea', 'idea-manager' ),
            'view_item'          => __( 'View Idea', 'idea-manager' ),
            'all_items'          => __( 'All Ideas Requests', 'idea-manager' ),
            'search_items'       => __( 'Search Ideas', 'idea-manager' ),
            'not_found'          => __( 'No Ideas found.', 'idea-manager' ),
            'not_found_in_trash' => __( 'No Ideas found in Trash.', 'idea-manager' ),
            'rewrite'            => false,
        ];

        $args = [
            'public'                => true,
            'hierarchical'          => true,
            'publicly_queryable'    => true,
            'query_var'             => true,
            'labels'                => $labels,
            'menu_icon'             => 'dashicons-book-alt',
            'capability_type'       => 'post',
            'supports'              => [ 'title', 'editor', 'author', 'thumbnail', 'comments' ],
            'taxonomies'            => [ 'category' ],
        ];
        register_post_type( 'idea', $args );
    }

    /**
     * Create a button on admin side bar with custom tag
     * $labels array
     * $args array
     * @return void
     */
    public function wp_cpt_hierarchical_taxonomy() {

        $labels = [
            'name'              => __( 'Idea Topics', 'idea' ),
            'singular_name'     => __( 'Idea Topic', 'categories' ),
            'search_items'      => __( 'Search Subjects' ),
            'all_items'         => __( 'All Subjects' ),
            'parent_item'       => __( 'Parent Subject' ),
            'parent_item_colon' => __( 'Parent Subject:' ),
            'edit_item'         => __( 'Edit Subject' ),
            'update_item'       => __( 'Update Subject' ),
            'add_new_item'      => __( 'Add New Subject' ),
            'new_item_name'     => __( 'New Subject Name' ),
            'menu_name'         => __( 'Idea Topics' ),
        ];

        register_taxonomy('idea_tag', [ 'idea' ], [
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_in_rest'      => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => [ 'slug' => 'idea' ],
        ]);
    }
}