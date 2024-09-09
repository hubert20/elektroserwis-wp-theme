<?php


function elektroserwis_wp_theme_customize_register($wp_customize)
{
    // Add control for logo uploader
    $wp_customize->add_setting('elektroserwis_wp_theme_logo', array(
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'elektroserwis_wp_theme_logo', array(
        'label'    => __('Upload Logo (replaces text)', 'elektroserwis-wp-theme'),
        'section'  => 'title_tagline',
        'settings' => 'elektroserwis_wp_theme_logo',
    )));
}

add_action('customize_register', 'elektroserwis_wp_theme_customize_register');

