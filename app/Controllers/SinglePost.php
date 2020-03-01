<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class SinglePost extends Controller
{
    public function prev_next_post()
    {
        $nextPostID = get_next_post()->ID;
        $prevPostID = get_previous_post()->ID;

        $prevNextPost = [];

        $prevNextPost[ 'prev' ][ 'prevTitle' ]    = get_the_title( $prevPostID );
        $prevNextPost[ 'prev' ][ 'prevLink' ]     = get_the_permalink( $prevPostID );
        $thumb                                    = get_the_post_thumbnail_url( $prevPostID );
        $prevNextPost[ 'prev' ][ 'prevThumb' ]    = aq_resize( $thumb, 65, 65, true, true, true );
        $prevExcerpt                              = get_the_excerpt( $prevPostID );
        $prevNextPost[ 'prev' ][ 'prevExcerpt' ]  = mb_substr( $prevExcerpt, 0, 50 );

        $prevNextPost[ 'next' ][ 'nextTitle' ]    = get_the_title( $nextPostID );
        $prevNextPost[ 'next' ][ 'nextLink' ]     = get_the_permalink( $nextPostID );
        $thumb                                    = get_the_post_thumbnail_url( $nextPostID );
        $prevNextPost[ 'next' ][ 'nextThumb' ]    = aq_resize( $thumb, 65, 65, true, true, true );
        $nextExcerpt                              = get_the_excerpt( $nextPostID );
        $prevNextPost[ 'next' ][ 'nextExcerpt' ]  = mb_substr( $nextExcerpt, 0, 50 );

        return $prevNextPost;
    }
}
