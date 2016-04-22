<?php

add_action('wp_enqueue_scripts', 'ltg_sk_sample_set_script');


function ltg_sk_sample_set_script(){
    wp_enqueue_style( 'lightning-sample-style', plugins_url( '/css/style.css', __FILE__ ), array(), '20150918a' );
}
