<?php

function ava_block_category( $categories, $post ) {
    return array_merge(
        $categories,
        [
            [
                'slug'  => 'ava_block_category',
                'title' => __( 'Custom Blocks', 'keen_block' ),
            ],
        ]
    );
} add_filter( 'block_categories', 'ava_block_category', 10, 2);
