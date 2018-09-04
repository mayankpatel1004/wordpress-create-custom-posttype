<?php
//Registering Custom Post Type Artists
add_action( 'init', 'register_artist', 20 );
function register_artist() {
    $labels = array(
        'name' => _x( 'Artist', 'my_custom_post','custom' ),
        'singular_name' => _x( 'Artist', 'my_custom_post', 'custom' ),
        'add_new' => _x( 'Add New', 'my_custom_post', 'custom' ),
        'add_new_item' => _x( 'Add New ArtistPost', 'my_custom_post', 'custom' ),
        'edit_item' => _x( 'Edit ArtistPost', 'my_custom_post', 'custom' ),
        'new_item' => _x( 'New ArtistPost', 'my_custom_post', 'custom' ),
        'view_item' => _x( 'View ArtistPost', 'my_custom_post', 'custom' ),
        'search_items' => _x( 'Search ArtistPosts', 'my_custom_post', 'custom' ),
        'not_found' => _x( 'No ArtistPosts found', 'my_custom_post', 'custom' ),
        'not_found_in_trash' => _x( 'No ArtistPosts found in Trash', 'my_custom_post', 'custom' ),
        'parent_item_colon' => _x( 'Parent ArtistPost:', 'my_custom_post', 'custom' ),
        'menu_name' => _x( 'Artists Posts', 'my_custom_post', 'custom' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'Custom Artist',
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'post-formats', 'custom-fields' ),
        'taxonomies' => array( 'artist_tags','artist_category'),
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        //'menu_icon' => get_stylesheet_directory_uri() . '/functions/panel/images/catchinternet-small.png',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => array('slug' => 'themes/%themes_categories%','with_front' => FALSE),
        'public' => true,
        'has_archive' => 'themes',
        'capability_type' => 'post'
    );
    register_post_type( 'artist', $args );//max 20 charachter cannot contain capital letters and spaces
}  


function artist_taxonomy() {  
    register_taxonomy(  
        'artist_category',
        'artist',//post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Artist Category',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'artist', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before 
            )
        )  
    );  
}  
add_action( 'init', 'artist_taxonomy');



function artist_tags() {  
    register_taxonomy(  
        'artist_tags',
        'artist',//post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Artist Tags',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'artist', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before 
            )
        )  
    );  
}  
add_action( 'init', 'artist_tags');
?>