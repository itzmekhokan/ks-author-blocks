/**
 * Author Description Block.
 *
 * @package ks-author-blocks
 */

/**
 * WordPress dependencies.
 */
const { registerBlockType } = wp.blocks;
const { __ } = wp.i18n;

/**
 * Internal dependencies.
 */

import settings from './block';

registerBlockType( settings.name, {

	/**
	 * Block title.
	 *
	 * @member {string}
	 */
	title: __( 'Author Description', 'ks-author-blocks' ),

	/**
	 * Block icons shown in editor.
	 *
	 * @member {string}
	 */
	icon: 'archive',

	/**
	 * Block Category
	 *
	 * @type {string}
	 */
	category: settings.category,

	/**
	 * Block attributes.
	 *
	 * @type {Object}
	 */
	attributes: settings.attributes,

	/**
	 * Describes the structure of the block in the context of the editor.
	 *
	 * @return {jsx} Block elements.
	 */
	edit: () => {

		return (
			<div div class="ks-author-blocks__placeholder">Display Current post author description.</div>
		);
	},

	/**
	 * Defines the markup to be serialized back when a post is saved.
	 *
	 * @return {null} Null.
	 */
	save: function() {
		return null;
	}
} );
