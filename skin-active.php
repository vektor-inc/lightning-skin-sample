<?php
/*-------------------------------------------*/
/*	古いヘッダー固定機能をオフにする
/*-------------------------------------------*/
add_filter( 'lightning_headfix_enable', 'ltg_sample_headfix_disabel' );
function ltg_sample_headfix_disabel() {
	return false;
}

/*-------------------------------------------*/
/*	古いヘッダーの高さ可変機能をオフにする
/*-------------------------------------------*/
add_filter( 'lightning_header_height_changer_enable', 'ltg_sample_header_height_changer_disabel' );
function ltg_sample_header_height_changer_disabel() {
	return false;
}

/*-------------------------------------------*/
/*	カスタマイザーからのCSSの反映
/*-------------------------------------------*/
add_action( 'wp_head', 'ltg_sample_print_css', 3 );
function ltg_sample_print_css() {
	$options = get_option( 'lightning_theme_options' );
	if ( isset( $options['color_key'] ) && isset( $options['color_key_dark'] ) ) {
		$color_key      = esc_html( $options['color_key'] );
		$color_key_dark = esc_html( $options['color_key_dark'] );
		$dynamic_css    = '
a { color:' . $color_key_dark . ' ; }
a:hover { color:' . $color_key . ' ; }
ul.gMenu a:hover { color:' . $color_key . '; }
.page-header { background-color:' . $color_key . '; }
h1.entry-title:first-letter,
.single h1.entry-title:first-letter { color:' . $color_key . '; }
h2,
.mainSection-title { border-top-color:' . $color_key . '; }
h3:after,
.subSection-title:after { border-bottom-color:' . $color_key . ';  }
.media .media-body .media-heading a:hover { color:' . $color_key . ';  }
ul.page-numbers li span.page-numbers.current { background-color:' . $color_key . '; }
.pager li > a { border-color:' . $color_key . ';color:' . $color_key . ';}
.pager li > a:hover { background-color:' . $color_key . ';color:#fff;}
footer { border-top-color:' . $color_key . '; }
dt { border-left-color:' . $color_key . '; }
@media (min-width: 768px){
  ul.gMenu > li > a:hover:after,
  ul.gMenu > li.current-post-ancestor > a:after,
  ul.gMenu > li.current-menu-item > a:after,
  ul.gMenu > li.current-menu-parent > a:after,
  ul.gMenu > li.current-menu-ancestor > a:after,
  ul.gMenu > li.current_page_parent > a:after,
  ul.gMenu > li.current_page_ancestor > a:after { border-bottom-color: ' . $color_key . ' ; }
  ul.gMenu > li > a:hover .gMenu_description { color: ' . $color_key . ' ; }
} /* @media (min-width: 768px) */';
		// delete before after space
		$dynamic_css = trim( $dynamic_css );
		// convert tab and br to space
		$dynamic_css = preg_replace( '/[\n\r\t]/', '', $dynamic_css );
		// Change multiple spaces to single space
		$dynamic_css = preg_replace( '/\s(?=\s)/', '', $dynamic_css );
		wp_add_inline_style( 'lightning-design-style', $dynamic_css );
	} // if ( isset($options['color_key'] && isset($options['color_key_dark'] ) {
}

/*-------------------------------------------*/
/*	Your design skin Specific functions
/*-------------------------------------------*/

function my_skin_lightning_header_scrolled_scripts() {
	if ( function_exists( 'wp_add_inline_script' ) ) {
		$script = "
		;(function($,document,window){
		$(document).ready(function($){
			/* Add scroll recognition class */
			$(window).scroll(function () {
				var scroll = $(this).scrollTop();
				if ($(this).scrollTop() > 160) {
					$('body').addClass('header_scrolled');
				} else {
					$('body').removeClass('header_scrolled');
				}
			});
		});
		})(jQuery,document,window);
		";
		// delete br
		$script = str_replace( PHP_EOL, '', $script );
		// delete tab
		$script = preg_replace( '/[\n\r\t]/', '', $script );
		wp_add_inline_script( 'jquery-core', $script, 'after' );
	}
}
add_action( 'wp_enqueue_scripts', 'my_skin_lightning_header_scrolled_scripts' );