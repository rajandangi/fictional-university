<?php
/*
Plugin Name: Our First Unique Plugin
Plugin URI: https://www.rajandangi.com.np
Description: This is our first unique plugin
Author: Rajan Dangi
Version: 1.0
Author URI: https://www.rajandangi.com.np
*/
class WordCountAndTimePlugin
{
    function __construct()
    {
        add_action('admin_menu', array($this, 'adminPage'));
        add_action('admin_init', array($this, 'settings'));
    }

    function settings()
    {
        add_settings_section('wcp_first_section', null, null, 'word-count-settings-page');
        add_settings_field('wcp_location', 'Display Location', array($this, 'locationHtml'), 'word-count-settings-page', 'wcp_first_section');
        register_setting('wordcountplugin', 'wcp_location', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    }

    function locationHtml()
    { ?>
        <select name="wcp_location">
            <option value="0" <?php selected(esc_attr(get_option('wcp_location')), 0); ?>>Beginning of Post</option>
            <option value="1" <?php selected(esc_attr(get_option('wcp_location')), 1); ?>>End of Post</option>
        </select>
    <?php }

    function adminPage()
    {
        add_options_page('Word Count Settings', 'Word Count', 'manage_options', 'word-count-settings-page', array($this, 'ourHtml'));
    }

    function ourHTML()
    { ?>
        <div class="wrap">
            <h1>Word Count Settings</h1>
            <form action="options.php" method="POST">
                <?php
                settings_fields('wordcountplugin');
                do_settings_sections('word-count-settings-page');
                submit_button();
                ?>
            </form>
        </div>
    <?php }

}
$wordCountAndTimePlugin = new WordCountAndTimePlugin();

