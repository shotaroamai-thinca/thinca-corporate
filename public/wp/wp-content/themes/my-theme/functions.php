<?php
/* --------------------------------------------------------------------------------
 * 
 * IAML ライブラリー
 * functions.php Ver.1.0
 * 
-------------------------------------------------------------------------------- */

/* --------------------------------------------------------------------------------
my_global_navigation
-------------------------------------------------------------------------------- */

function my_global_navigation( $id ) {
	global $post;
	global $wp_query;
	$menu_items = wp_get_nav_menu_items($id);
	$current_id = $wp_query->queried_object_id;

	// 最上の親ページのスラッグを取得
	$parent = $post->ancestors;
	if ( !empty($parent) ) {
		$parent_id = $post->ancestors[count($post->ancestors) - 1];
		$parent_slug = get_post($parent_id)->post_name;
	}

	foreach ($menu_items as $menu):
		$menu_id = $menu->object_id;
		$classes = $menu->classes;
		$post_type = get_post_type();
		$current = '';
		$target = '';

		if ( $menu_id == $current_id ){
			$current = ' class="current"';
		}

		// 新規ウィンドウで開く設定
		if ( $menu->target == '_blank' ) {
			$target = ' target="_blank"';
		}

		// 投稿の現在位置表示
		if ( $classes[0] == 'news' && $post_type == 'news' ){
			$current = ' class="current"';
		}
		if ( $classes[0] == 'ir' && $post_type == 'irnews' ){
			$current = ' class="current"';
		}
		if ( $classes[0] == 'ir' && $post_type == 'summary' ){
			$current = ' class="current"';
		}
		if ( $classes[0] == 'ir' && $post_type == 'securities' ){
			$current = ' class="current"';
		}
		if ( $classes[0] == 'ir' && $post_type == 'briefing' ){
			$current = ' class="current"';
		}
		if ( $classes[0] == 'ir' && $post_type == 'irmovie' ){
			$current = ' class="current"';
		}
		if ( $classes[0] == 'ir' && $post_type == 'internal' ){
			$current = ' class="current"';
		}
		if ( $classes[0] == 'ir' && $post_type == 'business' ){
			$current = ' class="current"';
		}
		if ( $classes[0] == 'ir' && $post_type == 'irreport' ){
			$current = ' class="current"';
		}
		if ( $classes[0] == 'recruit' && $post_type == 'interview' ){
			$current = ' class="current"';
		}

		// 小ページの現在位置表示
		if ( $classes[0] == 'about' && $parent_slug == 'about' ){
			$current = ' class="current"';
		}
		if ( $classes[0] == 'ir' && $parent_slug == 'ir' ){
			$current = ' class="current"';
		}
		if ( $classes[0] == 'recruit' && $parent_slug == 'recruit' ){
			$current = ' class="current"';
		}

		$item_output .= '<li' . $current . '><a href="' . $menu->url . '"' . $target . '>';
		$item_output .= '<div class="link-title">' . $menu->title . '</div>';
		$item_output .= '</a></li>';

	endforeach;
	return $item_output;
}


