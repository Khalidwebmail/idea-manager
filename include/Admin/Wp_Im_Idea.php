<?php

namespace Idea\Manager\Admin;
/**
 * Class Wp_Idea
 * @package Idea\Manager\Admin
 */
class Wp_Im_Idea {
    /**
     * Create a button on admin side bar use to add custom post type
     * $labels array
     * $args array
     * @return void
     */
    public function wp_im_idea() {

        $labels = [
            'name'               => __( 'Ideas', 'wp-idea-manager' ),
            'singular_name'      => __( 'Idea', 'wp-idea-manager' ),
            'menu_name'          => __( 'Wp Idea Manager', 'wp-idea-manager' ),
            'name_admin_bar'     => __( 'Idea', 'wp-idea-manager' ),
            'add_new'            => __( 'Add New', 'wp-idea-manager' ),
            'add_new_item'       => __( 'Add New Idea', 'wp-idea-manager' ),
            'new_item'           => __( 'New Idea', 'wp-idea-manager' ),
            'edit_item'          => __( 'Edit Idea', 'wp-idea-manager' ),
            'view_item'          => __( 'View Idea', 'wp-idea-manager' ),
            'all_items'          => __( 'All Ideas Requests', 'wp-idea-manager' ),
            'search_items'       => __( 'Search Ideas', 'wp-idea-manager' ),
            'not_found'          => __( 'No Ideas found.', 'wp-idea-manager' ),
            'not_found_in_trash' => __( 'No Ideas found in Trash.', 'wp-idea-manager' ),
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
}