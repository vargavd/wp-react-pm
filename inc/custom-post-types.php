<?php

// ADD POST TYPES
add_action('init',  function () {
    // register post type: https://developer.wordpress.org/reference/functions/register_post_type/
    
    register_post_type( 'project', array(
        // labels: https://developer.wordpress.org/reference/functions/get_post_type_labels/ 
        'labels'             => array(
            'name'                  => 'Projects',
            'singular_name'         => 'Project', 
            'menu_name'             => 'Projects',
            'name_admin_bar'        => 'Project', 
            'add_new'               => 'Add New', 
            'add_new_item'          => 'Add New Project',
            'new_item'              => 'New Project', 
            'edit_item'             => 'Edit Project', 
            'view_item'             => 'View Project', 
            'all_items'             => 'All Projects', 
            'not_found'             => 'No Projects found.',
            'not_found_in_trash'    => 'No Projects found in Trash.', 
            'archives'              => 'Projects',
            'filter_items_list'     => 'Filter projects list',
            'items_list_navigation' => 'Projects list navigation',
            'items_list'            => 'Projects list',
        ),
        'public'             => true,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
        'show_in_rest'       => true,
        'rest_base'          => 'projects',
        'menu_icon'          => 'dashicons-welcome-widgets-menus',
        'supports'           => array( 'title', 'editor', 'excerpt'),
    ));

    register_post_type( 'task', array(
        // labels: https://developer.wordpress.org/reference/functions/get_post_type_labels/ 
        'labels'             => array(
            'name'                  => 'Tasks',
            'singular_name'         => 'Task', 
            'menu_name'             => 'Tasks',
            'name_admin_bar'        => 'Task', 
            'add_new'               => 'Add New', 
            'add_new_item'          => 'Add New Task',
            'new_item'              => 'New Task', 
            'edit_item'             => 'Edit Task', 
            'view_item'             => 'View Task', 
            'all_items'             => 'All Tasks', 
            'not_found'             => 'No Tasks found.',
            'not_found_in_trash'    => 'No Tasks found in Trash.', 
            'archives'              => 'Tasks',
            'filter_items_list'     => 'Filter Tasks list',
            'items_list_navigation' => 'Tasks list navigation',
            'items_list'            => 'Tasks list',
        ),
        'public'             => true,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
        'show_in_rest'       => true,
        'rest_base'          => 'tasks',
        'menu_icon'          => 'dashicons-editor-ul',
        'supports'           => array( 'title', 'editor', 'excerpt'),
    ));
});