/* --------------------------------------------------------------------------------
my_local_navigation
-------------------------------------------------------------------------------- */
function is_parent_slug() {
    global $post;
    if ($post->post_parent) {
        $post_data = get_post($post->post_parent);
        return $post_data->post_name;
    }
}
function my_local_navigation( $id, $imgonoff = 0 ) {
	global $wp_query;
	$menu_items = wp_get_nav_menu_items($id);
	$current_id = $wp_query->queried_object_id;


	foreach ($menu_items as $menu):
		$menu_id = $menu->object_id;
		$classes = $menu->classes;
		$post_type = get_post_type();
		$img = get_field('local_navigation_img', $menu);
		$current = '';

		if ( $menu_id == $current_id ){
			$current = ' class="current"';
		}

		// 第4階層
		if ( $classes[0] == 'management' && is_parent_slug() == 'management' ){
			$current = ' class="current"';
		}
		if ( $classes[0] == 'library' && is_parent_slug() == 'library' ){
			$current = ' class="current"';
		}
		if ( $classes[0] == 'stock' && is_parent_slug() == 'stock' ){
			$current = ' class="current"';
		}

		// 投稿の現在位置表示
		if ( $classes[0] == 'irnews' && $post_type == 'irnews' ){
			$current = ' class="current"';
		}
		if ( $classes[0] == 'library' && $post_type == 'summary' ){
			$current = ' class="current"';
		}
		if ( $classes[0] == 'library' && $post_type == 'securities' ){
			$current = ' class="current"';
		}
		if ( $classes[0] == 'library' && $post_type == 'briefing' ){
			$current = ' class="current"';
		}
		if ( $classes[0] == 'library' && $post_type == 'irmovie' ){
			$current = ' class="current"';
		}
		if ( $classes[0] == 'library' && $post_type == 'internal' ){
			$current = ' class="current"';
		}
		if ( $classes[0] == 'library' && $post_type == 'business' ){
			$current = ' class="current"';
		}
		if ( $classes[0] == 'library' && $post_type == 'irreport' ){
			$current = ' class="current"';
		}
		if ( $classes[0] == 'interview' && $post_type == 'interview' ){
			$current = ' class="current"';
		}

		$item_output .= '<li' . $current . '><a href="' . $menu->url . '">';

		if ( $img && $imgonoff == 1 ){
			$item_output .= '<div class="link-photo"><img src="' . $img . '" alt=""></div>';
		}

		$item_output .= '<div class="link-title">' . $menu->title . '</div>';

		if ( $menu->description ){
			$item_output .= '<div class="description">' . $menu->description . '</div>';
		}

		$item_output .= '</a></li>';

	endforeach;
	return $item_output;
}


/* --------------------------------------------------------------------------------
ACFのカスタムブロック
-------------------------------------------------------------------------------- */
// https://www.advancedcustomfields.com/resources/acf_register_block_type/

add_action('acf/init', 'my_acf_blocks_init');
function my_acf_blocks_init() {
	if( function_exists('acf_register_block_type') ) {

		acf_register_block_type(array(
			'name'				=> 'link_list',
			'title'				=> __('★ リンクリスト'),
			'description'		=> __('リンク一覧を掲載できます。'),
			'category'			=> 'formatting',
			'icon'				=> 'star-filled',
			'mode'				=> 'edit',
			'render_template'	=> plugin_dir_path( __FILE__ ) . 'template-parts/navigation/link-list.php',
		));

		acf_register_block_type(array(
			'name'				=> 'block_schedule',
			'title'				=> __('★ 1日の流れ'),
			'description'		=> __('時間とタスクを記載し、一日の流れを説明できます。'),
			'category'			=> 'formatting',
			'icon'				=> 'star-filled',
			'mode'				=> 'edit',
			'render_template'	=> plugin_dir_path( __FILE__ ) . 'template-parts/blocks/block_schedule/block_schedule.php',
		));

/*
		acf_register_block_type(array(
			'name'				=> 'block_abc',
			'title'				=> __('★ ブロック名'),
			'description'		=> __('概要文が入ります。'),
			'category'			=> 'formatting',
			'icon'				=> 'star-filled',
			'mode'				=> 'edit',
			'render_template'	=> plugin_dir_path( __FILE__ ) . 'template-parts/blocks/block_abc/block_abc.php',
		));
*/

	}
}


/* --------------------------------------------------------------------------------
カスタムメニューの定義
-------------------------------------------------------------------------------- */

register_nav_menus( array(
	'global' => 'global',
	'footer_1' => 'footer_1',
	'footer_2' => 'footer_2',
	'footer_3' => 'footer_3',
	'footer_4' => 'footer_4',
	'footer_5' => 'footer_5',
	'local_ir' => 'local_ir',
	'local_about' => 'local_about',
	'local_recruit' => 'local_recruit',
) );


/* --------------------------------------------------------------------------------
管理画面のカスタム投稿の並び順を日付順に変更	
-------------------------------------------------------------------------------- */

function ag_custom_post_type_order($wp_query) {
	if( is_admin() ) {
		$post_type = $wp_query->query['post_type'];
		switch ($post_type) {
			case 'news':
			case 'irnews':
			case 'summary':
			case 'securities':
			case 'briefing':
			case 'irmovie':
			case 'internal':
			case 'business':
			case 'irreport':
			case 'interview':
				$wp_query->set('orderby','date'); //ソートの基準を設定：日付の場合は date
				$wp_query->set('order','DESC');   //ASC Or DESC で昇順・降順を設定
				break;
		}
	}
}
add_filter('pre_get_posts', 'ag_custom_post_type_order');


