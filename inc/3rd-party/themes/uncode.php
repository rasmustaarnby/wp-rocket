<?php
defined( 'ABSPATH' ) || die( 'Cheatin&#8217; uh?' );

$current_theme = wp_get_theme();

if ( 'uncode' === strtolower( $current_theme->get( 'Name' ) ) || 'uncode' === strtolower( $current_theme->get( 'Template' ) ) ) {
	/**
	 * Excludes Uncode init and ai-uncode JS files from minification/combine
	 *
	 * @since 3.1
	 * @author Remy Perona
	 *
	 * @param array $excluded_js Array of JS filepaths to be excluded.
	 * @return array
	 */
	function rocket_exclude_js_uncode( $excluded_js ) {
		$excluded_js[] = rocket_clean_exclude_file( get_template_directory_uri() . '/library/js/init.js' );
		$excluded_js[] = rocket_clean_exclude_file( get_template_directory_uri() . '/library/js/min/init.min.js' );
		$excluded_js[] = rocket_clean_exclude_file( get_template_directory_uri() . '/library/js/ai-uncode.js' );
		$excluded_js[] = rocket_clean_exclude_file( get_template_directory_uri() . '/library/js/min/ai-uncode.min.js' );

		return $excluded_js;
	}
	add_filter( 'rocket_exclude_js', 'rocket_exclude_js_uncode' );

	/**
	 * Excludes some Uncode inline scripts from combine JS
	 *
	 * @since 3.1
	 * @author Remy Perona
	 *
	 * @param array $inline_js Array of patterns to match for exclusion.
	 * @return array
	 */
	function rocket_exclude_inline_js_uncode( $inline_js ) {
		$inline_js[] = 'SiteParameters';
		$inline_js[] = 'script-';
		$inline_js[] = 'initBox';

		return $inline_js;
	}
	add_filter( 'rocket_excluded_inline_js_content', 'rocket_exclude_inline_js_uncode' );
}
