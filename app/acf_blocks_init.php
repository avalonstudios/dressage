<?php

function keen_block_category( $categories, $post ) {
    return array_merge(
        $categories,
        [
            [
                'slug'  => 'keen_block_category',
                'title' => __( 'Custom Blocks', 'keen_block' ),
            ],
        ]
    );
} add_filter( 'block_categories', 'keen_block_category', 10, 2);