/* --------------------------------------------------------------------------------
文字色のカラーパレット
-------------------------------------------------------------------------------- */

add_theme_support( 'editor-color-palette', array(
	array(
		'name'  => __( 'コーポレートカラー', 'genesis-sample' ),
		'slug'  => 'corporate',
		'color'  => '#CC2926',
	),
	array(
		'name'  => __( 'ピンク', 'genesis-sample' ),
		'slug'  => 'pink',
		'color'  => '#f78da7',
	),
	array(
		'name'  => __( 'レッド', 'genesis-sample' ),
		'slug'  => 'red',
		'color' => '#cf2e2e',
	),
	array(
		'name'  => __( 'オレンジ', 'genesis-sample' ),
		'slug'  => 'orange',
		'color' => '#ff6900',
	),
	array(
		'name'  => __( '琥珀', 'genesis-sample' ),
		'slug'  => 'amber',
		'color' => '#fcb900',
	),
	array(
		'name'  => __( '薄いグリーンシアン', 'genesis-sample' ),
		'slug'  => 'light-green-cyan',
		'color' => '#7bdcb5',
	),
	array(
		'name'  => __( '鮮やかなグリーンシアン', 'genesis-sample' ),
		'slug'  => 'vivid-green-cyan',
		'color' => '#00d084',
	),
	array(
		'name'  => __( '淡いシアンブルー', 'genesis-sample' ),
		'slug'  => 'pale-cyan-blue',
		'color' => '#8ed1fc',
	),
	array(
		'name'  => __( '鮮やかなシアンブルー', 'genesis-sample' ),
		'slug'  => 'vivid-cyan-blue',
		'color' => '#0693e3',
	),
	array(
		'name'  => __( 'ライト・グレー', 'genesis-sample' ),
		'slug'  => 'light-gray',
		'color' => '#eeeeee',
	),
	array(
		'name'  => __( 'シアンブルーグレー', 'genesis-sample' ),
		'slug'  => 'cyan-blue-gray',
		'color' => '#abb8c3',
	),
	array(
		'name'  => __( '濃灰', 'genesis-sample' ),
		'slug'  => 'dark-gray',
		'color' => '#313131',
	),
) );


/* --------------------------------------------------------------------------------
ページネーション
-------------------------------------------------------------------------------- */

function my_the_posts_pagination() {
	the_posts_pagination( array(
		'prev_text' => '<svg><use xlink:href="#arrow-left"></use></svg><span class="sp-text">前へ</span>',
		'next_text' => '<span class="sp-text">次へ</span><svg><use xlink:href="#arrow-right"></use></svg>',
	) );
}

function my_the_post_navigation() {
	the_post_navigation( array(
		'prev_text' => '<svg><use xlink:href="#arrow-left"></use></svg>前の記事 ： ' . '%title',
		'next_text' => '次の記事 ： %title' . '<svg><use xlink:href="#arrow-right"></use></svg>',
	) );
}


/* --------------------------------------------------------------------------------
ウィジェットの定義
-------------------------------------------------------------------------------- */

function my_widgets_init() {
	register_sidebar( array(
		'name' => 'Main Widget',
		'id' => 'main-widget',
		'before_widget' => '<div id="%1$s" class="widget">',
		'after_widget' => '</div><!-- .widget -->',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2><!-- .widget-title -->',
	) );
}
add_action( 'widgets_init', 'my_widgets_init' );


/* --------------------------------------------------------------------------------
カスタム投稿の表示件数変更
-------------------------------------------------------------------------------- */

function hwl_home_pagesize( $query ) {
	if ( is_post_type_archive( 'function' ) ) { // カスタム投稿のスラッグを引数に入れる
		$query->set( 'posts_per_page', 20 );
		return;
	}
}
add_action( 'pre_get_posts', 'hwl_home_pagesize', 1 );


/* --------------------------------------------------------------------------------
options_pageの設定
-------------------------------------------------------------------------------- */

if( function_exists('acf_add_options_page') ) {
 
	acf_add_options_page( array(
		'page_title' 	=> 'グローバル項目',
		'menu_title'	=> 'グローバル項目',
		'menu_slug' 	=> 'menue_global',
		'capability'	=> 'edit_posts',
		'parent_slug'	=> '',
		'position'	=> false,
		'redirect'	=> false,
	) );

}


