<?php

// ヘッダー固定解除
add_filter( 'lightning_headfix_enable', 'ltg_sample_headfix_disabel' );
function ltg_sample_headfix_disabel() {
	return false;
}

// ヘッダーの高さ可変解除
add_filter( 'lightning_header_height_changer_enable', 'ltg_sample_header_height_changer_disabel' );
function ltg_sample_header_height_changer_disabel() {
	return false;
}
