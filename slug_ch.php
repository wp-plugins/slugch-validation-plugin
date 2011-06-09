<?php
/**
 * @package slug
 * @version 1.0
 */
/*
Plugin Name: Slug Validierung
Plugin URI: http://blog.slug.ch/2011/06/06/wordpress-plugin-fur-die-validierung-des-blogs/
Description: Fügt den benötigten Meta Tag zur Validierung bei slug.ch hinzu.
Author: Simon Jenny
Version: 1.0
Author URI: http://codecentric.ch
*/
function slug(){
	echo "\n<meta name=\"slug.ch\" content=\"".get_option( 'slugauthcode' )."\" />\n";
}

function slug_menu()
{
?>
    
    <div class="wrap">
	<h2>Slug.ch Plugin zur Validierung des Blogs</h2>
	Dieses kleine Plugin fügt den, zur Validierung des Blogs bei Slug.ch benötigten, Meta Tag automatisch zum Header hinzu.
	
	<br />
	<br />
	<form method="post" action="options.php">
	 <?php settings_fields( 'slug.ch' ); ?>
		
		<label>Slug.ch Feed Code : <input type="text" size="80" name="slugauthcode" id="slugauthcode" value="<?php echo get_option('slugauthcode'); ?>"></label>
		
		<p class="submit">
    		<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    	</p>
    </form> 

	</div>

<?php
}
 
function slug_admin_actions()
{
    add_options_page("slug.ch", "slug.ch", 1, "slug.ch", "slug_menu");
}

function register_mysettings() {
	register_setting( 'slug.ch', 'slugauthcode' );
} 
 
add_action('admin_init', 'register_mysettings' );
add_action('admin_menu', 'slug_admin_actions');
add_action('wp_head', 'slug');


?>