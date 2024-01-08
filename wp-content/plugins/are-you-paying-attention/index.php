<?php
/*
Plugin Name: Are You Paying Attention Quiz
Plugin URI: https://www.rajandangi.com.np
Description: Give your readers a multiple choice question.
Author: Rajan Dangi
Version: 1.0
Author URI: https://www.rajandangi.com.np
Text Domain: aypadomain
Domain Path: /languages
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class AreYouPayingAttention
{
    function __construct()
    {
        add_action('enqueue_block_editor_assets', array($this, 'adminAssets'));
    }


    function adminAssets()
    {
        wp_enqueue_script(
            'ournewblocktype',
            plugin_dir_url(__FILE__) . 'build/index.js',
            array('wp-blocks', 'wp-element')
        );
    }
}
$areyoupayingattention = new AreYouPayingAttention();