<?php

namespace Carbon_Field_Password;

use Carbon_Fields\Field\Field;

class Password_Field extends Field {

	/**
	 * @var string
	 */
	protected $placeholder = '';

	/**
	 * Prepare the field type for use.
	 * Called once per field type when activated.
	 *
	 * @static
	 * @access public
	 *
	 * @return void
	 */
	public static function field_type_activated() {
		$dir    = \Carbon_Field_Password\DIR . '/languages/';
		$locale = get_locale();
		$path   = $dir . $locale . '.mo';
		load_textdomain( 'carbon-field-Password', $path );
	}

	/**
	 * Enqueue scripts and styles in admin.
	 * Called once per field type.
	 *
	 * @static
	 * @access public
	 *
	 * @return void
	 */
	public static function admin_enqueue_scripts() {
		$root_uri = \Carbon_Fields\Carbon_Fields::directory_to_url( \Carbon_Field_Password\DIR );
		// Enqueue field styles.
		wp_enqueue_style( 'carbon-field-Password', $root_uri . '/build/bundle' . (defined("SCRIPT_DEBUG") && SCRIPT_DEBUG ? '' : '.min') .'.css' );
		// Enqueue field scripts.
		wp_enqueue_script( 'carbon-field-Password', $root_uri . '/build/bundle' . (defined("SCRIPT_DEBUG") && SCRIPT_DEBUG ? '' : '.min') .'.js', array( 'carbon-fields-core' ) );
	}

	/**
	 * @return string
	 */
	public function get_placeholder(): string {
		return $this->placeholder;
	}

	/**
	 * @param string $placeholder
	 */
	public function set_placeholder( string $placeholder ): Password_Field {
		$this->placeholder = $placeholder;
		return $this;
	}

	/**
	 * @param bool $load
	 *
	 * @return array
	 */
	public function to_json( $load ) {
		$data = parent::to_json( $load );
		return array_merge( $data, [
			'placeholder' => $this->get_placeholder(),
		] );
	}



}
