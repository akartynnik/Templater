<?php
auth_reauthenticate( );
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );
html_page_top( "Редактирование плагина Templater" );
print_manage_menu( );
function get_template_dir(){
	$files_and_dirs = scandir(config_get( 'absolute_path' ) . "templates/");
	$i = 0;
	foreach($files_and_dirs as $item)
	{
		if(is_dir(config_get( 'absolute_path' ) . "templates/" . $item) && $item != "." && $item != ".."){
			$result_array[$i] = $item;	
			$i++;
		}
	}
	return $result_array;
}
?>

<br />
<form action="<?php echo plugin_page( 'config_edit' )?>" method="post">
<?php echo form_security_field( 'plugin_templater_config_edit' ) ?>
	<table align="center" class="width50" cellspacing="1">
		<tr>
			<td class="form-title" colspan="3">
				Настройки шаблонизатора
			</td>
		</tr>
		
		<tr <?php echo helper_alternate_class( )?>>
			<td class="category" width="60%">
				Поддержка сторонних шаблонов
			</td>
			<td class="center" width="20%">
				<label><input type="radio" name="templater_enable" value="1" <?php echo( ON == plugin_config_get( 'templater_enable' ) ) ? 'checked="checked" ' : ''?>/>
					вкл
			</td>
			<td class="center" width="20%">
				<label><input type="radio" name="templater_enable" value="0" <?php echo( OFF == plugin_config_get( 'templater_enable' ) ) ? 'checked="checked" ' : ''?>/>
					выкл
			</td>
		</tr>
		
		<tr <?php echo helper_alternate_class( )?>>
			<td class="category" width="60%">
				Поддержка jQuery v1.11.2 <br/>
				<span class="small">Необходимо для корректной работы некоторых шаблонов и твиков (не включать в версии >= 1.3.0)</span>
			</td>
			<td class="center" width="20%">
				<label><input type="radio" name="enable_jquery" value="1" <?php echo( ON == plugin_config_get( 'enable_jquery' ) ) ? 'checked="checked" ' : ''?>/>
					вкл
			</td>
			<td class="center" width="20%">
				<label><input type="radio" name="enable_jquery" value="0" <?php echo( OFF == plugin_config_get( 'enable_jquery' ) ) ? 'checked="checked" ' : ''?>/>
					выкл
			</td>
		</tr>
		
		<tr <?php echo helper_alternate_class( )?>>
			<td class="category" width="60%">
				Текущий шаблон
			</td>
			<td class="center" colspan="2">
				<select name="template_name" style="width: 50%;">
					<?
						$selected_item_name = plugin_config_get( 'template_name' );
						$folders = get_template_dir();
						foreach($folders as $item)
						{
							if(plugin_config_get( 'template_name' ) == $item){
								echo "<option value=\"" . $item . "\" selected=\"selected\">" . $item . "</option>";
							} else {
								echo "<option value=\"" . $item . "\">" . $item . "</option>";
							}
						}
					?>
				</select>
			</td>
			
			<tr <?php echo helper_alternate_class( )?>>
				<td class="category" width="60%">
					Отправка комментариев по нажатию "Ctrl" + "Enter"
				<span class="small" style="float: right;"> (необходима поддержка jQuery)</span>
				</td>
				<td class="center" width="20%">
					<label><input type="radio" name="send_comment_fix" value="1" <?php echo( ON == plugin_config_get( 'send_comment_fix' ) ) ? 'checked="checked" ' : ''?>/>
						вкл
				</td>
				<td class="center" width="20%">
					<label><input type="radio" name="send_comment_fix" value="0" <?php echo( OFF == plugin_config_get( 'send_comment_fix' ) ) ? 'checked="checked" ' : ''?>/>
						выкл
				</td>
			</tr>
			
			<tr <?php echo helper_alternate_class( )?>>
				<td class="category" width="60%">
					Скрыть лого MantisBT в подвале сайта
					<span class="small" style="float: right;"> (необходима поддержка jQuery)</span>
				</td>
				<td class="center" width="20%">
					<label><input type="radio" name="bottom_logo_fix" value="1" <?php echo( ON == plugin_config_get( 'bottom_logo_fix' ) ) ? 'checked="checked" ' : ''?>/>
						вкл
				</td>
				<td class="center" width="20%">
					<label><input type="radio" name="bottom_logo_fix" value="0" <?php echo( OFF == plugin_config_get( 'bottom_logo_fix' ) ) ? 'checked="checked" ' : ''?>/>
						выкл
				</td>
			</tr>
			
			<tr <?php echo helper_alternate_class( )?>>
				<td class="category" width="60%">
					Убрать квадратные скобки (брекеты) в ссылках
					<span class="small" style="float: right;"> (необходима поддержка jQuery)</span>
				</td>
				<td class="center" width="20%">
					<label><input type="radio" name="brackets_fix" value="1" <?php echo( ON == plugin_config_get( 'brackets_fix' ) ) ? 'checked="checked" ' : ''?>/>
						вкл
				</td>
				<td class="center" width="20%">
					<label><input type="radio" name="brackets_fix" value="0" <?php echo( OFF == plugin_config_get( 'brackets_fix' ) ) ? 'checked="checked" ' : ''?>/>
						выкл
				</td>
			</tr>
			
			<tr <?php echo helper_alternate_class( )?>>
				<td class="category" width="60%">
					Название инцидента как ссылка на странице "Список инцидентов"
					<span class="small" style="float: right;"> (необходима поддержка jQuery)</span>
				</td>
				<td class="center" width="20%">
					<label><input type="radio" name="name_as_link_fix" value="1" <?php echo( ON == plugin_config_get( 'name_as_link_fix' ) ) ? 'checked="checked" ' : ''?>/>
						вкл
				</td>
				<td class="center" width="20%">
					<label><input type="radio" name="name_as_link_fix" value="0" <?php echo( OFF == plugin_config_get( 'name_as_link_fix' ) ) ? 'checked="checked" ' : ''?>/>
						выкл
				</td>
			</tr>
		</tr>
		<tr>
			<td class="center" colspan="3">
				<input type="submit" class="button" value="<?php echo lang_get( 'change_configuration' )?>" />
			</td>
		</tr>
	</table>
</form>

<?php
html_page_bottom();
