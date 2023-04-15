<?php
/**
 * Plugin Name: KS Author Blocks
 * Description: Custom author block gutenberg
 * Plugin URI:  https://github.com/itzmekhokan
 * Author:      itzmekhokan
 * Author URI:  https://github.com/itzmekhokan
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Version:     1.0
 * Text Domain: ks-author-blocks
 *
 * @package ks-network-blocks
 */

defined( 'ABSPATH' ) || exit;

define( 'KS_AUTHOR_BLOCKS_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'KS_AUTHOR_BLOCKS_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );

require_once KS_AUTHOR_BLOCKS_PATH . '/inc/helpers/custom-functions.php';

// Include the main KS_Author_Blocks class.
if ( ! class_exists( 'KS_Author_Blocks' ) ) {
    include_once KS_AUTHOR_BLOCKS_PATH . '/inc/class-ks-author-blocks.php';
}

/**
 * Main instance of KS_Author_Blocks.
 *
 * Return the main instance of KS_Author_Blocks to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return KS_Author_Blocks
 */
function KS_Author_Blocks() {
    return KS_Author_Blocks::instance();
}

// Set Global instance.
$GLOBALS['ks_author_blocks'] = KS_Author_Blocks();