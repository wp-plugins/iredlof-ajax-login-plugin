<?php
/*
Plugin Name: iRedlof Ajax Login
Plugin URI: http://iredlof.com/2009/04/iredlof-ajax-login-wordpress-plugin/
Description: iRedlof Ajax Login adds a Top Panel to let users login using AJAX Technology. This plugin is based on my iRedlof Inspire Theme. Checkout the toppanel demo on <a href='http://rlchandani.co.cc'>http://rlchandani.co.cc</a> .
Author: Rohit LalChandani
Version: 2.0
Author URI: http://iredlof.com
*/

load_plugin_textdomain('iRLogin','wp-content/plugins/iredlof_ajax_login/');

function updateHeader()
{
	echo('<link rel="stylesheet" href="'.get_bloginfo('wpurl').'/wp-content/plugins/iredlof_ajax_login/style.css" type="text/css" media="screen" />'."\n");
	global $user_ID, $current_user;
	get_currentuserinfo();
	?>
	<div id="toppanel"> 
<?php 
	global $user_identity, $user_ID;	
	// If user is logged in or registered, show dashboard links in panel
	if (is_user_logged_in()) { 
?>
	<div id="panel">
		<div class="content clearfix">
			
            <div class="left border">
				<h1>Welcome back <?php echo ucwords($user_identity) ?></h1>
				<h2>Headline</h2>				
				<p>Do show your appreciation by keeping a link to iRedlof.<br/>Add any content in this section like a post, videos, image, anything you feel like.Open iredlof_ajax_login.php and modify line no:31</p>
				<h2>Dashboard</h2>
				<ul>					
					<li><a href="<?php bloginfo('url') ?>/wp-admin/index.php">Go to Dashboard</a></li>
				</ul>
                <h2>Comment</h2>
				<ul>If you like this plugin then please leave a comment <a href="http://iredlof.com/2009/04/iredlof-ajax-login-wordpress-plugin/#respond" title="Download">here &raquo;</a></ul>
			</div>
			
            <div class="left narrow">			
				<h2>My Account</h2>				
				<ul>					
					<li><a href="<?php bloginfo('url') ?>/wp-admin/index.php">Global Dashboard</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/profile.php">Edit My Profile</a></li>
					<?php if ( current_user_can('level_1') ) : ?>
						<li><a href="<?php bloginfo('url') ?>/wp-admin/edit-comments.php">Comments</a></li>
					<?php endif ?>
	        		<li><a href="<?php echo wp_logout_url(get_permalink()); ?>" rel="nofollow" title="<?php _e('Log out'); ?>"><?php _e('Log out'); ?></a></li>
				</ul>
                <h2>Powered by</h2>				
				<ul>						
					<li><a href="http://iredlof.com">iRedlof</a></li>
                </ul>	
				<?php if ( current_user_can('level_10') ) : ?>		
				<h2>Appearance</h2>				
				<ul>						
					<li><a href="<?php bloginfo('url') ?>/wp-admin/themes.php">Themes</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/widgets.php">Widgets</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/theme-editor.php">Theme Editor</a></li>
				</ul>
				<?php endif ?>
			</div>
			
			<?php if ( current_user_can('level_2') ) : ?>
			
            <div class="left narrow">			
				<h2>Posts</h2>				
				<ul>					
					<li><a href="<?php bloginfo('url') ?>/wp-admin/post-new.php">New Post</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/edit.php">Edit Posts</a></li>
				<?php if ( current_user_can('level_3') ) : ?>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/edit-tags.php">Tags</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/categories.php">Categories</a></li>
				<?php endif ?>
				</ul>
				<?php if ( current_user_can('level_10') ) : ?>		
				<h2>Plugins</h2>				
				<ul>						
					<li><a href="<?php bloginfo('url') ?>/wp-admin/plugins.php">Plugins</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/plugin-install.php">Install a Plugin</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/plugin-editor.php">Plugin Editor</a></li>
				</ul>
				<?php endif ?>
			</div>
			
			<?php endif ?>
			<?php if ( current_user_can('level_2') ) : ?>
			
            <div class="left narrow">
				<?php if ( current_user_can('level_3') ) : ?>	
				<h2>Pages</h2>				
				<ul>		
					<li><a href="<?php bloginfo('url') ?>/wp-admin/post-new.php">New Page</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/edit-pages.php">Edit Pages</a></li>
				</ul>
				<?php endif ?>			
				<h2>Library</h2>				
				<ul>					
					<li><a href="<?php bloginfo('url') ?>/wp-admin/upload.php">Library</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/media-new.php">Add New</a></li>
				</ul>
				<?php if ( current_user_can('level_3') ) : ?>		
				<h2>Users</h2>				
				<ul>						
					<li><a href="<?php bloginfo('url') ?>/wp-admin/users.php">Author &amp; Users</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/user-new.php">Add New</a></li>
				</ul>
				<?php endif ?>
			</div>
			
			<?php endif ?>
			<?php if ( current_user_can('level_10') ) : ?>
			
            <div class="left narrow">			
				<h2>Settings</h2>				
				<ul>						
					<li><a href="<?php bloginfo('url') ?>/wp-admin/options-general.php">General</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/options-writing.php">Writing</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/options-reading.php">Reading</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/options-discussion.php">Discussion</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/options-media.php">Media</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/options-privacy.php">Privacy</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/options-permalink.php">Permalinks</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/options-misc.php">Miscellaneous</a></li>
				</ul>
                <h2>Powered by</h2>				
				<ul>						
					<li><a href="http://iredlof.com">iRedlof</a></li>
                </ul>
			</div>
			
			<?php endif ?>
		</div>
	</div> <!-- /login -->	

    <!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
	    	<li class="left">&nbsp;</li>
	    	<!-- Logout -->
	        <li><a href="<?php echo wp_logout_url(get_permalink()); ?>" rel="nofollow" title="<?php _e('Log out'); ?>"><?php _e('Log out'); ?></a></li>
			<li class="sep">|</li>
			<li id="toggle">
				<a id="open" class="open" href="#">Show iDashboard</a>
				<a id="close" style="display: none;" class="close" href="#">Close Panel</a>	
			</li>
	    	<li class="right">&nbsp;</li>
		</ul> 
	</div> <!-- / top -->

<?php 
	// Else if user is not logged in, show login and register forms
	} else {	
?>
	<div id="panel">
		<div class="content clearfix">
			
            <div class="left border">
				<h1>Welcome to <? bloginfo('name'); ?></h1>
				<h2>Login TopPanel</h2>		
				<p class="grey">Do show your appreciation by keeping a link to iRedlof.<br/>You can put anything you want in this sliding panel: like a post, videos, image, anything you feel like.Open iredlof_ajax_login.php and modify line no:151</p>
				<h2>Download</h2>
				<p class="grey">To download this plugin goto <a href="http://iredlof.com/2009/04/iredlof-ajax-login-wordpress-plugin/" title="Download">iRedlof TopPanel &raquo;</a></p>
                <h2>Comment</h2>
				<p class="grey">If you like this plugin then please leave a comment <a href="http://iredlof.com/2009/04/iredlof-ajax-login-wordpress-plugin/#respond" title="Download">here &raquo;</a></p>
			</div>
			
            <div class="left">
				<!-- Login Form -->
				<form class="clearfix" action="<?php bloginfo('url') ?>/wp-login.php" method="post">
					<h1>Member Login</h1>
					<label class="grey" for="log">Username:</label>
					<input class="field" type="text" name="log" id="log" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" size="23" />
					<label class="grey" for="pwd">Password:</label>
					<input class="field" type="password" name="pwd" id="pwd" size="23" />
	            	<label><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> Remember me</label>
        			<div class="clear"></div>
					<input type="submit" name="submit" value="Login" class="bt_login" />
					<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>"/>
					<a class="lost-pwd" href="<?php bloginfo('url') ?>/wp-login.php?action=lostpassword">Lost your password?</a>
				</form>
			</div>
			
            <div class="left right">
			<?php if (get_option('users_can_register')) : ?>	
				<!-- Register Form -->
				<form name="registerform" id="registerform" action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" method="post">
					<h1>Not a member yet? Sign Up!</h1>	
					<label class="grey" for="user_login"><?php _e('Username') ?></label>
					<input type="text" name="user_login" id="user_login" class="input field" value="<?php echo attribute_escape(stripslashes($user_login)); ?>" size="20" tabindex="10" />
					<label class="grey" for="user_email"><?php _e('E-mail') ?></label>
					<input type="text" name="user_email" id="user_email" class="input field" value="<?php echo attribute_escape(stripslashes($user_email)); ?>" size="25" tabindex="20" />
					<?php do_action('register_form'); ?>
					<label id="reg_passmail"><?php _e('A password will be e-mailed to you.') ?></label>
					<input type="submit" name="wp-submit" id="wp-submit" value="<?php _e('Register'); ?>" class="bt_register" />
				</form>
			<?php else : ?>
				<h1>Registration is closed</h1>
				<p>Sorry, you are not allowed to register by yourself on this site!</p>
				<p>You must either be invited by one of our team member or request an invitation by email at <b>info {at} yoursite {dot} com</b>.</p>
				
				<!-- Admin, delete text below later when you are done with configuring this panel -->
				<p style="border-top:1px solid #333;border-bottom:1px solid #333;padding:10px 0;margin-top:10px;color:white"><em>Note: If you are the admin and want to display the register form here, log in to your dashboard, and go to <b>Settings</b> > <b>General</b> and click "Anyone can register".</em></p>
			<?php endif ?>			
			</div>
            
		</div>
	</div> <!-- /login -->	

    <!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
	    	<li class="left">&nbsp;</li>
	    	<!-- Login / Register -->
			<li id="toggle">
				<a id="open" class="open" href="#">Log In | Register</a>
				<a id="close" style="display: none;" class="close" href="#">Close Panel</a>			
			</li>
	    	<li class="right">&nbsp;</li>
		</ul> 
	</div> <!-- / top -->	
    		
<?php } ?>	

</div> <!--END panel -->	

<!-- End of login page -->

<?php
}

//Loading Javascript and initalizing plugin features
add_action('wp_head', 'updateHeader');
wp_enqueue_script('jquery');
wp_enqueue_script('jquery-form');
wp_enqueue_script('iRedlof-jquery', '/wp-content/plugins/iredlof_ajax_login/js/jquery-1.3.2.min.js', array('jquery', 'jquery-form'));
wp_enqueue_script('iRedlof-slide', '/wp-content/plugins/iredlof_ajax_login/js/slide.js', array('jquery', 'jquery-form'));
wp_enqueue_script('iRedlof-tabcontent', '/wp-content/plugins/iredlof_ajax_login/js/tabcontent.js', array('jquery', 'jquery-form'));
?>