/* --------------------------------------------------------------------------------
アイキャッチ画像を有効化
-------------------------------------------------------------------------------- */

add_theme_support( 'post-thumbnails' );


/* --------------------------------------------------------------------------------
抜粋を有効化
-------------------------------------------------------------------------------- */

add_post_type_support('page','excerpt');

function my_excerpt_length($length) {
	return 180;
}
add_filter('excerpt_mblength', 'my_excerpt_length');

function my_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'my_excerpt_more');


/* --------------------------------------------------------------------------------
タイトルタグの出力
-------------------------------------------------------------------------------- */

add_theme_support('title-tag');


/* --------------------------------------------------------------------------------
管理バーの削除
-------------------------------------------------------------------------------- */

// add_filter( 'show_admin_bar', '__return_false' );


/* --------------------------------------------------------------------------------
投稿した画像を<p>タグで囲ませない
-------------------------------------------------------------------------------- */

function filter_ptags_on_images($content){
return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');

/* --------------------------------------------------------------------------------
the_archive_title 余計な文字を削除
-------------------------------------------------------------------------------- */

add_filter( 'get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('',false);
    } elseif (is_tag()) {
        $title = single_tag_title('',false);
	} elseif (is_tax()) {
	    $title = single_term_title('',false);
	} elseif (is_post_type_archive() ){
		$title = post_type_archive_title('',false);
	} elseif (is_date()) {
	    $title = get_the_time('Y年n月');
	} elseif (is_search()) {
	    $title = '検索結果：'.esc_html( get_search_query(false) );
	} elseif (is_404()) {
	    $title = '「404」ページが見つかりません';
	} else {

	}
    return $title;
});


/* --------------------------------------------------------------------------------
公開日と更新日
-------------------------------------------------------------------------------- */

function get_mtime($format) {
	$mtime = get_the_modified_time('Ymd');
	$ptime = get_the_time('Ymd');
	if ($ptime > $mtime) {
		return get_the_time($format);
	} elseif ($ptime === $mtime) {
		return null;
	} else {
		return get_the_modified_time($format);
	}
}


/* --------------------------------------------------------------------------------
管理画面のメニュー位置の変更
-------------------------------------------------------------------------------- */

function customize_menus(){
global $menu;
$menu[55] = $menu[25];  //コメントの移動
unset($menu[25]);
}
add_action( 'admin_menu', 'customize_menus' );


/* --------------------------------------------------------------------------------
フォームの添付ファイル
-------------------------------------------------------------------------------- */

function svgz_mime_types( $mimes ) {
        $mimes['svgz'] = 'application/pdf';
        return $mimes;
}
add_filter( 'upload_mimes', 'svgz_mime_types' );


/* --------------------------------------------------------------------------------
不要なCSSを削除
-------------------------------------------------------------------------------- */

function my_enqueue_style() {
	wp_dequeue_style( 'wp-block-library' );
}
// add_action( 'wp_enqueue_scripts', 'my_enqueue_style' );


/* --------------------------------------------------------------------------------
電子公告（IR / Notice）の管理用
- 管理画面サイドバーに「電子公告」メニューを追加（ACF Options Page）
- リピーターで「日付・タイトル・ファイル」を1行ずつ管理
-------------------------------------------------------------------------------- */

if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page( array(
		'page_title'  => '電子公告',
		'menu_title'  => '電子公告',
		'menu_slug'   => 'ir-notice',
		'capability'  => 'edit_posts',
		'parent_slug' => '',
		'position'    => 30,
		'icon_url'    => 'dashicons-megaphone',
		'redirect'    => false,
		'updated_message' => '電子公告を更新しました。',
	) );
}

