<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

function meetpure_event_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'event_id' => '',
    ), $atts, 'meetpure_event' );

    if ( empty( $atts['event_id'] ) ) {
        return 'Please provide an event ID.';
    }

    $event_data = meetpure_get_event_data( $atts['event_id'] );

    if ( is_wp_error( $event_data ) ) {
        return $event_data->get_error_message();
    }

    ob_start();
    include MEETPURE_EVENTS_PLUGIN_DIR . 'templates/event-template.php';
    return ob_get_clean();
}
add_shortcode( 'meetpure_event', 'meetpure_event_shortcode' );

function meetpure_get_event_data( $event_id ) {
    // In the future, this will make an API call to MeetPure.
    // For now, we'll use dummy data based on the swagger.yaml file.

    $dummy_data = array(
        'id' => 'evt_1234567890abcdef',
        'title' => 'Tech Meetup: AI in Healthcare',
        'description' => 'Join us for an insightful discussion about AI applications in healthcare',
        'kind' => 'simple',
        'status' => 'published',
        'starts_at' => '2024-02-15T19:00:00Z',
        'ends_at' => '2024-02-15T21:00:00Z',
        'timezone' => 'America/New_York',
        'organizer' => array(
            'name' => 'John Doe',
            'team_name' => 'Tech Innovators',
        ),
        'location' => array(
            'onsite' => true,
            'onsite_tba' => false,
            'onsite_instructions' => 'Building entrance on Main Street',
            'online' => false,
        ),
        'images' => array(
            array(
                'id' => 1,
                'is_cover' => true,
                'url' => 'https://via.placeholder.com/600x200',
                'filename' => 'event-cover.jpg',
            ),
        ),
        'speakers' => array(
            array(
                'id' => 1,
                'name' => 'Dr. Jane Smith',
                'title' => 'AI Research Director',
                'profile_image_url' => 'https://via.placeholder.com/150',
            ),
        ),
    );

    return $dummy_data;
}
