<?php
	
/*
	admin page
*/

function aml_widower_options_page() {
	
	global $aml_widower_options;
	
	ob_start(); ?>
	<div class="wrap">
		<h2>Widow Remover</h2>
		<p>Set available options for the widower plugin.</p>
		<br /><br />
		<h3 class="section-heading">General Settings</h3>
		
		<form method="post" action="options.php">
			<?php settings_fields('aml_widower_settings_group'); ?>
						
			<table class="form-table">
			    <tbody>
			        <tr valign="top">
			            <th scope="row">Advanced Custom Fields</th>
			            <td>
				            <input id="aml_widower_settings[acf]" name="aml_widower_settings[acf]" type="checkbox" value="true"<?php if ($aml_widower_options['acf'] == true) { echo ' checked="checked"'; } ?> />
			                <label for="aml_widower_settings[acf]"><span class="description"><?php _e(' Allow widower to modify Advanced Custom Fields.', 'aml_widower'); ?></span></label>
			            </td>
			        </tr>
			        <tr valign="top">
			            <th scope="row">Comment Changes</th>
			            <td>
				            <input id="aml_widower_settings[comment]" name="aml_widower_settings[comment]" type="checkbox" value="true"<?php if ($aml_widower_options['comment'] == true) { echo ' checked="checked"'; } ?> />
			                <label for="aml_widower_settings[comment]"><span class="description"><?php _e(' Wrap all widower changes in comments.', 'aml_widower'); ?></span></label>
			            </td>
			        </tr>
			    </tbody>
			</table>
			
			<p class="submit"><input type="submit" class="button-primary" value="<?php _e('Save Options', 'aml_widower'); ?>" /></p>
			
		</form>
	</div>
	<?php
	echo ob_get_clean();
}

function aml_widower_add_options_link() {
	add_options_page('Widow Remover Options', 'Widow Remover Options', 'manage_options', 'aml_widower_options', 'aml_widower_options_page');
}
add_action('admin_menu', 'aml_widower_add_options_link');

function aml_widower_register_settings() {
	register_setting('aml_widower_settings_group', 'aml_widower_settings');
}
add_action('admin_init', 'aml_widower_register_settings');