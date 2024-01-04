<?php
function university_post_types()
{
    //Campus Post Type
    register_post_type(
        'campus',
        array(
            'capability_type' => 'campus',
            'map_meta_cap' => true,
            'rewrite' => array('slug' => 'campuses'),
            'supports' => array('title', 'editor', 'excerpt'),
            'has_archive' => true,
            'public' => true,
            'show_in_rest' => true,
            'labels' => array(
                'name' => 'Campuses',
                'add_new_item' => 'Add New Campus',
                'edit_item' => 'Edit Campus',
                'all_items' => 'All Campuses',
                'singular_name' => 'Campus'
            ),
            'menu_icon' => 'dashicons-location-alt'
        )
    );

    // Event Post Type
    register_post_type(
        'event',
        array(
            'capability_type' => 'event',
            'map_meta_cap' => true,
            'rewrite' => array('slug' => 'events'),
            'supports' => array('title', 'editor', 'excerpt'),
            'has_archive' => true,
            'public' => true,
            'show_in_rest' => true,
            'labels' => array(
                'name' => 'Events',
                'add_new_item' => 'Add New Event',
                'edit_item' => 'Edit Event',
                'all_items' => 'All Events',
                'singular_name' => 'Event'
            ),
            'menu_icon' => 'dashicons-calendar'
        )
    );
    // Program Post Type
    register_post_type(
        'program',
        array(
            'rewrite' => array('slug' => 'programs'),
            //archive page url
            'supports' => array('title'),
            'has_archive' => true,
            // to create arcive page
            'public' => true,
            'show_in_rest' => true,
            'labels' => array(
                'name' => 'Programs',
                'add_new_item' => 'Add New Program',
                'edit_item' => 'Edit Program',
                'all_items' => 'All Programs',
                'singular_name' => 'Program'
            ),
            'menu_icon' => 'dashicons-awards'
        )
    );
    //Professor post type
    register_post_type(
        'professor',
        array(
            'show_in_rest' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'public' => true,
            'show_in_menu' => true,
            'labels' => array(
                'name' => 'Professors',
                'add_new_item' => 'Add New Professor',
                'edit_item' => 'Edit Professor',
                'all_items' => 'All Professors',
                'singular_name' => 'Professor'
            ),
            'menu_icon' => 'dashicons-welcome-learn-more'
        )
    );
    //Note post type
    register_post_type(
        'note',
        array(
            'show_in_rest' => true,
            'supports' => array('title', 'editor'),
            'public' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'labels' => array(
                'name' => 'Notes',
                'add_new_item' => 'Add New Note',
                'edit_item' => 'Edit Note',
                'all_items' => 'All Notes',
                'singular_name' => 'Note'
            ),
            'menu_icon' => 'dashicons-welcome-write-blog'
        )
    );
    // Like post type
    register_post_type(
        'like',
        array(
            'supports' => array('title'),
            'public' => false,
            'show_ui' => true,
            'show_in_rest' => true,
            'labels' => array(
                'name' => 'Likes',
                'add_new_item' => 'Add New Like',
                'edit_item' => 'Edit Like',
                'all_items' => 'All Likes',
                'singular_name' => 'Like'
            ),
            'menu_icon' => 'dashicons-heart'
        )
    );

}
add_action('init', 'university_post_types');