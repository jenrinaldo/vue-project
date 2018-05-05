<?php 
require_once ('templates/costum_func.php');
/**
 * THIS IS TO UPDATE THE POST / PAGE PREVIEW
 * USES THE COMPONENT "PREVIEW"
*/

//change preview post links - to match wpvue route
function new_preview_link() {
  $slug = basename(get_the_ID()); 
  $mydir = '/preview/'; 
  $mynewpurl = "$mydir$slug";
  return "$mynewpurl";
}
add_filter( 'preview_post_link', 'new_preview_link' );

//adding custom route for preview
add_action( 'rest_api_init', 'my_custom_endpoints' );

function my_custom_endpoints() { 
	register_rest_route( 'wpvue', '/preview', array(
        'methods' => 'GET',
        'callback' => 'post_preview_callback',
    ));
}

function post_preview_callback( $request_data ) { 
    // endpoint looks like: /wp-json/wpvue/preview?id=98
    $parameters = $request_data->get_params();
    $preview = wp_get_post_autosave($parameters[id]);

    $url = get_bloginfo('url').'/wp-json/wp/v2/posts?id='. $parameters[id]; 
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);

    $postarray = json_decode($result);

    if(count($postarray) > 0){     
      $postarray[0]->title->rendered =  $preview->post_title;
      $postarray[0]->content->rendered = $preview->post_content;  
    }else{
      throw new Exception('No record found'); 
    }
    return $postarray;
}

/**
 * END POST / PAGE PREVIEW
 * 
*/


/**
 * CHANGES URL PREFIX
 * TO MATCH OUR VUE ROUTE 
 * SO A PAGE WILL LOOK LIKE 
 * /post/post-name/
 * /page/page-name/
 * https://stackoverflow.com/questions/17613789/wordpress-rewrite-add-base-prefix-to-pages-only * 
 * 
 */

function change_base_permalinks() {
  global $wp_rewrite;
 
  // $wp_rewrite->permalink_structure = 'post/%postname%/';
  $wp_rewrite->page_structure = 'page/%pagename%';
  // $wp_rewrite->extra_permastructs['category']['struct'] = 'category/%category%';
  $wp_rewrite->flush_rules();
  // var_dump($wp_rewrite);exit;

  //look into this:
  //https://wordpress.stackexchange.com/questions/152306/change-permalinks-structure-for-specific-category

}
add_action('init','change_base_permalinks');



function prepare_rest($data,$post,$request){
  
  
  $_data = $data->data;

  
  //Categories
  $tipes = get_the_terms($post->ID,'tipe');
  $genres = get_the_terms($post->ID,'genre');
  $seri = get_the_terms($post->ID,'series');
  $_data['tipes'] = $tipes;
  $_data['genres'] = $genres;
  $_data['seri'] = $seri;



  //Back to data
  $data->data = $_data;
  return $data;
}
add_filter('rest_prepare_post', 'prepare_rest', 10,3);

//ADDS FILTER TO QUERY PARAMETER 

add_action( 'rest_api_init', 'rest_api_filter_add_filters' );

 /**
  * Add the necessary filter to each post type
  **/
function rest_api_filter_add_filters() {
	foreach ( get_post_types( array( 'show_in_rest' => true ), 'objects' ) as $post_type ) {
		add_filter( 'rest_' . $post_type->name . '_query', 'rest_api_filter_add_filter_param', 10, 2 );
	}
}
add_filter('rest_query_vars', 'wpse225850_add_rest_query_vars');

function wpse225850_add_rest_query_vars($query_vars) {

    $query_vars = array_merge( $query_vars, array('meta_key', 'meta_value', 'meta_compare') );

    return $query_vars;

}

add_action( 'rest_api_init', 'create_api_posts_meta_field' );

function create_api_posts_meta_field() {

 // register_rest_field ( 'name-of-post-type', 'name-of-field-to-return', array-of-callbacks-and-schema() )
 register_rest_field( 'posts', 'metaval', array(
 'get_callback' => 'get_post_meta_for_api',
 'schema' => null,
 )
 );
}

function get_post_meta_for_api( $object ) {
 //get the id of the post object array
 $post_id = $object['id'];

 //return the post meta
 return get_post_meta( $post_id );
}

/**
 * Add the filter parameter
 *
 * @param  array           $args    The query arguments.
 * @param  WP_REST_Request $request Full details about the request.
 * @return array $args.
 **/
