<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! defined( 'WP_B__SLUG' ) ) {
    define( 'WP_B__SLUG', 'bblocksdk' );
}

if ( ! defined( 'WP_B__DIR' ) ) {
    define( 'WP_B__DIR', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'WP_B__CONFIG' ) ) {
    define( 'WP_B__CONFIG', [
        'prefix' => '',
        'permalinks' => [],
        'features' => [
            'license' => false,
            'optIn' => false
        ]
    ] );
}



  