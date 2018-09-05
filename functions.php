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


function my_wp_nav_menu_args( $args = '' ) {
 
if( is_user_logged_in() ) { 
    $args['menu'] = 'logged-in';
} else { 
    $args['menu'] = 'logged-out';
} 
    return $args;
}
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );
add_filter( 'woocommerce_subcategory_count_html', 'wcc_hide_category_count' );
function wcc_hide_category_count() {
	// No count
}




function remove_uncategorized_category( $terms, $taxonomy, $query_vars, $term_query ) {
	if ( is_admin() )
		return $terms;
 
	if ( $taxonomy[0] == 'product_cat' ) {
		foreach ( $terms as $k => $term ) {
			if ( $term->term_id == get_option( 'default_product_cat' ) ) {
				unset( $terms[$k] );
			}
		}
	}
 
	return $terms;
}
add_filter( 'get_terms', 'remove_uncategorized_category', 10, 4 );






  if (!class_exists('WC_List_Grid')) {

  class WC_List_Grid {

  public function __construct() {
  // Hooks
  add_action('wp', array($this, 'setup_gridlist'), 20);
  // Init settings
  $this->settings = array(
  array(
  'name' => __('Default catalog view', 'woocommerce-grid-list-toggle'),
  'type' => 'title',
  'id' => 'wc_glt_options'
  ),
  array(
  'name' => __('Default catalog view', 'woocommerce-grid-list-toggle'),
  'desc_tip' => __('Display products in grid or list view by default', 'woocommerce-grid-list-toggle'),
  'id' => 'wc_glt_default',
  'type' => 'select',
  'options' => array(
  'grid' => __('Grid', 'woocommerce-grid-list-toggle'),
  'list' => __('List', 'woocommerce-grid-list-toggle')
  )
  ),
  array('type' => 'sectionend', 'id' => 'wc_glt_options'),
  );
  // Default options
  add_option('wc_glt_default', 'grid');
  // Admin
  add_action('woocommerce_settings_image_options_after', array($this, 'admin_settings'), 20);
  add_action('woocommerce_update_options_catalog', array($this, 'save_admin_settings'));
  add_action('woocommerce_update_options_products', array($this, 'save_admin_settings'));
  }

  function admin_settings() {
  woocommerce_admin_fields($this->settings);
  }

  function save_admin_settings() {
  woocommerce_update_options($this->settings);
  }

  // Setup
  function setup_gridlist() {
  if (is_shop() || is_product_category() || is_product_tag() || is_product_taxonomy()) {
  add_action('woocommerce_before_shop_loop', array($this, 'gridlist_toggle_button'), 30);
  add_action('woocommerce_after_shop_loop_item', array($this, 'gridlist_buttonwrap_open'), 9);
  add_action('woocommerce_after_shop_loop_item', array($this, 'gridlist_buttonwrap_close'), 11);
  add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_single_excerpt', 5);
  add_action('woocommerce_after_subcategory', array($this, 'gridlist_cat_desc'));
  }
  }

  // Toggle button
  function gridlist_toggle_button() {
  $grid_view = __('Tabel weergave', 'woocommerce-grid-list-toggle');
  $list_view = __('Lijst weergave', 'woocommerce-grid-list-toggle');
  $output = sprintf('<nav class="gridlist-toggle">
  <a href="#" id="grid" title="gridview">&#8862; <span>Tabel weergave</span></a>
  <a href="#" id="list" title="listview">&#8863; <span>Lijst weergave</span></a>
</nav>', $grid_view, $list_view);
  echo apply_filters('gridlist_toggle_button_output', $output, $grid_view, $list_view);
  }

  // Button wrap
  function gridlist_buttonwrap_open() {
  echo apply_filters('gridlist_button_wrap_start', '<div class="gridlist-buttonwrap">');
  }

  function gridlist_buttonwrap_close() {
  echo apply_filters('gridlist_button_wrap_end', '</div>');
  }

  // hr
  function gridlist_hr() {
  echo apply_filters('gridlist_hr', '<hr />');
  }

  function gridlist_set_default_view() {
  $default = get_option('wc_glt_default');
  ?>
  <script>
  if (jQuery.cookie('gridcookie') == null) {
  jQuery('ul.products').addClass('<?php echo $default; ?>');
  jQuery('.gridlist-toggle #<?php echo $default; ?>').addClass('active');
  }
  </script>
  <?php
  }
  function gridlist_cat_desc($category) {
  global $woocommerce;
  echo apply_filters('gridlist_cat_desc_wrap_start', '<div itemprop="description">');
  echo $category->description;
  echo apply_filters('gridlist_cat_desc_wrap_end', '</div>');
  }
  }
  $WC_List_Grid = new WC_List_Grid();
  }


function wpdocs_excerpt_more( $more ) {
    return ' ...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );


function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


function get_stock_variations_from_product(){
    global $product;
    $variations = $product->get_available_variations();
    foreach($variations as $variation){
         $variation_id = $variation['variation_id'];
         $variation_obj = new WC_Product_variation($variation_id);
         $stock = $variation_obj->get_stock_quantity();
    }
}


add_shortcode( 'stock_status', 'display_product_stock_status' );
function display_product_stock_status( $atts) {

    $atts = shortcode_atts(
        array('id'  => get_the_ID() ),
        $atts, 'stock_status'
    );

    $product = wc_get_product( $atts['id'] );

    $stock_status = $product->get_stock_status();

    if ( 'instock' == $stock_status) {
        return '<p class="stock in-stock">Op voorraad</p>';
    } else {
        return '<p class="stock out-of-stock">Niet op voorraad</p>';
    }
}
?>