<?php

/**
 * KS_Author_Blocks setup
 *
 * @package KS_Author_Blocks
 * @since   1.0.0
 */

defined('ABSPATH') || exit;

/**
 * Main KS_Author_Blocks Class.
 *
 * @class KS_Author_Blocks
 */
final class KS_Author_Blocks {

    /**
     * KS_Author_Blocks version.
     *
     * @var string
     */
    public $version = '1.0.0';

    /**
     * The single instance of the class.
     *
     * @var   KS_Author_Blocks
     * @since 1.0.0
     */
    protected static $instance = null;

    /**
     * Main KS_Author_Blocks Instance.
     *
     * Ensures only one instance of KS_Author_Blocks is loaded or can be loaded.
     *
     * @since  1.0.0
     * @static
     * @see    KS_Author_Blocks()
     * @return KS_Author_Blocks - Main instance.
     */
    public static function instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * KS_Author_Blocks Constructor.
     */
    public function __construct() {
		$this->includes();
        $this->setup_hooks();
    }

    /**
     * Include required core files used in admin and on the frontend.
     */
    public function includes() {
        /**
         * Core classes and functions.
         */
        include_once KS_AUTHOR_BLOCKS_PATH . '/inc/helpers/class-ksab-base.php';
        
		// Load Blocks
		$load_blocks = array(
			'author-vcard',
			'author-description',
		);

		foreach ( $load_blocks as $key => $block_slug ) {
			include_once KS_AUTHOR_BLOCKS_PATH . "/inc/blocks/class-ksab-$block_slug.php";
		}
    }

	/**
	 * Setup hooks.
	 *
	 * @return void
	 */
	public function setup_hooks() {

		/**
		 * Actions
		 */
		add_action( 'enqueue_block_editor_assets', [ $this, 'enqueue_scripts' ] );

		/**
		 * Filters
		 */
		add_filter( 'block_categories', [ $this, 'add_block_categories' ], 10, 2 );
	}

	/**
	 * Enqueue scripts.
	 *
	 * @return void
	 */
	public function enqueue_scripts() {

		$dependencies = array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-i18n' );
		$version      = filemtime( KS_AUTHOR_BLOCKS_PATH . '/build/index.js' );

		wp_register_script(
			'ks-author-blocks',
			KS_AUTHOR_BLOCKS_URL . '/build/index.js',
			$dependencies,
			$version,
			true
		);

		wp_enqueue_script( 'ks-author-blocks' );
	}

	/**
	 * Add Block Categories.
	 *
	 * @param array    $categories Block categories.
	 * @param \WP_Post $post       Post.
	 *
	 * @return array Array of block categories.
	 */
	public function add_block_categories( $categories, $post ) { // phpcs:ignore VariableAnalysis.CodeAnalysis.VariableAnalysis.UnusedVariable

		// @todo Filter post types.
		return array_merge(
			$categories,
			[
				[
					'slug'  => 'ks-author-blocks',
					'title' => __( 'KS Author Blocks', 'ks-author-blocks' ),
				],
			]
		);
	}

}
