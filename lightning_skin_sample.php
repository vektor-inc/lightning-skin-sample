<?php
/*
Plugin Name: Lightning Skin Sample
Plugin URI: http://lightning.vektor-inc.co.jp
Description:
Version: 1.0.0
Author: Vektor,Inc.
Author URI: http://vektor-inc.co.jp
License: GPL2
Domain Path: /languages
*/
/*
Copyright 2015 Vektor,Inc. ( email : info@vektor-inc.co.jp )

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

load_plugin_textdomain( 'lightning_skin_sample', false, dirname( plugin_basename( __FILE__ ) ). '/languages' );


add_filter( 'lightning_Design_skins', 'lightning_Register_skin' );
function lightning_Register_skin( $array ){
 $array['test'] = array(
	 'name'     => 'テストスキン',
	 'callback' => 'ltg_sk_sample_current_function',
	 'disable_css' => true,
 );
 return $array;
}

function ltg_sk_sample_current_function(){
	require_once( plugin_dir_path( __FILE__ ) . '/active.php' );
}