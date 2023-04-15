<?php
/**
 * KS_Author_Blocks custom functions.
 *
 * @package ks-author-blocks
 */

/**
 * Get templates passing attributes and including the file.
 *
 * @param  string $slug file slug like you use in get_template_part without php extension.
 * @param  array  $args pass an array of attributes you want to use in array keys.
 *
 * @return void
 */
function ks_author_blocks_get_template( $slug, $args = [] ) {
	$template_path 	  = KS_AUTHOR_BLOCKS_PATH . '/templates/';
	$template         = sprintf( '%s.php', $slug );
	$located_template = $template_path . $template;

	if ( '' === $located_template ) {
		return;
	}

	if ( ! empty( $args ) && is_array( $args ) ) {
		extract( $args, EXTR_SKIP ); // phpcs:ignore WordPress.PHP.DontExtract.extract_extract -- Used as an exception as there is no better alternative.
	}

	ob_start();

	include $located_template; // phpcs:ignore WordPressVIPMinimum.Files.IncludingFile.UsingVariable

	$html = ob_get_clean();

	return $html;
}
