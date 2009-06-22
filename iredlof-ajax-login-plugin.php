<?php
/*
Plugin Name: iRedlof Ajax Login
Plugin URI: http://iredlof.com/2009/04/iredlof-ajax-login-wordpress-plugin/
Description: iRedlof Ajax Login adds a Top Panel to let users login using AJAX Technology. This plugin is based on my iRedlof Inspire Theme. Checkout the toppanel demo on <a href='http://rlchandani.co.cc'>http://rlchandani.co.cc</a>. To use the plugin add the following line just after the &lt;body&gt; tag in header.php file of your current theme <strong>&lt;?php if(function_exists(updateHeader)) updateHeader(); ?&gt;</strong> .
Author: Rohit LalChandani
Version: 2.2.1
Author URI: http://iredlof.com
*/

require( dirname(__FILE__) . '/update-content.php' );
load_plugin_textdomain('iRLogin','wp-content/plugins/iredlof-ajax-login-plugin/');

function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit) {
  array_pop($words);
  //add a ... at last article when more than limit word count
  echo implode(' ', $words)."..."; } else {
  //otherwise
  echo implode(' ', $words); }
}

function scriptInstall()
{
	echo('<link rel="stylesheet" href="'.get_bloginfo('wpurl').'/'.PLUGINDIR.'/'.dirname(plugin_basename(__FILE__)).'/style.css" type="text/css" media="screen" />'."\n");
}

function iredlof_login_list_scripts()
{
	wp_enqueue_script('iRedlof-jquery', plugins_url('iredlof-ajax-login-plugin/js/jquery-1.3.2.min.js'), true);
	wp_enqueue_script('iRedlof-slide', plugins_url('iredlof-ajax-login-plugin/js/slide.js'), true);
	wp_enqueue_script('iRedlof-tabcontent', plugins_url('iredlof-ajax-login-plugin/js/tabcontent.js'), true);
}

add_action('wp_head','scriptInstall');
add_action('template_redirect','iredlof_login_list_scripts');
?>