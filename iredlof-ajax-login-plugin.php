<?php
/*
Plugin Name: iRedlof Ajax Login
Plugin URI: http://iredlof.com/2009/04/iredlof-ajax-login-wordpress-plugin/
Description: iRedlof Ajax Login adds a Top Panel to let users login using AJAX Technology. This plugin is based on my iRedlof Inspire Theme. Checkout the toppanel demo on <a href='http://rlchandani.co.cc'>http://rlchandani.co.cc</a>. To use the plugin add the following line just after the &lt;body&gt; tag in header.php file of your current theme <strong>&lt;?php if(function_exists(updateHeader)) updateHeader(); ?&gt;</strong> .
Author: Rohit LalChandani
Version: 2.3.1
Author URI: http://iredlof.com
*/

require( dirname(__FILE__) . '/update-content.php' );
load_plugin_textdomain('iRLogin','wp-content/plugins/iredlof-ajax-login-plugin/');

function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit) {
  array_pop($words);
  echo implode(' ', $words)."..."; } else {
  echo implode(' ', $words); }
}

function scriptInstall()
{?>
<link rel="stylesheet" href="<?php echo (bloginfo("wpurl").'/'.PLUGINDIR.'/'.dirname(plugin_basename(__FILE__)).'/style.css" type="text/css" media="screen" />'."\n"); ?>
<?php }

add_action('wp_head','scriptInstall');
wp_enqueue_script('jquery');
wp_enqueue_script('jquery-form');
wp_enqueue_script('iRedlof-jquery', "/".PLUGINDIR.'/'.dirname(plugin_basename(__FILE__)).'/js/jquery-1.3.2.min.js', array('jquery', 'jquery-form'));
wp_enqueue_script('iRedlof-slide', "/".PLUGINDIR.'/'.dirname(plugin_basename(__FILE__)).'/js/slide.js', array('jquery', 'jquery-form'));
?>