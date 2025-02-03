<?php
/* ----------------------------------------------------------------
 * 基本のセットアップ
 * ----------------------------------------------------------------
 */
function setup_my_theme() {
	//タイトルタグ
	add_theme_support('title-tag');

	//RSSフィード
	add_theme_support('automatic-feed-links');

	//メニュー
	register_nav_menus([
		'global_nav' => 'グローバルナビゲーション'
	]);
}
add_action('after_setup_theme', 'setup_my_theme');

/* ----------------------------------------------------------------
 * script / css 読み込み
 * ----------------------------------------------------------------
 */
function my_enqueue_scripts() {
	wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', array(), '5.3.0', 'all');
	wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css', array(), '5.3.0', 'all');
	wp_enqueue_style('style', get_theme_file_uri('css/style.css'), array(), '20250202', 'all');
	wp_enqueue_style('postcontent', get_theme_file_uri('css/postcontent.css'), array(), '20250202', 'all');
	wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array(), '5.3.0', true);
}
add_action('wp_enqueue_scripts', 'my_enqueue_scripts');

/* ----------------------------------------------------------------
 *	投稿一覧の表示件数を変更する
 * ----------------------------------------------------------------
 */
function change_set_post($query) {
	// 管理画面やメインクエリ以外は処理しない
	if (is_admin() || !$query->is_main_query()) {
		return;
	}

	// 投稿一覧の表示件数を変更する
	if ($query->is_post_type_archive('works')) {
		$query->set('posts_per_page', 9);
		return;
	}
}
add_action('pre_get_posts', 'change_set_post');

/**
 * エディターにカスタムスタイルを適用
 */
function add_editor_styles() {
	// エディタースタイルを追加
	add_theme_support('editor-styles');
	
	// Google Fontsの読み込み
	add_editor_style('https://fonts.googleapis.com/css2?family=Shippori+Mincho:wght@400;500;600;700;800&display=swap');
	
	// カスタムCSSの読み込み
	add_editor_style('css/postcontent.css');
}
add_action('after_setup_theme', 'add_editor_styles');

// エディターの投稿本文にpost-contentクラスを追加
function add_editor_body_class($classes) {
	$classes .= ' post-content';
	return $classes;
}
add_filter('admin_body_class', 'add_editor_body_class');

?>