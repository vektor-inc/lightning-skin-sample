<?php
/**
 * Plugin Name:     Lightning Skin Sample
 * Plugin URI:      http://lightning.nagoya/ja/
 * Description:
 * Author:          Vektor,Inc.
 * Author URI:      https://vektor-inc.co.jp
 * Text Domain:     lightning-skin-sample
 * Domain Path:     /languages
 * Version:         2.0.0
 * License:         GPLv2
 *
 * @package         Lightning_Skin_Sample
 */

/*
Copyright 2015-2018 Vektor,Inc. ( email : info@vektor-inc.co.jp )

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

$data = get_file_data( __FILE__, array( 'version' => 'Version' ) );

/*-------------------------------------------*/
/*	Require skins function
/*-------------------------------------------*/
// sample の箇所を任意の名称に変更してください
add_filter( 'lightning-design-skins', 'ltg_sample_register_skin' );
function ltg_sample_register_skin( $array ) {
	 $array['sample'] = array(
		 'label'           => 'Sample',
		 'css_path'        => plugin_dir_url( __FILE__ ) . 'css/style.css',
		 'editor_css_path' => plugin_dir_url( __FILE__ ) . 'css/editor.css',
		 'js_path'         => plugin_dir_url( __FILE__ ) . 'js/common.min.js',
		 // スキン固有のPHPファイルを読み込む場合
		 // 'php_path'        => plugin_dir_path( __FILE__ ) . 'skin-active.php',
		 // スキン固有のコールバック関数
		 'callback'        => 'ltg_sample_current_function',
		 'version'         => $data['version'],
	 );
	return $array;
}

// スキン固有のコールバック関数
function ltg_sample_current_function() {
	load_plugin_textdomain( 'lightning-skin-sample', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
