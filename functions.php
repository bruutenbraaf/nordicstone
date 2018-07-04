<?php

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');	
	
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' ); 
add_theme_support( 'custom-logo' );
	
function register_my_menus() {
  register_nav_menus(
    array(
      'hoofd_menu' => __( 'Hoofd Menu' ),
      'gebruiker_menu' => __( 'Gebruiker Menu' ),
      'second_menu' => __( 'Secondaire Menu' ),
    )
  );
}
add_action( 'init', 'register_my_menus' );
	
	function arphabet_widgets_init() {
		
		register_sidebar( array(
			'name'          => 'Pagina Sidebar',
			'id'            => 'page_sidebar',
			'before_widget' => '<div class="widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>'
		) );
		
		register_sidebar( array(
			'name'          => 'Product Sidebar',
			'id'            => 'product_sidebar',
			'before_widget' => '<div class="widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>'
		) );
		
		register_sidebar( array(
			'name'          => 'Footer een',
			'id'            => 'footer_een',

		) );
		
		register_sidebar( array(
			'name'          => 'Footer twee',
			'id'            => 'footer_twee',
		) );	
		
		register_sidebar( array(
			'name'          => 'Footer drie',
			'id'            => 'footer_drie',
		) );	
		
		register_sidebar( array(
			'name'          => 'Footer vier',
			'id'            => 'footer_vier',
		) );	
		register_sidebar( array(
			'name'          => 'Categorieën',
			'id'            => 'categories',
		) );	
		
		register_sidebar( array(
			'name'          => 'Shop Sidebar',
			'id'            => 'shop_bar',

		) );	
								
}

add_action( 'widgets_init', 'arphabet_widgets_init' );

acf_add_options_page( array(

'page_title' 	=> 'Website informatie',
'menu_title' 	=> 'Logo & Opties',
'menu_slug' 	=> 'website-informatie',
'capability' 	=> 'edit_posts', 
'icon_url' => 'dashicons-universal-access-alt',
'position' => 3

) );

acf_add_options_page( array(

'page_title' 	=> 'Carousel',
'menu_title' 	=> 'Carousel',
'menu_slug' 	=> 'carousel',
'capability' 	=> 'edit_posts', 
'icon_url' => 'dashicons-money',
'position' => 3

) );


acf_add_options_page( array(

'page_title' 	=> 'Uitgelicht categorieën',
'menu_title' 	=> 'Uitgelichte cate..',
'menu_slug' 	=> 'uitgelicht',
'capability' 	=> 'edit_posts', 
'icon_url' => 'dashicons-money',
'position' => 4

) );


?>