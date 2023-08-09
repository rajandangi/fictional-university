<?php

add_action('rest_api_init', 'universityRegisterSearch');
function universityRegisterSearch()
{
    // WP_REST_SERVER::READABLE is a Wordpress constant for GET method
    register_rest_route(
        'university/v1',
        'search',
        array(
            'methods' => WP_REST_SERVER::READABLE,
            'callback' => 'universitySearchResults'
        )
    );
}

function universitySearchResults(){
    return 'Congrats, you created a route';
}