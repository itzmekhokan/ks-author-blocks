<?php
/**
 * Abstract class to blocks.
 *
 * @package ks-author-blocks
 */

/**
 * KS_Author_Block_Base class to blocks.
 */
abstract class KS_Author_Block_Base {

	/**
	 * Block name.
	 *
	 * @type string
	 */
	const BLOCK_NAME = '';

	/**
	 * Construct method.
	 */
	public function __construct() {

		$this->setup_hooks();

	}

	/**
	 * To register action/filters.
	 *
	 * @return void
	 */
	protected function setup_hooks() {

		/**
		 * Actions.
		 */
		add_action( 'init', [ $this, 'register_block_type' ] );

	}

	/**
	 * Register block type.
	 */
	final public function register_block_type() {

		if ( empty( static::BLOCK_NAME ) ) {
			return;
		}

		register_block_type(
			static::BLOCK_NAME,
			[
				'render_callback' => [ $this, 'render_block' ],
				'attributes'      => $this->get_attributes(),
			]
		);
	}

	/**
	 * Render callback.
	 */
	public function render_callback() {}

	/**
	 * Get attributes.
	 */
	public function get_attributes() {}

}
