<?php
$themename = "LaunchPad";
$shortname = "lp";
$options = array (
	
	array(	"name" => "Feed Address",
			"id" => $shortname."_feedburner_address",
			"std" => "",
			"type" => "text"),
	
);

function mytheme_add_admin() {

	global $themename, $shortname, $options;

	if ( $_GET['page'] == basename(__FILE__) ) {
	
		if ( 'save' == $_REQUEST['action'] ) {

				foreach ($options as $value) {
					update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

				foreach ($options as $value) {
					if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

				header("Location: themes.php?page=functions.php&saved=true");
				die;

		} else if( 'reset' == $_REQUEST['action'] ) {

			foreach ($options as $value) {
				delete_option( $value['id'] ); }

			header("Location: themes.php?page=functions.php&reset=true");
			die;

		}
	}

    add_theme_page($themename." Options", "Current Theme Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

	global $themename, $shortname, $options;

	if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
	if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
	
?>
<div class="wrap">
<h2><?php echo $themename; ?> settings</h2>

<form method="post">

<table class="optiontable">

<?php foreach ($options as $value) { 
	
if ($value['type'] == "text") { //If we have configured this for text options ... ?>
		
<tr valign="top"> 
	<th scope="row"><?php echo $value['name']; ?>: http://feeds2.feedburner.com/</th>
	<td>
		<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" />
	</td>
</tr>

<?php } elseif ($value['type'] == "select") { //If we have configured this for select box options ... ?>

	<tr valign="top"> 
		<th scope="row"><?php echo $value['name']; ?>:</th>
		<td>
			<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
				<?php foreach ($value['options'] as $option) { ?>
				<option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
				<?php } ?>
			</select>
		</td>
	</tr>

<?php 
} 
}
?>

</table>

<p class="submit">
<input name="save" type="submit" value="Save changes" />	
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>

<?php
}
add_action('admin_menu', 'mytheme_add_admin'); 

function launchpad_ninja_roll() {
	get_avatar();
	get_the_tags();
	register_sidebar();
	wp_link_pages();
	get_bloginfo( 'description' );
}

?>