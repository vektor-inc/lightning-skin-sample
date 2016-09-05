<?php
/*-------------------------------------------*/
/*	Load Design Skin Css
/*-------------------------------------------*/
add_action('wp_enqueue_scripts', 'sample_lightning_skin_set_script');
function sample_lightning_skin_set_script(){
 	// !! Please rewrite the part of the [SKIN_NAME] to your design skin name.
	// !! Don't Change wp_enqueue_style name 'lightning-design-style'
	wp_enqueue_style( 'lightning-design-style', plugins_url( '/css/style.css', __FILE__ ), array(), SKIN_NAME_VERSION );
}
/*-------------------------------------------*/
/*	Load Editor Css
/*-------------------------------------------*/
add_editor_style( plugins_url( '/css/editor.css', __FILE__ ) );

/*-------------------------------------------*/
/*	Print head color sty
/*-------------------------------------------*/
// !! Please rewrite the part of the [sample] to your design skin name.
add_action( 'wp_head','sample_lightning_print_css', 160);
function sample_lightning_print_css(){
	$options = get_option('lightning_theme_options');
	if ( isset($options['color_key']) && isset($options['color_key_dark']) ) {
	$color_key = esc_html($options['color_key']);
	$color_key_dark = esc_html($options['color_key_dark']);
	?>
<style type="text/css">
a { color:<?php echo $color_key;?>; }
a:hover { color:<?php echo $color_key_dark;?>; }
</style>
<?php } // if ( isset($options['color_key'] && isset($options['color_key_dark'] ) {
}

/*-------------------------------------------*/
/*	Your design skin Specific functions
/*-------------------------------------------*/
