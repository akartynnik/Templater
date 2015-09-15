<?php
class TemplaterPlugin extends MantisPlugin {
	/**
	 *  A method that populates the plugin information and minimum requirements.
	 */
	function register() {
		$this->name = 'Шаблонизатор Templater';
		$this->description = 'С помощью данного плагина можно использовать пользовательские шаблоны оформления MantisBT, а так же применять некоторые полезные твики.';
		$this->page = 'config';

		$this->version = '1.3';
		$this->author = 'Aliaksei Kartynnik';
		$this->contact = 'alex.kar.008@gmail.com';
		$this->url = 'https://github.com/akartynnik/mantisbt-template';
	}

	/**
	 * Default plugin configuration.
	 */
	function config() {
		return array(
			'templater_enable'	=> OFF,
			'template_name' 	=> 'DarkBlue',
			'enable_jquery' 	=> OFF,
			'send_comment_fix'  => OFF,
			'bottom_logo_fix'   => OFF,
			'brackets_fix'   	=> OFF,
			'name_as_link_fix'  => OFF,
			'add_tinymce'  => OFF,
		);
	}
	
	/**
	 * Объявляем свой ивент
	 */
	function events() {
        return array(
            'EVENT_TEMPLATER_INIT' => EVENT_TYPE_EXECUTE,
        );
    }
	
	/**
	 * Переопределяем свой ивент
	 */
	function hooks() {
        return array(
            'EVENT_TEMPLATER_INIT' => 'initialize',
        );
    }
	
	/**
	 * Реализуем
	 */
    function initialize( $p_event ) {
		$curent_template_folder_name = plugin_config_get( 'template_name' );
		$current_plugin_path = config_get( 'plugin_path' );
		
		
		
		if( ON == plugin_config_get( 'enable_jquery' ) )
		{
			echo "<script src=\"./plugins/Templater/custom-features/jquery.min.js\"></script>" . "\r\n";
		}
		
		
		
		if( ON == plugin_config_get( 'templater_enable' ) )
		{
			$path_to_custom_css = "./templates/" . $curent_template_folder_name . "/css/style.css";
			$path_to_custom_js = "./templates/" . $curent_template_folder_name . "/js/script.js";
			echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . $path_to_custom_css . "\" />" . "\r\n";
			echo "<script src=\"" . $path_to_custom_js . "\"></script>" . "\r\n";
		}
		
		
		
		if( ON == plugin_config_get( 'send_comment_fix' ) )
		{
			if(substr(MANTIS_VERSION, 0, 3) == "1.3")
			{
				echo "<script src=\"./plugins/Templater/custom-features/send_comment_fix_for_v1.3.js\"></script>" . "\r\n";
			} 
			else 
			{
				echo "<script src=\"./plugins/Templater/custom-features/send_comment_fix.js\"></script>" . "\r\n";
			}
		}
		
		
		
		if( ON == plugin_config_get( 'bottom_logo_fix' ) )
		{
			echo "<script src=\"./plugins/Templater/custom-features/bottom_logo_fix.js\"></script>" . "\r\n";
		}
		
		
		
		if( ON == plugin_config_get( 'brackets_fix' ) )
		{
			if(substr(MANTIS_VERSION, 0, 3) == "1.3")
			{
				echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"./plugins/Templater/custom-features/brackets_fix_for_v1.3.css\"></script>" . "\r\n";
				echo "<script src=\"./plugins/Templater/custom-features/brackets_fix_for_v1.3.js\"></script>" . "\r\n";
			} 
			else 
			{
				echo "<script src=\"./plugins/Templater/custom-features/brackets_fix.js\"></script>" . "\r\n";
			}
		} 
		
		if( ON == plugin_config_get( 'add_tinymce' ) )
		{
			echo "<script src=\"./plugins/Templater/custom-features/tinymce/tinymce.min.js\"></script>" . "\r\n";
			echo "<script src=\"./plugins/Templater/custom-features/add_tinymce.js\"></script>" . "\r\n";
		}		
		
		if( ON == plugin_config_get( 'name_as_link_fix' ) )
		{
			if(substr(MANTIS_VERSION, 0, 3) == "1.3")
			{
				echo "<script src=\"./plugins/Templater/custom-features/name_as_link_fix_for_v1.3.js\"></script>" . "\r\n";
			} 
			else 
			{
				echo "<script src=\"./plugins/Templater/custom-features/name_as_link_fix.js\"></script>" . "\r\n";
			}
		}
        
	}
}
