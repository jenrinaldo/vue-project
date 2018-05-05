<?php 
function CukStudio_MyAnimeList_API(){
	wp_enqueue_script("myanimelist", get_template_directory_uri(). "/js/myanimelist.js", null, null, true);
}

function MyAnimeList_API_Add_Meta_Box(){
	add_meta_box(
		"MyAnimeList-API",
		__("MyAnimeList API", "cstudio"),
		"MyAnimeList_API_Meta_Box",
		"post",
		"normal",
		"default"
	);
}

function jensan_meta_box( $meta_boxes ) {
	$prefix = 'jensan_';

	$meta_boxes[] = array(
		'id' => 'jensan-metabox',
		'title' => esc_html__( 'Anime Info', 'jensan' ),
		'post_types' => array( 'post' ),
		'context' => 'advanced',
		'priority' => 'high',
		'autosave' => true,
		'fields' => array(
			array(
				'id' => 'jensan-meta-box',
				'type' => 'heading',
				'name' => esc_html__( 'Episode Sekarang', 'jensan' ),
			),
			array(
				'id' => $prefix . 'episode',
				'name' => esc_html__( 'Episode Sekarang', 'jensan' ),
				'type' => 'text',
				'desc' => esc_html__( 'Field for Current Episode Status', 'jensan' ),
			),
			array(
				'id' => 'jensan-meta-box',
				'type' => 'heading',
				'name' => esc_html__( 'BD Status', 'jensan' ),
			),
			array(
				'id' => $prefix . 'bd',
				'name' => esc_html__( 'BD ?', 'jensan' ),
				'type' => 'checkbox',
				'desc' => esc_html__( 'Checkbox for BD Status', 'jensan' ),
			),
			array(
				'id' => 'background_link',
				'type' => 'heading',
				'name' => esc_html__( 'Background Link', 'jensan' ),
			),
			array(
				'id' => $prefix . 'bgcover',
				'type' => 'url',
				'name' => esc_html__( 'Background Cover', 'jensan' ),
			),
			array(
				'id' => $prefix . 'thcover',
				'type' => 'url',
				'name' => esc_html__( 'Thumbnail Cover', 'jensan' ),
			),
			array(
				'id' => 'altjudul',
				'type' => 'heading',
				'name' => esc_html__( 'Alternative Titlte', 'jensan' ),
			),
			array(
				"id" => $prefix . "english",
				"type" => "text",
				"name" => esc_html__( "English", "jensan" ),
			),
			array(
				"id" => $prefix . "japanese",
				"type" => "text",
				"name" => esc_html__( "Japanese", "jensan" ),
			),
			array(
				"id" => $prefix . "synonyms",
				"type" => "text",
				"name" => esc_html__( "Synonyms", "jensan" ),
			),
			array(
				"id" => "information",
				"type" => "heading",
				"name" => esc_html__( "Information", "jensan" ),
			),
			array(
				"id" => $prefix . "pv",
				"type" => "text",
				"name" => esc_html__( "Video PV", "jensan" ),
			),
			array(
				"id" => $prefix . "episodes",
				"type" => "text",
				"name" => esc_html__( "Episodes", "jensan" ),
			),
			array(
				"id" => $prefix . "status",
				"type" => "text",
				"name" => esc_html__( "Status", "jensan" ),
			),
			array(
				"id" => $prefix . "aired",
				"type" => "text",
				"name" => esc_html__( "Aired", "jensan" ),
			),
			array(
				"id" => $prefix . "broadcast",
				"type" => "text",
				"name" => esc_html__( "Broadcast", "jensan" ),
			),
			array(
				"id" => $prefix . "licensors",
				"type" => "text",
				"name" => esc_html__( "Licensors", "jensan" ),
			),
			array(
				"id" => $prefix . "studios",
				"type" => "text",
				"name" => esc_html__( "Studios", "jensan" ),
			),
			array(
				"id" => $prefix . "source",
				"type" => "text",
				"name" => esc_html__( "Source", "jensan" ),
			),
			array(
				"id" => $prefix . "duration",
				"type" => "text",
				"name" => esc_html__( "Duration", "jensan" ),
			),
			array(
				"id" => $prefix . "rating",
				"type" => "text",
				"name" => esc_html__( "Rating", "jensan" ),
			),
			array(
				"id" => "statistics",
				"type" => "heading",
				"name" => esc_html__( "Statistics", "jensan" ),
			),
			array(
				"id" => $prefix . "score",
				"type" => "text",
				"name" => esc_html__( "Score", "jensan" ),
			),
			array(
				"id" => $prefix . "ranked",
				"type" => "text",
				"name" => esc_html__( "Ranked", "jensan" ),
			),
			array(
				"id" => $prefix . "popularity",
				"type" => "text",
				"name" => esc_html__( "Popularity", "jensan" ),
			),
			array(
				"id" => "linkdl",
				"type" => "heading",
				"name" => esc_html__( "Link Download", "jensan" ),
			),
			array(
				'id' => $prefix . 'link',
				'type' => 'fieldset_text',
				'name' => esc_html__( 'Link Download', 'jensan' ),
				'desc' => esc_html__( 'Link Download', 'jensan' ),
				'rows' => 2,
				'options' => array(
					'Episode' => 'Episode = Eps berapa, Batch = Batch, Movie = Movie',
					'720p' => '720p',
					'480p' => '480p',
					'360p' => '360p',
					'240p' => '240p',
				),
				'clone' => true,
				'add_button' => esc_html__( 'Next Eps', 'jensan' ),
				'attributes' => array(
					'Movie' => 'Movie',
				),
			),
		),
	);

	return $meta_boxes;
}

function MyAnimeList_API_Meta_Box($post){
?>
<div class="rwmb-meta-box">
	<div class="rwmb-field rwmb-text-wrapper">
		<div class="rwmb-label">
			<label for="jensan-myanimelist-api">MyAnimeList API</label>
		</div>
		<div class="rwmb-input ui-shortable">
			<div class="rwmb-clone rwmb-text-clone">
				<input size="30" type="text" id="jensan-myanimelist-api" class="rwmb-text " name="jensan-myanimelist-api"/>
			</div>
			<a class="button-primary" id="jensan-myanimelist-api-generate">Generate</a>
		</div>
	</div>
</div>
<?php
}

function CukStudio_Setup(){
    add_action("add_meta_boxes", "MyAnimeList_API_Add_Meta_Box");
    add_filter('rwmb_meta_boxes', 'jensan_meta_box' );
    add_action("admin_enqueue_scripts", "CukStudio_MyAnimeList_API");
	add_theme_support("post-thumbnails");
	add_theme_support("title-tag");
}
add_action("after_setup_theme", "CukStudio_Setup");