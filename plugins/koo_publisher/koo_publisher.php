<?php

/*
 * Plugin Name: Koo Publisher
 * Plugin URI:
 * Description: This plugin makes it easy to post content to Koo directly from your wordpress console!
 * Version: 1.0.0
 * Author: Team Koo
 * Author URI:https://www.kooapp.com/
 * Licence: 
 */

if (!defined('ABSPATH')) {
    exit;
}

class koo_publisher
{
    private $plugin_name;

    public function __construct()
    {
        require_once(dirname(__FILE__) . '/includes/koo_publisher_settings.php');
        require_once(dirname(__FILE__) . '/includes/koo_api.php');

        $this->plugin_name = plugin_basename(__FILE__);

        if (!session_id()) {
            session_start();
        }

        add_filter("plugin_action_links_$this->plugin_name", array($this, 'koo_publisher_add_action_links'));

        add_action('transition_post_status', array($this, 'koo_publisher_send_new_post'), 10, 3);

        add_action('admin_notices', array($this, 'koo_enabled_message'));

        add_action('admin_notices', array($this, 'koo_publish_message'));
    }

    public function koo_enabled_message()
    {
        global $pagenow;
        if ($pagenow == 'edit.php') {

            if ($this->koo_publisher_get_enable_status() == 'no') {
        ?>
                <div class="notice notice-warning is-dismissible">
                    <p>Koo publisher is disabled, please enable to post to Koo.</p>
                </div>
            <?php
            } else {
            ?>
                <div class="notice notice-success is-dismissible">
                    <p>Koo publisher is enabled.</p>
                </div>
            <?php
            }
        }
    }

    public function koo_publish_message()
    {
        if (array_key_exists('koo_publish_message', $_SESSION)) {
            ?>
            <div class="notice notice-success is-dismissible">
                <p><?php
                    if (isset($_SESSION['koo_publish_message']) || !empty($_SESSION['koo_publish_message'])) {
                        echo ($_SESSION['koo_publish_message'] == 'success') ? 'Successfully posted to Koo!' : 'Failed to post to Koo!';
                    }
                    ?>
                </p>
            </div>
<?php
            unset($_SESSION['koo_publish_message']);
        }
    }

    public function koo_publisher_send_new_post($new_status, $old_status, $post)
    {
        if ($this->koo_publisher_get_enable_status() == 'no')
            return;

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }
        if (wp_is_post_autosave($post)) {
            return;
        }
        if (wp_is_post_revision($post)) {
            return;
        }

        if ('publish' === $new_status && 'publish' !== $old_status && get_post_type($post) === 'post') {
            $result = $this->koo_posting($post);

            $_SESSION['koo_publish_message'] = $result;
        }
    }

    public function koo_posting($post)
    {
        $koo_api = new koo_api();
        return $koo_api->post_to_koo(
            array(
                'key' => $this->koo_publisher_get_api_key(),
                'title' => $post->post_title,
                'url' => get_permalink($post)
            )
        );
    }

    public function koo_publisher_add_action_links($links)
    {
        $setting_link = '<a href="' . admin_url('admin.php?page=koo-publisher-settings') . '">Settings</a>';
        array_push($links, $setting_link);

        return $links;
    }

    public function koo_publisher_get_api_key()
    {
        $koo_publisher_settings_options = get_option('koo_publisher_settings_option_name'); // Array of All Options
        $koo_api_key_0 = $koo_publisher_settings_options['koo_api_key_0']; // Koo API Key
        return $koo_api_key_0;
    }

    public function koo_publisher_get_enable_status()
    {
        $koo_publisher_settings_options = get_option('koo_publisher_settings_option_name'); // Array of All Options
        $enable_koo_publish_1 = $koo_publisher_settings_options['enable_koo_publish_1']; // Enable Koo Publish
        return $enable_koo_publish_1;
    }
}

$koo = new koo_publisher;
