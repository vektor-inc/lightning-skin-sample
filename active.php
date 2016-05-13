<?php
/*-------------------------------------------*/
/*	Load Design Skin Css
/*-------------------------------------------*/
add_action('wp_enqueue_scripts', 'lightning_skin_set_script_sample');
function lightning_skin_set_script_sample(){
    wp_enqueue_style( 'lightning-sample-style', plugins_url( '/css/style.css', __FILE__ ), array(), PLUGINNAME_VERSION );
}
/*-------------------------------------------*/
/*	Load Editor Css
/*-------------------------------------------*/
add_editor_style( plugins_url( '/css/editor.css', __FILE__ ) );

/*-------------------------------------------*/
/*	Print head color style
/*-------------------------------------------*/
add_action( 'wp_head','lightning_print_css_sample', 160);
function lightning_print_css_sample(){
	$options = get_option('lightning_theme_options');
	if ( isset($options['color_key']) && isset($options['color_key_dark']) ) {
	$color_key = esc_html($options['color_key']);
	$color_key_dark = esc_html($options['color_key_dark']);
	?>
<style type="text/css">
p { color:<?php echo $color_key;?>; }
p:hover { color:<?php echo $color_key_dark;?>; }
</style>
<?php } // if ( isset($options['color_key'] && isset($options['color_key_dark'] ) {
}