if ( function_exists( 'acf_add_local_field_group' ) ) {
	acf_add_local_field_group( array(
		'key'        => 'group_ir_notice',
		'title'      => '電子公告',
		'fields'     => array(
			array(
				'key'           => 'field_ir_notice_list',
				'label'         => '電子公告リスト',
				'name'          => 'notice_list',
				'type'          => 'repeater',
				'instructions'  => '電子公告として /ir/notice/ ページに掲載する項目を追加してください。1行ごとに「日付」「タイトル」「ファイル」を設定します。並び順はドラッグで変更できます。',
				'required'      => 0,
				'min'           => 0,
				'max'           => 0,
				'layout'        => 'block',
				'button_label'  => '電子公告を追加',
				'sub_fields'    => array(
					array(
						'key'            => 'field_ir_notice_date',
						'label'          => '日付',
						'name'           => 'date',
						'type'           => 'date_picker',
						'required'       => 1,
						'display_format' => 'Y/n/j',
						'return_format'  => 'Y-m-d',
						'first_day'      => 0,
						'wrapper'        => array( 'width' => '20' ),
					),
					array(
						'key'         => 'field_ir_notice_title',
						'label'       => 'タイトル',
						'name'        => 'title',
						'type'        => 'text',
						'required'    => 1,
						'wrapper'     => array( 'width' => '50' ),
					),
					array(
						'key'           => 'field_ir_notice_file',
						'label'         => 'ファイル',
						'name'          => 'file',
						'type'          => 'file',
						'required'      => 1,
						'return_format' => 'array',
						'library'       => 'all',
						'wrapper'       => array( 'width' => '30' ),
					),
					array(
						'key'            => 'field_ir_notice_publish_start',
						'label'          => '公開開始日時',
						'name'           => 'publish_start',
						'type'           => 'date_time_picker',
						'instructions'   => '公開を開始する日時。未入力の場合はすぐに公開されます。',
						'required'       => 0,
						'display_format' => 'Y/n/j H:i',
						'return_format'  => 'Y-m-d H:i:s',
						'first_day'      => 0,
						'wrapper'        => array( 'width' => '50' ),
					),
					array(
						'key'            => 'field_ir_notice_publish_end',
						'label'          => '公開終了日時',
						'name'           => 'publish_end',
						'type'           => 'date_time_picker',
						'instructions'   => '公開を終了する日時。この日時を過ぎるとフロントから自動で非表示になります。未入力の場合は無期限で公開されます。',
						'required'       => 0,
						'display_format' => 'Y/n/j H:i',
						'return_format'  => 'Y-m-d H:i:s',
						'first_day'      => 0,
						'wrapper'        => array( 'width' => '50' ),
					),
				),
			),
		),
		'location'   => array(
			array(
				array(
					'param'    => 'options_page',
					'operator' => '==',
					'value'    => 'ir-notice',
				),
			),
		),
		'menu_order' => 0,
		'position'   => 'normal',
		'style'      => 'default',
	) );
}

/* --------------------------------------------------------------------------------
ファイルサイズを人間が読める形式に変換（例: 200KB / 1.5MB）
-------------------------------------------------------------------------------- */

function my_format_filesize( $bytes ) {
	if ( ! is_numeric( $bytes ) || $bytes <= 0 ) {
		return '';
	}
	$units = array( 'B', 'KB', 'MB', 'GB', 'TB' );
	$exp   = (int) min( floor( log( $bytes, 1024 ) ), count( $units ) - 1 );
	$size  = $bytes / pow( 1024, $exp );

	if ( $exp === 0 ) {
		return $size . $units[ $exp ];
	} elseif ( $size >= 100 ) {
		return round( $size ) . $units[ $exp ];
	} else {
		return number_format( $size, 1, '.', '' ) . $units[ $exp ];
	}
}


/* --------------------------------------------------------------------------------
カスタム投稿タイプnewsをREST APIで公開
-------------------------------------------------------------------------------- */
// 方法1: カスタム投稿タイプ登録時にフック（推奨）
add_filter('register_post_type_args', function($args, $post_type) {
	if ($post_type === 'news') {
		$args['show_in_rest'] = true;
		$args['rest_base'] = 'news';
		$args['rest_controller_class'] = 'WP_REST_Posts_Controller';
	}
	return $args;
}, 10, 2);

// 方法2: REST API初期化時にも設定（フォールバック・既存登録済みの場合に対応）
add_action('rest_api_init', function() {
	global $wp_post_types;
	if (isset($wp_post_types['news']) && !$wp_post_types['news']->show_in_rest) {
		$wp_post_types['news']->show_in_rest = true;
		$wp_post_types['news']->rest_base = 'news';
		$wp_post_types['news']->rest_controller_class = 'WP_REST_Posts_Controller';
	}
}, 20);
