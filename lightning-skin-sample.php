<?php
/**
 * Plugin Name:     Lightning Skin Sample
 * Plugin URI:      http://lightning.nagoya/ja/
 * Description:
 * Author:          Vektor,Inc.
 * Author URI:      https://vektor-inc.co.jp
 * Text Domain:     lightning-skin-sample
 * Domain Path:     /languages
 * Version:         3.0.1
 * License:         GPLv2
 *
 * @package         Lightning_Skin_Sample
 */

/*
Copyright 2015-2019 Vektor,Inc. ( email : info@vektor-inc.co.jp )

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


/*
  Require skins function
-------------------------------------------*/
// sample の箇所を任意の名称に変更してください
add_filter( 'lightning-design-skins', 'ltg_sample_register_skin' );
function ltg_sample_register_skin( $array ) {
	$data = get_file_data( __FILE__, array( 'version' => 'Version' ) );

	// スキン識別用名称
	$array['sample'] = array(

		// プルダウンへの表示名
		'label'           => 'テストスキン',

		// CSSのURL
		'css_path'        => plugin_dir_url( __FILE__ ) . 'assets/css/style.css',

		// 後読み込みCSSのURL
		'css_late_path'   => plugin_dir_url( __FILE__ ) . 'assets/css/style_late.css',

		// 編集画面用のCSSのURL（指定しない場合はコメントアウトまたは削除でかまいません）
		'editor_css_path' => plugin_dir_url( __FILE__ ) . 'assets/css/editor.css',

		// 編集画面用（Gutenberg）のCSSのURL
		// 'gutenberg_css_path' => plugin_dir_url( __FILE__ ) . 'assets/css/editor-gutenberg.css',

		// javascript のURL（指定しない場合はコメントアウトまたは削除でかまいません）
		// 'js_path'        => plugin_dir_url( __FILE__ ) . 'assets/js/common.min.js',

		// スキン固有のPHPファイルを読み込む場合のPHPファイルのサーバーパス（指定しない場合はコメントアウトまたは削除でかまいません）
		'php_path'        => plugin_dir_path( __FILE__ ) . 'skin-active.php',

		// スキン固有のコールバック関数（指定しない場合はコメントアウトまたは削除でかまいません）
		'callback'        => 'ltg_sample_current_function',

		// デザインスキンのバージョン
		'version'         => $data['version'],
		'bootstrap'       => 'bs4',
	);
	return $array;
}

// スキン固有のコールバック関数
function ltg_sample_current_function() {
	load_plugin_textdomain( 'lightning-skin-sample', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