function rest_api_filter_add_filter_param( $args, $request ) {
	// Bail out if no filter parameter is set.
	if ( empty( $request['filter'] ) || ! is_array( $request['filter'] ) ) {
		return $args;
	}

	$filter = $request['filter'];

	if ( isset( $filter['posts_per_page'] ) && ( (int) $filter['posts_per_page'] >= 1 && (int) $filter['posts_per_page'] <= 100 ) ) {
		$args['posts_per_page'] = $filter['posts_per_page'];
	}

	global $wp;
	$vars = apply_filters( 'query_vars', $wp->public_query_vars );

	foreach ( $vars as $var ) {
		if ( isset( $filter[ $var ] ) ) {
			$args[ $var ] = $filter[ $var ];
		}
	}
	return $args;
}
/**
 * below will allow comments via rest api
 */
function allow_anonymous_comments() {
  return true;
}
add_filter('rest_allow_anonymous_comments','allow_anonymous_comments');
add_action( 'init', 'anime_taxonomy', 30 );
function anime_taxonomy() {
 
  	register_taxonomy("genre", "post", array(
		"labels"             => array(
			"name"                       => "Genre",
			"singular_name"              => "Genre",
			"menu_name"                  => "Genre",
			"all_items"                  => "Semua Genre",
			"edit_item"                  => "Ubah Genre",
			"view_item"                  => "Lihat Genre",
			"update_item"                => "Perbarui Genre",
			"add_new_item"               => "Tambah Genre Baru",
			"new_item_name"              => "Nama Genre Baru",
			"parent_item"                => "Induk Genre",
			"parent_item_colon"          => "Induk Genre:",
			"search_items"               => "Cari Genre",
			"popular_items"              => "Genre Populer",
			"separate_items_with_commas" => "Batasi Genre dengan Koma",
			"add_or_remove_items"        => "Tambah atau Hapus Genre",
			"choose_from_most_used"      => "Pilih dari yang paling sering digunakan",
			"not_found"                  => "Tidak ada"
		),
		"public"             => true,
		"publicly_queryable" => true,
		"show_ui"            => true,
		"show_in_menu"       => true,
		"show_in_nav_menus"  => true,
		"show_tagcloud"      => true,
		"show_in_quick_edit" => true,
		"show_admin_column"  => false,
		"hierarchical"       => false,
		"query_var"          => true,
		"sort"               => true,
		'show_in_rest'          => true,
        'rest_base'             => 'genre',
        'rest_controller_class' => 'WP_REST_Terms_Controller',
        'rewrite' => array( 'slug' => 'genre', 'with_front' => false )
	));
	register_taxonomy("tipe", "post", array(
		"labels"             => array(
			"name"                       => "Type",
			"singular_name"              => "Type",
			"menu_name"                  => "Type",
			"all_items"                  => "Semua Type",
			"edit_item"                  => "Ubah Type",
			"view_item"                  => "Lihat Type",
			"update_item"                => "Perbarui Type",
			"add_new_item"               => "Tambah Type Baru",
			"new_item_name"              => "Nama Type Baru",
			"parent_item"                => "Induk Type",
			"parent_item_colon"          => "Induk Type:",
			"search_items"               => "Cari Type",
			"popular_items"              => "Type Populer",
			"separate_items_with_commas" => "Batasi Type dengan Koma",
			"add_or_remove_items"        => "Tambah atau Hapus Type",
			"choose_from_most_used"      => "Pilih dari yang paling sering digunakan",
			"not_found"                  => "Tidak ada"
		),
		"public"             => true,
		"publicly_queryable" => true,
		"show_ui"            => true,
		"show_in_menu"       => true,
		"show_in_nav_menus"  => true,
		"show_tagcloud"      => true,
		"show_in_quick_edit" => true,
		"show_admin_column"  => false,
		"hierarchical"       => false,
		"query_var"          => true,
		"sort"               => true,
		'show_in_rest'          => true,
        'rest_base'             => 'tipe',
        'rest_controller_class' => 'WP_REST_Terms_Controller',
        'rewrite' => array( 'slug' => 'tipe', 'with_front' => false )
	));
		register_taxonomy("series", "post", array(
		"labels"             => array(
			"name"                       => "Series",
			"singular_name"              => "Series",
			"menu_name"                  => "Series",
			"all_items"                  => "Semua Series",
			"edit_item"                  => "Ubah Series",
			"view_item"                  => "Lihat Series",
			"update_item"                => "Perbarui Series",
			"add_new_item"               => "Tambah Series Baru",
			"new_item_name"              => "Nama Series Baru",
			"parent_item"                => "Induk Series",
			"parent_item_colon"          => "Induk Series:",
			"search_items"               => "Cari Series",
			"popular_items"              => "Series Populer",
			"separate_items_with_commas" => "Batasi Series dengan Koma",
			"add_or_remove_items"        => "Tambah atau Hapus Series",
			"choose_from_most_used"      => "Pilih dari yang paling sering digunakan",
			"not_found"                  => "Tidak ada"
		),
		"public"             => true,
		"publicly_queryable" => true,
		"show_ui"            => true,
		"show_in_menu"       => true,
		"show_in_nav_menus"  => true,
		"show_tagcloud"      => true,
		"show_in_quick_edit" => true,
		"show_admin_column"  => false,
		"hierarchical"       => false,
		"query_var"          => true,
		"sort"               => true,
		'show_in_rest'          => true,
        'rest_base'             => 'series',
        'rest_controller_class' => 'WP_REST_Terms_Controller',
        'rewrite' => array( 'slug' => 'series', 'with_front' => false )
	));
	register_taxonomy("season", "post", array(
		"labels"             => array(
			"name"                       => "Season",
			"singular_name"              => "Season",
			"menu_name"                  => "Season",
			"all_items"                  => "Semua Season",
			"edit_item"                  => "Ubah Season",
			"view_item"                  => "Lihat Season",
			"update_item"                => "Perbarui Season",
			"add_new_item"               => "Tambah Season Baru",
			"new_item_name"              => "Nama Season Baru",
			"parent_item"                => "Induk Season",
			"parent_item_colon"          => "Induk Season:",
			"search_items"               => "Cari Season",
			"popular_items"              => "Season Populer",
			"separate_items_with_commas" => "Batasi Season dengan Koma",
			"add_or_remove_items"        => "Tambah atau Hapus Season",
			"choose_from_most_used"      => "Pilih dari yang paling sering digunakan",
			"not_found"                  => "Tidak ada"
		),
		"public"             => true,
		"publicly_queryable" => true,
		"show_ui"            => true,
		"show_in_menu"       => true,
		"show_in_nav_menus"  => true,
		"show_tagcloud"      => true,
		"show_in_quick_edit" => true,
		"show_admin_column"  => false,
		"hierarchical"       => false,
		"query_var"          => true,
		"sort"               => true,
		'show_in_rest'          => true,
        'rest_base'             => 'season',
        'rest_controller_class' => 'WP_REST_Terms_Controller',
        'rewrite' => array( 'slug' => 'season', 'with_front' => false )
	));
	register_taxonomy("producer", "post", array(
		"labels"             => array(
			"name"                       => "Producer",
			"singular_name"              => "Producer",
			"menu_name"                  => "Producer",
			"all_items"                  => "Semua Producer",
			"edit_item"                  => "Ubah Producer",
			"view_item"                  => "Lihat Producer",
			"update_item"                => "Perbarui Producer",
			"add_new_item"               => "Tambah Producer Baru",
			"new_item_name"              => "Nama Producer Baru",
			"parent_item"                => "Induk Producer",
			"parent_item_colon"          => "Induk Producer:",
			"search_items"               => "Cari Producer",
			"popular_items"              => "Producer Populer",
			"separate_items_with_commas" => "Batasi Producer dengan Koma",
			"add_or_remove_items"        => "Tambah atau Hapus Producer",
			"choose_from_most_used"      => "Pilih dari yang paling sering digunakan",
			"not_found"                  => "Tidak ada"
		),
		"public"             => true,
		"publicly_queryable" => true,
		"show_ui"            => true,
		"show_in_menu"       => true,
		"show_in_nav_menus"  => true,
		"show_tagcloud"      => true,
		"show_in_quick_edit" => true,
		"show_admin_column"  => false,
		"hierarchical"       => false,
		"query_var"          => true,
		"sort"               => true,
		'show_in_rest'          => true,
        'rest_base'             => 'producer',
        'rest_controller_class' => 'WP_REST_Terms_Controller',
        'rewrite' => array( 'slug' => 'producer', 'with_front' => false )
	));
}

?>