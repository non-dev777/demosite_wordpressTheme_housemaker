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

/* ----------------------------------------------------------------
 * SEO関連の設定
 * ----------------------------------------------------------------
 */
// タイトルタグのカスタマイズ
function custom_title_separator($sep) {
    return '|';
}
add_filter('document_title_separator', 'custom_title_separator');

// メタディスクリプションの設定
function add_meta_description() {
    global $post;
    $description = '';

    if (is_singular()) {
        // カスタムフィールドからディスクリプションを取得
        $custom_description = get_post_meta($post->ID, 'meta_description', true);
        
        if ($custom_description) {
            $description = $custom_description;
        } elseif (has_excerpt()) {
            $description = get_the_excerpt();
        } else {
            // 本文から改行を除去して120文字を取得
            $content = wp_strip_all_tags($post->post_content);
            $content = str_replace(array("\r", "\n", "\t"), '', $content);
            $description = mb_substr($content, 0, 120) . '...';
        }
    } elseif (is_home() || is_front_page()) {
        $description = get_bloginfo('description');
    } elseif (is_category()) {
        $description = category_description();
    } elseif (is_tag()) {
        $description = tag_description();
    }

    if ($description) {
        echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
    }
}
add_action('wp_head', 'add_meta_description', 1);

/* ----------------------------------------------------------------
 * カスタムタイトル設定
 * ----------------------------------------------------------------
 */
// 投稿画面にカスタムタイトル用のカスタムフィールドを追加
function add_custom_title_field() {
    add_meta_box(
        'custom_title_field',
        'カスタムタイトル',
        'custom_title_field_callback',
        ['post', 'page', 'works'],
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'add_custom_title_field');

function custom_title_field_callback($post) {
    $custom_title = get_post_meta($post->ID, 'custom_title', true);
    wp_nonce_field('custom_title_nonce', 'custom_title_nonce');
    ?>
    <p>
        <input type="text" name="custom_title" id="custom_title" value="<?php echo esc_attr($custom_title); ?>" style="width: 100%;">
        <span class="description">※空白の場合、デフォルトのタイトルが使用されます。サイト名は自動的に追加されます。</span>
    </p>
    <?php
}

function save_custom_title($post_id) {
    if (!isset($_POST['custom_title_nonce']) || !wp_verify_nonce($_POST['custom_title_nonce'], 'custom_title_nonce')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (isset($_POST['custom_title'])) {
        update_post_meta($post_id, 'custom_title', sanitize_text_field($_POST['custom_title']));
    }
}
add_action('save_post', 'save_custom_title');

// タイトルのカスタマイズ
function custom_document_title_parts($title) {
    if (is_singular(['post', 'page', 'works'])) {
        $custom_title = get_post_meta(get_the_ID(), 'custom_title', true);
        if ($custom_title) {
            $title['title'] = $custom_title;
        }
    }
    return $title;
}
add_filter('document_title_parts', 'custom_document_title_parts');

// 投稿画面にメタディスクリプション用のカスタムフィールドを追加
function add_meta_description_field() {
    add_meta_box(
        'meta_description_field',
        'メタディスクリプション',
        'meta_description_field_callback',
        ['post', 'page', 'works'],
        'normal',
        'low'
    );
}
add_action('add_meta_boxes', 'add_meta_description_field');

function meta_description_field_callback($post) {
    $meta_description = get_post_meta($post->ID, 'meta_description', true);
    wp_nonce_field('meta_description_nonce', 'meta_description_nonce');
    ?>
    <p>
        <textarea name="meta_description" id="meta_description" rows="4" style="width: 100%;"><?php echo esc_textarea($meta_description); ?></textarea>
        <span class="description">※120文字程度で入力してください。空白の場合、抜粋文または本文の先頭120文字が使用されます。</span>
    </p>
    <?php
}

function save_meta_description($post_id) {
    if (!isset($_POST['meta_description_nonce']) || !wp_verify_nonce($_POST['meta_description_nonce'], 'meta_description_nonce')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (isset($_POST['meta_description'])) {
        update_post_meta($post_id, 'meta_description', sanitize_text_field($_POST['meta_description']));
    }
}
add_action('save_post', 'save_meta_description');

?>