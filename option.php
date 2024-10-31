<?php
function nam_duplicate_config_menu(){
	add_menu_page('Remote Post Databse Configuration', 'Remote Posts', 'administrator', 'remote-wp-config', 'nam_duplicate_config_menu_page', null, null);
}
add_action('admin_menu', 'nam_duplicate_config_menu');
function nam_duplicate_config_menu_page(){
?>
<div class="wrap">
<h2>Remote WP Database Configuration</h2>
<?php if($_POST){
update_option('nam_remote_hostname', $_POST['nam_remote_hostname']);
update_option('nam_remote_dbname', $_POST['nam_remote_dbname']);
update_option('nam_remote_dbuser', $_POST['nam_remote_dbuser']);
update_option('nam_remote_dbpass', $_POST['nam_remote_dbpass']);
update_option('nam_remote_table_prefix', $_POST['nam_remote_table_prefix']);
?>
	<div class="updated settings-error" id="setting-error-settings_updated"> 
		<p><strong>Settings saved.</strong></p>
	</div>
<?php } ?>
<form action="" method="post" class="nam_remote_con_form">
	<table class="form-table">
		<tbody>
			<tr>
				<th scope="row">
					<label for="nam_remote_hostname">Host</label>
				</th>
				<td>
					<input id="nam_remote_hostname" class="regular-text" type="text" value="<?php echo get_option('nam_remote_hostname');?>" name="nam_remote_hostname" required />
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="nam_remote_dbname">Database Name</label>
				</th>
				<td>
					<input id="nam_remote_dbname" class="regular-text" type="text" value="<?php echo get_option('nam_remote_dbname');?>" name="nam_remote_dbname" required />
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="nam_remote_dbuser">Database User</label>
				</th>
				<td>
					<input id="nam_remote_dbuser" class="regular-text" type="text" value="<?php echo get_option('nam_remote_dbuser');?>" name="nam_remote_dbuser" required />
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="nam_remote_dbpass">User Password</label>
				</th>
				<td>
					<input id="nam_remote_dbpass" class="regular-text" type="password" value="<?php echo get_option('nam_remote_dbpass');?>" name="nam_remote_dbpass" />
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="nam_remote_table_prefix">Table Prefix</label>
				</th>
				<td>
					<input id="nam_remote_table_prefix" class="regular-text" type="text" value="<?php echo get_option('nam_remote_table_prefix');?>" name="nam_remote_table_prefix" required />
				</td>
			</tr>
		</tbody>
	</table>
	<p class="submit">
		<input id="submit" class="button button-primary" type="submit" value="Save Changes" name="submit" />
	</p>
</form>
<?php }