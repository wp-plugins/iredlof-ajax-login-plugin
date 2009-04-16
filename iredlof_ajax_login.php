<?php
/*
Plugin Name: iRedlof Ajax Login - Beta Version
Plugin URI: http://iredlof.com
Description: iRedlof Ajax Login adds a Top Panel to let users login using AJAX Technology. Note : This is a beta version, there might be few issues with some themes as the layout of your theme plays an important role with this plugin + if your theme is using MOOTOOLS then this plugin might now work.
Author: Rohit LalChandani
Version: Beta Version 1.0
Author URI: http://iredlof.com
*/

load_plugin_textdomain('iRLogin','wp-content/plugins/iredlof_ajax_login/');

function init_iredlof_ajax_login()
{
	add_option('sidebarlogin_login_redirect','','no');
	add_option('sidebarlogin_logout_redirect','','no');
	add_option('sidebarlogin_register_link','yes','no');
	add_option('sidebarlogin_forgotton_link','yes','no');
	add_option('sidebarlogin_logged_in_links', "<a href=\"".get_bloginfo('wpurl')."/wp-admin/\">".__('Dashboard')."</a>\n<a href=\"".								get_bloginfo('wpurl')."/wp-admin/profile.php\">".__('Profile')."</a>",'no');
}

function updateHeader()
{
	echo('<link rel="stylesheet" href="'.get_bloginfo('wpurl').'/wp-content/plugins/iredlof_ajax_login/fx.slide.css" type="text/css" media="screen" />');
	global $user_ID, $current_user;
	get_currentuserinfo();
	?>
	<div id="login">
		<div class="loginContent">
				<label for="log"><b>Username: </b></label>
				<input class="field" type="text" name="log" id="loguser" value="" size="23" />
				<label for="pwd"><b>Password:</b></label>
				<input class="field" type="password" name="pwd" id="logpwd" size="23" />
				<input type="button" name="submit" value="" class="button_login" onClick="javascript:iRedlof_login();" />
                <input type="hidden" name="wp-address" value="<?php _e(get_bloginfo('wpurl')); ?>" id="wp-address"/>
                <input type="hidden" name="redirect_to" value="<?php _e($_SERVER['REQUEST_URI']); ?>" id="redirect_to"/>
		<div class="left">
            	</div>
                <div class="right"><p class="forgetmenot"><label><input name="rememberme" type="checkbox" id="rememberme" value="forever" tabindex="90" /> Remember Me</label></p></div>
			<div class="right">
			<?php
            if (get_option('sidebarlogin_forgotton_link')=='yes')
			echo('Not a member? <a href="'.get_bloginfo('wpurl').'/wp-login.php?action=register">Register</a>');
			if (get_option('sidebarlogin_forgotton_link')=='yes')
			echo(' | <a href="'.get_bloginfo('wpurl').'/wp-login.php?action=lostpassword">Lost your password?</a>');
			?>
		 </div><br/><br/><p id="login_status" style="text-align:left;"></p>
        </div>
		<div class="loginClose"><a href="#" id="closeLogin">Close Panel</a></div>
        
	</div> <!-- /login -->

    <div id="container">
		<div id="top">
		<!-- login -->
			<ul class="login">
		    	<li class="left">&nbsp;</li>
                <?php
				if ($user_ID != '')
		        echo ('<li id="greetuser">Hello '.ucwords($current_user->display_name).'</li>');
				else
				echo ('<li id="greetuser">Welcome Guest!</li>');
                ?>
				<li id="seprator" style="display:none;">|</li>
                <li id="userdetail" style="display:none;"><a href="#">(User Details)</a></li>
                <li>|</li>
                <?php
				if ($user_ID != '')
				echo('<li id="login-logout"><a href="'.wp_logout_url('/wp-login.php?action=logout&amp;redirect_to=' . $_SERVER['REQUEST_URI']).'">Log Out</a></li>');
				else
				echo('<li id="login-logout"><a id="toggleLogin" href="#">Log In</a></li>');
				?>
			</ul> <!-- / login -->
		</div> <!-- / top -->

        <div class="clearfix"></div>


		<div id="content">
			<!-- If javascript is disabled, display message below: -->
			<noscript><p style="color: red;">You must enable Javascript in you browser in order to try this demo.</p></noscript>
        	</p>
		</div><!-- / content -->
        <div class="clearfix"></div>
	</div>

<!-- End of login page -->

<?php
}

//Loading Javascript and initalizing plugin features
add_action('init', 'init_iredlof_ajax_login',0);
add_action('wp_head', 'updateHeader');
wp_enqueue_script('jquery');
wp_enqueue_script('jquery-form');
wp_enqueue_script('iRedlof-Login-Script', '/wp-content/plugins/iredlof_ajax_login/js/iredlof_login_script.js', array('jquery', 'jquery-form'));
wp_enqueue_script('mootools-1.2-core', '/wp-content/plugins/iredlof_ajax_login/js/mootools-1.2-core-yc.js', array('jquery', 'jquery-form'));
wp_enqueue_script('mootools-1.2-more', '/wp-content/plugins/iredlof_ajax_login/js/mootools-1.2-more.js', array('jquery', 'jquery-form'));
wp_enqueue_script('fx.slide', '/wp-content/plugins/iredlof_ajax_login/js/fx.slide.js', array('jquery', 'jquery-form'));

?>