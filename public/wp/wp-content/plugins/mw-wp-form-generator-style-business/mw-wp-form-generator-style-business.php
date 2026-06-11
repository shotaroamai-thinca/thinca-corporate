<?php
/**
 * Plugin Name: MW WP Form Generator Style Business
 * Plugin URI: http://plugins.2inc.org/mw-wp-form/
 * Description: Style for MW WP Form Generator. This is for business.
 * Version: 1.3.0
 * Author: Takashi Kitajima
 * Author URI: http://2inc.org
 * Text Domain: mw-wp-form-generator-style-business
 * Domain Path: /languages/
 * Created : November 6, 2014
 * Modified: February 23, 2017
 * License: GPLv2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */
class MW_WP_Form_Generator_Style_Business {

	/**
	 * NAME
	 */
	const NAME = 'mw-wp-form-generator-style-business';

	/**
	 * $styles
	 */
	protected $styles = array();

	/**
	 * __construct
	 */
	public function __construct() {
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if ( is_plugin_active( 'mw-wp-form/mw-wp-form.php' ) ||
			 is_plugin_active( 'mw-wp-form-generator/mw-wp-form-generator.php' ) ) {
			add_action( 'plugins_loaded' , array( $this, 'plugins_loaded' ) );
		}
	}

	/**
	 * plugins_loaded
	 */
	public function plugins_loaded() {
		load_plugin_textdomain(
			'mw-wp-form-generator-style-business',
			false,
			basename( dirname( __FILE__ ) ) . '/languages'
		);

		if ( !class_exists( 'ATPU_Plugin' ) ) {
			include_once( plugin_dir_path( __FILE__ ) . 'modules/plugin-update.php' );
		}
		new ATPU_Plugin( 'http://plugins.2inc.org/mw-wp-form/api/', 'mw-wp-form-generator-style-business' );

		add_filter( 'mwform_styles', array( $this, 'mwform_styles' ) );
		add_filter( 'mw-wp-form-generator-templates', array( $this, 'templates' ) );

		// デフォルトのフォームスタイルの定義
		$this->styles = array(
			'business' => array(
				'css'      => plugin_dir_url( __FILE__ )  . 'styles/style.css',
				'template' => plugin_dir_path( __FILE__ ) . 'styles/template.php',
			),
		);
	}

	/**
	 * mwform_styles
	 * @param array $styles
	 * @return array $styles
	 */
	public function mwform_styles( $styles ) {
		foreach ( $this->styles as $style_name => $style ) {
			$styles[$style_name] = $style['css'];
		}
		return $styles;
	}

	/**
	 * templates
	 * @param array $templates
	 * @return array $templates
	 */
	public function templates( $templates ) {
		foreach ( $this->styles as $style_name => $style ) {
			$templates[$style_name] = $style['template'];
		}
		return $templates;
	}
}
$MW_WP_Form_Generator_Style_Business = new MW_WP_Form_Generator_Style_Business();
