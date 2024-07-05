<?php

    function techiepress_theme_setup(){
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('custom-background');
        add_theme_support('custom-header',array(
            'flex-width'    => true,
            'width'         => 1200,
            'flex-height'   => true,
            'height'        => 300,
            'default-image' => get_template_directory_uri().'/assets/imgs/header.jpg',
        ));
        add_theme_support('automatic-feed-links');
        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support('custom-logo',array(
            'height'        => 50,
            'width'         => 50,
            'flex-height'   => true,
            'flex-width'    => true,
            'header-text'   => array('site-title','site-description'),
        ));
        add_theme_support('html5',array('comment-list','comment-form','search-form','gallery','caption','style','script'));
    }
    add_action('after_setup_theme','techiepress_theme_setup');


    // enqueue scripts and styles
    add_action('wp_enqueue_scripts','add_scripts');

    function add_scripts(){
        // add fonts
        wp_enqueue_style('new-zealand-font','https://fonts.googleapis.com/css2?family=Playwrite+NZ:wght@100..400&display=swap');
        // add style files
        wp_enqueue_style('fontawsome','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css');
        wp_enqueue_style('bootstrap-css','https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css','','1.0.0','all');

        wp_enqueue_style('main-css',get_template_directory_uri().'style.css','','1.0.0','all');

        // add scripts files
        wp_enqueue_script('bootstrap-jquery','https://code.jquery.com/jquery-3.7.1.min.js',array(),false,true);
        wp_enqueue_script('popper','https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js',array('jquery'),false,true);
        wp_enqueue_script('bootstrap-js','https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js',array('jquery'),false,true);

        wp_enqueue_script('food-add-js',get_template_directory_uri().'/js/main.js',array('jquery'),false,true);


    }

    function mytheme_customize_register($wp_customize) {
        // Add a section in the Customizer
        $wp_customize->add_section('mytheme_custom_section', array(
            'title' => __('Upper Bar', 'mytheme'),
            'priority' => 30,
        ));

        // Add a setting to show/hide the section
        $wp_customize->add_setting('show_custom_section', array(
            'default' => 'yes',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        // Add a control to show/hide the section
        $wp_customize->add_control('show_custom_section_control', array(
            'label' => __('Show Upper Bar', 'mytheme'),
            'section' => 'mytheme_custom_section', // Your own section
            'settings' => 'show_custom_section',
            'type' => 'radio',
            'choices' => array(
                'yes' => __('Yes', 'mytheme'),
                'no' => __('No', 'mytheme'),
            ),
        ));

        // Add settings for the section content
        $wp_customize->add_setting('custom_section_heading', array(
            'default' => __('Default Heading', 'mytheme'),
            'sanitize_callback' => 'sanitize_text_field',
        ));


        // Add controls for the section content
        $wp_customize->add_control('custom_section_heading_control', array(
            'label' => __('Section Heading', 'mytheme'),
            'section' => 'mytheme_custom_section',
            'settings' => 'custom_section_heading',
            'type' => 'text',
        ));
        // add back color for navbar
        $wp_customize->add_setting( 'upper_bar_back_color', array(
            'default' => '#e0e722', // Default color
            'sanitize_callback' => 'sanitize_hex_color', // Sanitization callback
        ) );
    
        // Add back color control for navbar
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'upper_bar_back_color', array(
            'label' => __( 'Upper Bar Back Color', 'myTheme' ),
            'section' => 'mytheme_custom_section',
            'settings' => 'upper_bar_back_color',
            'type'  => 'color'
        ) ) );
        // add color for navbar
        $wp_customize->add_setting( 'upper_bar_color', array(
            'default' => '#000000', // Default color
            'sanitize_callback' => 'sanitize_hex_color', // Sanitization callback
        ) );
    
        // Add color control for navbar
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'upper_bar_color', array(
            'label' => __( 'Upper Bar Color', 'myTheme' ),
            'section' => 'mytheme_custom_section',
            'settings' => 'upper_bar_color',
            'type'  => 'color'
        ) ) );

}

add_action('customize_register', 'mytheme_customize_register');
