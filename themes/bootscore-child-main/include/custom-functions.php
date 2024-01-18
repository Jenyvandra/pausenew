<?php

/*Custom-function.php file */
/*Enqueue Style & Script */
function pf_child_enqueue_styles() {

    // style.css
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
  
    // Compiled main.css
    $modified_bootscoreChildCss = date('YmdHi', filemtime(get_stylesheet_directory() . '/css/main.css'));
    wp_enqueue_style('main', get_stylesheet_directory_uri() . '/css/main.css', array('parent-style'), $modified_bootscoreChildCss);

	//AOS CSS
	wp_enqueue_style( 'dist-aos-style', get_stylesheet_directory_uri() . '/css/dist-aos.css', array(), time() );
 
    // custom.js
    wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/custom.js', false, time(), true);

	// aos.js
    wp_enqueue_script('aos-js', get_stylesheet_directory_uri() . '/js/aos.js', false, time(), true);

	//Owl Carousel js
	wp_enqueue_script( 'owl-carousel-script', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', null, null, true );
}


/*Responsive Style */
function pf_child_responsive_styles() {

    //Responsive CSS
    wp_enqueue_style( 'pf-responsive-style', get_stylesheet_directory_uri() . '/css/responsive.css', array(), time() );

}

/*Custom Post-type Registration */
function pf_doctor_custom_post_type() 
{
	$labels = array(
		'name'                => __( 'Doctors' ),
		'singular_name'       => __( 'Doctor'),
		'menu_name'           => __( 'Doctors'),
		'parent_item_colon'   => __( 'Parent Doctor'),
		'all_items'           => __( 'All Doctors'),
		'view_item'           => __( 'View Doctor'),
		'add_new_item'        => __( 'Add New Doctor'),
		'add_new'             => __( 'Add New'),
		'edit_item'           => __( 'Edit Doctor'),
		'update_item'         => __( 'Update Doctor'),
		'search_items'        => __( 'Search Doctor'),
		'not_found'           => __( 'Not Found'),
		'not_found_in_trash'  => __( 'Not found in Trash')
	);
	$args = array(
		'label'               => __( 'Doctors'),
		'description'         => __( 'Best Doctors'),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields'),
		'public'              => true,
		'hierarchical'        => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'menu_icon'           => 'dashicons-businessman',
		'show_in_admin_bar'   => true,
		'has_archive'         => true,
		'can_export'          => true,
		'exclude_from_search' => false,
		'yarpp_support'       => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'post'
	);
   $labels_wn = array(
		'name'                => __( 'Webinars' ),
		'singular_name'       => __( 'Webinar'),
		'menu_name'           => __( 'Webinars'),
		'parent_item_colon'   => __( 'Parent Webinar'),
		'all_items'           => __( 'All Webinars'),
		'view_item'           => __( 'View Webinar'),
		'add_new_item'        => __( 'Add New Webinar'),
		'add_new'             => __( 'Add New'),
		'edit_item'           => __( 'Edit Webinar'),
		'update_item'         => __( 'Update Webinar'),
		'search_items'        => __( 'Search Webinar'),
		'not_found'           => __( 'Not Found'),
		'not_found_in_trash'  => __( 'Not found in Trash')
	);
	$args_wn = array(
		'label'               => __( 'Webinars'),
		'description'         => __( 'Best Webinars'),
		'labels'              => $labels_wn,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields'),
		'public'              => true,
		'hierarchical'        => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'menu_icon'           => 'dashicons-media-video',
		'show_in_admin_bar'   => true,
		'has_archive'         => true,
		'can_export'          => true,
		'exclude_from_search' => false,
		'yarpp_support'       => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'post'
	);
	$labels_me = array(
		'name'                => __( 'Experiences' ),
		'singular_name'       => __( 'Experience'),
		'menu_name'           => __( 'Experiences'),
		'parent_item_colon'   => __( 'Parent Experience'),
		'all_items'           => __( 'All Experiences'),
		'view_item'           => __( 'View Experience'),
		'add_new_item'        => __( 'Add New Experience'),
		'add_new'             => __( 'Add New'),
		'edit_item'           => __( 'Edit Experience'),
		'update_item'         => __( 'Update Experience'),
		'search_items'        => __( 'Search Experience'),
		'not_found'           => __( 'Not Found'),
		'not_found_in_trash'  => __( 'Not found in Trash')
	);
	$args_me = array(
		'label'               => __( 'Experiences'),
		'description'         => __( 'Best Experiences'),
		'labels'              => $labels_me,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields'),
		'public'              => true,
		'hierarchical'        => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'menu_icon'           => 'dashicons-editor-quote',
		'show_in_admin_bar'   => true,
		'has_archive'         => true,
		'can_export'          => true,
		'exclude_from_search' => false,
		'yarpp_support'       => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'post'
	);
	$labels_prg = array(
		'name'                => __( 'Programs' ),
		'singular_name'       => __( 'Program'),
		'menu_name'           => __( 'Programs'),
		'parent_item_colon'   => __( 'Parent Program'),
		'all_items'           => __( 'All Programs'),
		'view_item'           => __( 'View Program'),
		'add_new_item'        => __( 'Add New Program'),
		'add_new'             => __( 'Add New'),
		'edit_item'           => __( 'Edit Program'),
		'update_item'         => __( 'Update Program'),
		'search_items'        => __( 'Search Program'),
		'not_found'           => __( 'Not Found'),
		'not_found_in_trash'  => __( 'Not found in Trash')
	);
	$args_prg = array(
		'label'               => __( 'Programs'),
		'description'         => __( 'Best Programs'),
		'labels'              => $labels_prg,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields'),
		'public'              => true,
		'hierarchical'        => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'menu_icon'           => 'dashicons-products',
		'show_in_admin_bar'   => true,
		'has_archive'         => true,
		'can_export'          => true,
		'exclude_from_search' => false,
		'yarpp_support'       => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'post'
	);
	$labels_et = array(
		'name'                => __( 'Events' ),
		'singular_name'       => __( 'Event'),
		'menu_name'           => __( 'Events'),
		'parent_item_colon'   => __( 'Parent Event'),
		'all_items'           => __( 'All Events'),
		'view_item'           => __( 'View Event'),
		'add_new_item'        => __( 'Add New Event'),
		'add_new'             => __( 'Add New'),
		'edit_item'           => __( 'Edit Event'),
		'update_item'         => __( 'Update Event'),
		'search_items'        => __( 'Search Event'),
		'not_found'           => __( 'Not Found'),
		'not_found_in_trash'  => __( 'Not found in Trash')
	);
	$args_et = array(
		'label'               => __( 'Events'),
		'description'         => __( 'Best Events'),
		'labels'              => $labels_et,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields'),
		'public'              => true,
		'hierarchical'        => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'menu_icon'           => 'dashicons-schedule',
		'show_in_admin_bar'   => true,
		'has_archive'         => true,
		'can_export'          => true,
		'exclude_from_search' => false,
		'yarpp_support'       => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'post'
	);
	$labels_vi = array(
		'name'                => __( 'Videos' ),
		'singular_name'       => __( 'Video'),
		'menu_name'           => __( 'Videos'),
		'parent_item_colon'   => __( 'Parent Video'),
		'all_items'           => __( 'All Videos'),
		'view_item'           => __( 'View Video'),
		'add_new_item'        => __( 'Add New Video'),
		'add_new'             => __( 'Add New'),
		'edit_item'           => __( 'Edit Video'),
		'update_item'         => __( 'Update Video'),
		'search_items'        => __( 'Search Video'),
		'not_found'           => __( 'Not Found'),
		'not_found_in_trash'  => __( 'Not found in Trash')
	);
	$args_vi = array(
		'label'               => __( 'Videos'),
		'description'         => __( 'Best Videos'),
		'labels'              => $labels_vi,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields'),
		'public'              => true,
		'hierarchical'        => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'menu_icon'           => 'dashicons-format-video',
		'show_in_admin_bar'   => true,
		'has_archive'         => true,
		'can_export'          => true,
		'exclude_from_search' => false,
		'yarpp_support'       => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'post'
	);
  
   register_post_type( 'doctors', $args );
   register_post_type( 'webinars', $args_wn );
   register_post_type( 'mp-experiences', $args_me );
   register_post_type( 'programs', $args_prg );
   register_post_type( 'events', $args_et );
   register_post_type( 'videos', $args_vi );

}

/*Register Custom Taxonomies */
function pf_custom_post_type_taxonomies() {
   $args_taxonomy_vi = array(
      'hierarchical' => true, 
      'public'              => true,
      'show_ui'             => true,
      'show_admin_column'   => true,
      'show_in_rest'        => true,
      'show_tagcloud'       => false,
      'labels' => array(
          'name' => _x( 'Video Category', 'Video Category' ),
          'singular_name' => _x( 'Video Category', 'Video Category' ),
          'search_items' =>  __( 'Search Videos Category' ),
          'all_items' => __( 'All Videos Category' ),
          'parent_item' => __( 'Parent Video Category' ),
          'parent_item_colon' => __( 'Parent Video Category:' ),
          'edit_item' => __( 'Edit Video Category' ),
          'update_item' => __( 'Update Video Category' ),
          'add_new_item' => __( 'Add New Video Category' ),
          'new_item_name' => __( 'New Video Category Name' ),
          'menu_name' => __( 'Categories' ),
        ),
      'rewrite' => array( 'slug' => 'videos'),	
   );
	
   $args_taxonomy_wn = array(
      'hierarchical' => true, 
      'public'              => true,
      'show_ui'             => true,
      'show_admin_column'   => true,
      'show_in_rest'        => true,
      'show_tagcloud'       => false,
      'labels' => array(
          'name' => _x( 'Webinar Category', 'Webinar Category' ),
          'singular_name' => _x( 'Webinar Category', 'Webinar Category' ),
          'search_items' =>  __( 'Search Webinars Category' ),
          'all_items' => __( 'All Webinars Category' ),
          'parent_item' => __( 'Parent Webinar Category' ),
          'parent_item_colon' => __( 'Parent Webinar Category:' ),
          'edit_item' => __( 'Edit Webinar Category' ),
          'update_item' => __( 'Update Webinar Category' ),
          'add_new_item' => __( 'Add New Webinar Category' ),
          'new_item_name' => __( 'New Webinar Category Name' ),
          'menu_name' => __( 'Categories' ),
        ),
      'rewrite' => array( 'slug' => 'webinars'),	
   );

   $args_taxonomy_et = array(
      'hierarchical' => true, 
      'public'              => true,
      'show_ui'             => true,
      'show_admin_column'   => true,
      'show_in_rest'        => true,
      'show_tagcloud'       => false,
      'labels' => array(
          'name' => _x( 'Event Category', 'Event Category' ),
          'singular_name' => _x( 'Event Category', 'Event Category' ),
          'search_items' =>  __( 'Search Events Category' ),
          'all_items' => __( 'All Events Category' ),
          'parent_item' => __( 'Parent Event Category' ),
          'parent_item_colon' => __( 'Parent Event Category:' ),
          'edit_item' => __( 'Edit Event Category' ),
          'update_item' => __( 'Update Event Category' ),
          'add_new_item' => __( 'Add New Event Category' ),
          'new_item_name' => __( 'New Event Category Name' ),
          'menu_name' => __( 'Categories' ),
        ),
      'rewrite' => array( 'slug' => 'events'),	
   );
	
   register_taxonomy( 'event_category','events',$args_taxonomy_et);	
   register_taxonomy( 'webinar_category','webinars',$args_taxonomy_wn);
   register_taxonomy( 'video_category','videos',$args_taxonomy_vi);	
}

/*Login logo & link Customization */
function pf_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo home_url(); ?>/wp-content/uploads/2023/08/pf-logo.png);
		height:74px;
		width:210px;
		background-size: 210px 74px;
		background-repeat: no-repeat;
        }
    </style>
<?php }

function pf_login_logo_url() {
    return home_url();
}

function pf_login_logo_url_title() {
    return 'PauseForward';
}
