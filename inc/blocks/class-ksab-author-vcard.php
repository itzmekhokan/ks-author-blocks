<?php
/**
 * Author VCard Block Class.
 *
 * @package ks-author-blocks
 */

/**
 * Class KS_Author_Block_Author_VCard
 */
class KS_Author_Block_Author_VCard extends KS_Author_Block_Base {

	/**
	 * Block name.
	 *
	 * @type string
	 */
	const BLOCK_NAME = 'ks-author-blocks/author-vcard';
	
	/**
	 * Get attributes.
	 *
	 * @return array
	 */
	public function get_attributes() {
		return [
			'items' => [
				'type' => 'array',
			],
		];
	}
	
	/**
	 * Render block.
	 *
	 * @param array $attributes List of attributes passed in block.
	 *
	 * @return string HTML elements.
	 */
	public function render_block( $attributes = [] ) {
		
		$attributes = wp_parse_args( $attributes, [] );
		
		return ks_author_blocks_get_template(
			'author-vcard',
			[
				'attributes' => $attributes,
			]
		);

	}
}
new KS_Author_Block_Author_VCard();
