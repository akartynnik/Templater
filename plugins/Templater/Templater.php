<?php
class TemplaterPlugin extends MantisPlugin {
	/**
	 *  A method that populates the plugin information and minimum requirements.
	 */
	function register() {
		$this->name = 'Шаблонизатор Templater';
		$this->description = 'С помощью данного плагина можно использовать пользовательские шаблоны оформления MantisBT, а так же применять некоторые полезные твики.';
		$this->page = 'config';

		$this->version = '1.0';
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
		);
	}
	
	/**
	 * Объявляем свой ивент
	 */
	function events() {
        return array(
            'EVENT_TEMPATER_INIT' => EVENT_TYPE_EXECUTE,
        );
    }
	
	/**
	 * Переопределяем свой ивент
	 */
	function hooks() {
        return array(
            'EVENT_TEMPATER_INIT' => 'initialize',
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
			echo "<script src=\"../plugins/Templater/custom-features/jquery.min.js\"></script>" . "\r\n";
		}
		
		if( ON == plugin_config_get( 'templater_enable' ) )
		{
			$path_to_custom_css = config_get( 'absolute_path' ) . "templates/" . $curent_template_folder_name . "/css/style.css";
			$path_to_custom_js = config_get( 'absolute_path' ) . "templates/" . $curent_template_folder_name . "/js/script.js";
			$custom_css = file_get_contents($path_to_custom_css);
			$custom_js = file_get_contents($path_to_custom_js);
			echo "<style>" . $custom_css . "</style>" . "\r\n";
			echo "<script>" . $custom_js . "</script>" . "\r\n";
		}
		
		if( ON == plugin_config_get( 'send_comment_fix' ) )
		{
			echo "<script src=\"../plugins/Templater/custom-features/send_comment_fix.js\"></script>" . "\r\n";
		}
		
		if( ON == plugin_config_get( 'bottom_logo_fix' ) )
		{
			echo "<script src=\"../plugins/Templater/custom-features/bottom_logo_fix.js\"></script>" . "\r\n";
		}
		
		if( ON == plugin_config_get( 'brackets_fix' ) )
		{
			echo "<script src=\"../plugins/Templater/custom-features/brackets_fix.js\"></script>" . "\r\n";
		}
		
		if( ON == plugin_config_get( 'name_as_link_fix' ) )
		{
			echo "<script src=\"../plugins/Templater/custom-features/name_as_link_fix.js\"></script>" . "\r\n";
		}
        
	}
}
