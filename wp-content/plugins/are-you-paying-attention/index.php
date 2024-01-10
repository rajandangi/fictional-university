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
        add_action('init', array($this, 'adminAssets'));
    }


    function adminAssets()
    {
        $asset_file = include plugin_dir_path(__FILE__) . 'build/index.asset.php';

        wp_register_style(
            'quizeditcss',
            plugins_url('build/index.css', __FILE__),
            array(),
            $asset_file['version']
        );

        wp_register_script(
            'ournewblocktype',
            plugin_dir_url(__FILE__) . 'build/index.js',
            array('wp-blocks', 'wp-element', 'wp-editor')
        ); // We'll use this script to register new block type later.

        register_block_type(
            'ourplugin/are-you-paying-attention',
            array(
                'editor_script' => 'ournewblocktype',
                'editor_style' => 'quizeditcss',
                'render_callback' => array($this, 'theHTML')
            )
        );
    }

    function theHTML($attributes)
    {
        // Only load js and css on the frontend if the block is present
        if (!is_admin()) {
            wp_enqueue_script('attentionFrontend', plugin_dir_url(__FILE__) . 'build/frontend.js', array('wp-element'), '1.0', true);
            wp_enqueue_style('attentionFrontendStyles', plugin_dir_url(__FILE__) . 'build/frontend.css', array(), '1.0');
        }

        ob_start(); ?>
        <div class="paying-attention-update-me">
            <pre style="display:none"> <?php echo wp_json_encode($attributes) ?></pre>
        </div>
        <?php
        return ob_get_clean();
    }
}
$areyoupayingattention = new AreYouPayingAttention();