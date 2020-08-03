<?php
/**
 * Plugin Name: My ACF Blocks
 * Description: Add custom Gutenberg blocks using ACF
 * Version: 1.0.0
 */

function mab_register_acf_block_types() {
    acf_register_block_type( [
        'name'            => 'omicron-table',
        'title'           => __( 'Omicron Table' ),
        'description'     => __( 'My Omicron Table' ),
        'render_template' => '/parts/blocks/content-table.php',
        'category'        => 'layout',
        'icon'            => 'grid-view',
    ] );
}

if ( function_exists( 'acf_register_block_type' ) ) {
    add_action( 'acf/init', 'mab_register_acf_block_types' );
}