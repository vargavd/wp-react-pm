<?php

// ADD TAXONOMIES - https://developer.wordpress.org/reference/functions/register_taxonomy/
add_action('init', function () {
  register_taxonomy('project_tag', 'project', array(
    'labels' => array(
        'name'                  => 'Tags',
        'singular_name'         => 'Tag',
        'search_items'          => 'Search Tags',
        'popular_items'         => 'Popular Tags',
        'all_items'             => 'All Tags',
        'parent_item'           => null,
        'parent_item_colon'     => null,
        'edit_item'             => 'Edit Tag', 
        'update_item'           => 'Update Tag',
        'add_new_item'          => 'Add New Tag',
        'new_item_name'         => 'New Tag Name',
        'separate_items_with_commas' => 'Separate tags with commas',
        'add_or_remove_items'   => 'Add or remove tags',
        'choose_from_most_used' => 'Choose from the most used tags',
        'menu_name'             => 'Tags',
    ),
    'hierarchical'          => false,
    'show_ui'               => true,
    'show_in_rest'          => true,
    'show_admin_column'     => true,
    'query_var'             => true,
    'rewrite'               => array( 'slug' => 'project-tag' ),
  ));

  register_taxonomy('task_tag', 'task', array(
    'labels' => array(
        'name'                  => 'Tags',
        'singular_name'         => 'Tag',
        'search_items'          => 'Search Tags',
        'popular_items'         => 'Popular Tags',
        'all_items'             => 'All Tags',
        'parent_item'           => null,
        'parent_item_colon'     => null,
        'edit_item'             => 'Edit Tag', 
        'update_item'           => 'Update Tag',
        'add_new_item'          => 'Add New Tag',
        'new_item_name'         => 'New Tag Name',
        'separate_items_with_commas' => 'Separate tags with commas',
        'add_or_remove_items'   => 'Add or remove tags',
        'choose_from_most_used' => 'Choose from the most used tags',
        'menu_name'             => 'Tags',
    ),
    'hierarchical'          => true,
    'show_ui'               => true,
    'show_in_rest'          => true,
    'show_admin_column'     => true,
    'query_var'             => true,
    'rewrite'               => array( 'slug' => 'task-tag' ),
  ));
});


// EXTEND TAXONOMY LISTS (tables)
// https://wordpress.stackexchange.com/questions/77658/custom-columns-for-taxonomy-list-table
// https://developer.wordpress.org/reference/hooks/manage_this-screen-taxonomy_custom_column/
// https://developer.wordpress.org/reference/hooks/manage_screen-id_columns/


// ADD COLUMNS TO TABLE
function add_custom_tag_columns( $columns ) {
  unset($columns['description']);
  unset($columns['slug']);

  $columns['background_color'] = 'Background Color';
  $columns['icon'] = 'Icon';

  pr1($columns);
  return $columns;
}
add_filter( 'manage_edit-project_tag_columns', 'add_custom_tag_columns' );
add_filter( 'manage_edit-task_tag_columns', 'add_custom_tag_columns' );


// ADD COLUMN "CONTENT"
function add_custom_tag_column_content( $content, $column_name, $term_id ) {
  switch ($column_name) {
    case 'background_color':
      $content = get_field('background_color', "term_$term_id");
      break;
    case 'icon':
        $content = get_field('icon', "term_$term_id");
        break;
    default:
      break;
  }

  return $content;
}
add_filter( 'manage_project_tag_custom_column', 'add_custom_tag_column_content', 10, 3 );
add_filter( 'manage_task_tag_custom_column', 'add_custom_tag_column_content', 10, 3 );
