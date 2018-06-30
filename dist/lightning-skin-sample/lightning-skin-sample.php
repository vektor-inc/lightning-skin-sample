<?php
/*
Plugin Name: Lightning Skin Sample
Plugin URI: http://lightning.vektor-inc.co.jp
Description:
Version: 2.0.0
Author: Vektor,Inc.
Author URI: https://vektor-inc.co.jp
License: GPL2
Domain Path: /languages
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
// // !! Please rewrite the part of the [SKIN_NAME] to your design skin name.
define( 'SKIN_NAME_VERSION', $data['version'] );

load_plugin_textdomain( 'sample_lightning_skin', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

add_filter( 'lightning_design_skins', 'sample_lightning_register_skin' );
function sample_lightning_register_skin( $array ) {
	$array['sample'] = array(
		'name'        => 'Sample Skin',                            // Skin Name
		'callback'    => 'sample_lightning_skin_current_function', // Require skins function name
		'disable_css' => true,                                  // kill default design(origin) style
	 // 'customizer' => 'customizer_function_sample'
	);
	return $array;
}

/*-------------------------------------------*/
/*	Require skins function
/*-------------------------------------------*/
// !! Please rewrite the part of the [sample] to your design skin name.
function sample_lightning_skin_current_function() {
	require_once( plugin_dir_path( __FILE__ ) . '/active.php' );
}








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
		 // 'callback'        => 'ltg_sample_current_function',
		 'version'         => $data['version'],
	 );
	return $array;
}

// スキン固有のコールバック関数
function ltg_sample_current_function() {

}
