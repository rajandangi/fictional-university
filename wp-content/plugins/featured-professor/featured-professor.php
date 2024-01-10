<?php

/*
  Plugin Name: Featured Professor Block Type
  Version: 1.0
  Author: Rajan Dangi
  Author URI: https://www.rajan.com.np
*/

if (!defined('ABSPATH'))
  exit; // Exit if accessed directly

// Include files from inc folder
require_once plugin_dir_path(__FILE__) . '/inc/generateProfessorHTML.php';

class FeaturedProfessor
{
  function __construct()
  {
    add_action('init', [$this, 'onInit']);
  }

  function onInit()
  {
    wp_register_script('featuredProfessorScript', plugin_dir_url(__FILE__) . 'build/index.js', array('wp-blocks', 'wp-i18n', 'wp-editor'));
    wp_register_style('featuredProfessorStyle', plugin_dir_url(__FILE__) . 'build/index.css');

    register_block_type(
      'ourplugin/featured-professor',
      array(
        'render_callback' => [$this, 'renderCallback'],
        'editor_script' => 'featuredProfessorScript',
        'editor_style' => 'featuredProfessorStyle'
      )
    );
  }

  function renderCallback($attributes)
  {
    if ($attributes['profID']) {
      wp_enqueue_style('featuredProfessorStyle');
      return generateProfessorHTML($attributes['profID']);
    }
    return null;
  }

}

$featuredProfessor = new FeaturedProfessor();