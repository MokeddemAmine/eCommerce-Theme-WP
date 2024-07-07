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

        wp_enqueue_style('main-css',get_template_directory_uri().'/style.css','','1.0.0','all');

        // add scripts files
        wp_enqueue_script('bootstrap-jquery','https://code.jquery.com/jquery-3.7.1.min.js',array(),false,true);
        wp_enqueue_script('popper','https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js',array('bootstrap-jquery'),false,true);
        wp_enqueue_script('bootstrap-js','https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js',array('bootstrap-jquery'),false,true);

        wp_enqueue_script('main-js',get_template_directory_uri().'/js/main.js',array('jquery'),false,true);


    }

    function mytheme_customize_register($wp_customize) {
        // Header Image Section

                $wp_customize->add_section('header_settings', array(
                    'title'    => __('Header Settings', 'mytheme'),
                    'priority' => 30,
                ));
            
                // Add Setting for Show/Hide Content
                $wp_customize->add_setting('header_show_content', array(
                    'default'           => 'show',
                    'sanitize_callback' => 'sanitize_text_field',
                    'capability'        => 'edit_theme_options',
                ));
            
                // Add Control for Show/Hide Content
                $wp_customize->add_control('header_show_content', array(
                    'label'    => __('Show Content', 'mytheme'),
                    'section'  => 'header_settings',
                    'type'     => 'radio',
                    'choices'  => array(
                        'show' => __('Show', 'mytheme'),
                        'hide' => __('Hide', 'mytheme'),
                    ),
                ));

                // Add Setting for Category Link
                $wp_customize->add_setting('header_image_link', array(
                    'default'           => '',
                    'sanitize_callback' => 'absint', // Store the category ID as an integer
                    'capability'        => 'edit_theme_options',
                ));

                // Add Control for Category Link
                $wp_customize->add_control(new WP_Customize_Category_Control($wp_customize, 'header_image_link', array(
                    'label'    => __('Header Image Category link', 'mytheme'),
                    'section'  => 'header_settings',
                    'settings' => 'header_image_link',
                )));

        // Upper Bar Section 

            // create section
            $wp_customize->add_section('upper_bar_section', array(
                'title' => __('Upper Bar', 'mytheme'),
                'priority' => 30,
            ));

            // Add a setting to show/hide the upper bar section
            $wp_customize->add_setting('show_custom_section', array(
                'default' => 'yes',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            // Add a control to show/hide the upper bar section
            $wp_customize->add_control('show_custom_section_control', array(
                'label' => __('Show Upper Bar', 'mytheme'),
                'section' => 'upper_bar_section',
                'settings' => 'show_custom_section',
                'type' => 'radio',
                'choices' => array(
                    'yes' => __('Yes', 'mytheme'),
                    'no' => __('No', 'mytheme'),
                ),
            ));

            // Add settings for the heading section content
            $wp_customize->add_setting('custom_section_heading', array(
                'default' => __('Default Heading', 'mytheme'),
                'sanitize_callback' => 'sanitize_text_field',
            ));


            // Add controls for the heading section content
            $wp_customize->add_control('custom_section_heading_control', array(
                'label' => __('Section Heading', 'mytheme'),
                'section' => 'upper_bar_section',
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
                'section' => 'upper_bar_section',
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
                'section' => 'upper_bar_section',
                'settings' => 'upper_bar_color',
                'type'  => 'color'
            ) ) );

        ///////////////////////////////////////
        //////////////////////////////////////

        // add section for front-page Gallery
        // create the section
            $wp_customize->add_section('front-page', array(
                'title'    => __('Front Page', 'mytheme'),
                'priority' => 30,
            ));
        
            // section 1
                // Add Setting for Image
                $wp_customize->add_setting('image_section_1_1', array(
                    'default'           => '',
                    'sanitize_callback' => 'esc_url_raw',
                    'capability'        => 'edit_theme_options',
                ));
            
                // Add Control for Image Upload
                $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'image_section_1_1', array(
                    'label'    => __('Section 1 _ 1', 'mytheme'),
                    'section'  => 'front-page',
                    'settings' => 'image_section_1_1',
                )));

                $wp_customize->add_setting('image_section_1_1_category_link', array(
                    'default'           => '',
                    'sanitize_callback' => 'absint', // Store the category ID as an integer
                    'capability'        => 'edit_theme_options',
                ));
            
                // Add Control for Category Link
                $wp_customize->add_control(new WP_Customize_Category_Control($wp_customize, 'image_section_1_1_category_link', array(
                    'label'    => __('Link of Section 1 _ 1', 'mytheme'),
                    'section'  => 'front-page',
                    'settings' => 'image_section_1_1_category_link',
                )));
                // Add Setting for Image
                $wp_customize->add_setting('image_section_1_2', array(
                    'default'           => '',
                    'sanitize_callback' => 'esc_url_raw',
                    'capability'        => 'edit_theme_options',
                ));
            
                // Add Control for Image Upload
                $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'image_section_1_2', array(
                    'label'    => __('Section 1 _ 2', 'mytheme'),
                    'section'  => 'front-page',
                    'settings' => 'image_section_1_2',
                )));

                $wp_customize->add_setting('image_section_1_2_category_link', array(
                    'default'           => '',
                    'sanitize_callback' => 'absint', // Store the category ID as an integer
                    'capability'        => 'edit_theme_options',
                ));
            
                // Add Control for Category Link
                $wp_customize->add_control(new WP_Customize_Category_Control($wp_customize, 'image_section_1_2_category_link', array(
                    'label'    => __('Link of Section 1 _ 2', 'mytheme'),
                    'section'  => 'front-page',
                    'settings' => 'image_section_1_2_category_link',
                )));
        
            // section 2
                // Add Setting for Image
                $wp_customize->add_setting('image_section_2', array(
                    'default'           => '',
                    'sanitize_callback' => 'esc_url_raw',
                    'capability'        => 'edit_theme_options',
                ));
            
                // Add Control for Image Upload
                $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'image_section_2', array(
                    'label'    => __('Section 2', 'mytheme'),
                    'section'  => 'front-page',
                    'settings' => 'image_section_2',
                )));

                // Add Setting for Category Link
                $wp_customize->add_setting('image_section_2_category_link', array(
                    'default'           => '',
                    'sanitize_callback' => 'absint', // Store the category ID as an integer
                    'capability'        => 'edit_theme_options',
                ));

                // Add Control for Category Link
                $wp_customize->add_control(new WP_Customize_Category_Control($wp_customize, 'image_section_2_category_link', array(
                    'label'    => __('Link of Section 2', 'mytheme'),
                    'section'  => 'front-page',
                    'settings' => 'image_section_2_category_link',
                )));

            // section 3

                // section 3.1

                    // Add Setting for Image
                    $wp_customize->add_setting('image_section_3_1', array(
                        'default'           => '',
                        'sanitize_callback' => 'esc_url_raw',
                        'capability'        => 'edit_theme_options',
                    ));

                    // Add Control for Image Upload
                    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'image_section_3_1', array(
                        'label'    => __('Section 3 _ 1', 'mytheme'),
                        'section'  => 'front-page',
                        'settings' => 'image_section_3_1',
                    )));

                    // Add Setting for Category Link
                    $wp_customize->add_setting('image_section_3_1_category_link', array(
                        'default'           => '',
                        'sanitize_callback' => 'absint', // Store the category ID as an integer
                        'capability'        => 'edit_theme_options',
                    ));

                    // Add Control for Category Link
                    $wp_customize->add_control(new WP_Customize_Category_Control($wp_customize, 'image_section_3_1_category_link', array(
                        'label'    => __('Link of Section 3 _ 1', 'mytheme'),
                        'section'  => 'front-page',
                        'settings' => 'image_section_3_1_category_link',
                    )));
                    $wp_customize->add_setting('section_3_1_heading', array(
                            'default' => __('Title', 'mytheme'),
                            'sanitize_callback' => 'sanitize_text_field',
                        ));


                    // Add controls for the section content
                    $wp_customize->add_control('section_3_1_heading_control', array(
                        'label' => __('Title Section 3_1', 'mytheme'),
                        'section' => 'front-page',
                        'settings' => 'section_3_1_heading',
                        'type' => 'text',
                    ));

                // section 3.2

                    // Add Setting for Image
                    $wp_customize->add_setting('image_section_3_2', array(
                        'default'           => '',
                        'sanitize_callback' => 'esc_url_raw',
                        'capability'        => 'edit_theme_options',
                    ));

                    // Add Control for Image Upload
                    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'image_section_3_2', array(
                        'label'    => __('Section 3 _ 2', 'mytheme'),
                        'section'  => 'front-page',
                        'settings' => 'image_section_3_2',
                    )));

                    // Add Setting for Category Link
                    $wp_customize->add_setting('image_section_3_2_category_link', array(
                        'default'           => '',
                        'sanitize_callback' => 'absint', // Store the category ID as an integer
                        'capability'        => 'edit_theme_options',
                    ));

                    // Add Control for Category Link
                    $wp_customize->add_control(new WP_Customize_Category_Control($wp_customize, 'image_section_3_2_category_link', array(
                        'label'    => __('Link of Section 3 _ 2', 'mytheme'),
                        'section'  => 'front-page',
                        'settings' => 'image_section_3_2_category_link',
                    )));
                    $wp_customize->add_setting('section_3_2_heading', array(
                        'default' => __('Title', 'mytheme'),
                        'sanitize_callback' => 'sanitize_text_field',
                    ));


                    // Add controls for the section content
                    $wp_customize->add_control('section_3_2_heading_control', array(
                        'label' => __('Title Section 3_2', 'mytheme'),
                        'section' => 'front-page',
                        'settings' => 'section_3_2_heading',
                        'type' => 'text',
                    ));

                // section 3.3

                    // Add Setting for Image
                    $wp_customize->add_setting('image_section_3_3', array(
                        'default'           => '',
                        'sanitize_callback' => 'esc_url_raw',
                        'capability'        => 'edit_theme_options',
                    ));

                    // Add Control for Image Upload
                    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'image_section_3_3', array(
                        'label'    => __('Section 3 _ 3', 'mytheme'),
                        'section'  => 'front-page',
                        'settings' => 'image_section_3_3',
                    )));

                    // Add Setting for Category Link
                    $wp_customize->add_setting('image_section_3_3_category_link', array(
                        'default'           => '',
                        'sanitize_callback' => 'absint', // Store the category ID as an integer
                        'capability'        => 'edit_theme_options',
                    ));

                    // Add Control for Category Link
                    $wp_customize->add_control(new WP_Customize_Category_Control($wp_customize, 'image_section_3_3_category_link', array(
                        'label'    => __('Link of Section 3 _ 3', 'mytheme'),
                        'section'  => 'front-page',
                        'settings' => 'image_section_3_3_category_link',
                    )));

                    $wp_customize->add_setting('section_3_3_heading', array(
                        'default' => __('Title', 'mytheme'),
                        'sanitize_callback' => 'sanitize_text_field',
                    ));


                    // Add controls for the section content
                    $wp_customize->add_control('section_3_3_heading_control', array(
                        'label' => __('Title Section 3_3', 'mytheme'),
                        'section' => 'front-page',
                        'settings' => 'section_3_3_heading',
                        'type' => 'text',
                    ));

                // section 3.4

                    // Add Setting for Image
                    $wp_customize->add_setting('image_section_3_4', array(
                        'default'           => '',
                        'sanitize_callback' => 'esc_url_raw',
                        'capability'        => 'edit_theme_options',
                    ));

                    // Add Control for Image Upload
                    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'image_section_3_4', array(
                        'label'    => __('Section 3 _ 4', 'mytheme'),
                        'section'  => 'front-page',
                        'settings' => 'image_section_3_4',
                    )));

                    // Add Setting for Category Link
                    $wp_customize->add_setting('image_section_3_4_category_link', array(
                        'default'           => '',
                        'sanitize_callback' => 'absint', // Store the category ID as an integer
                        'capability'        => 'edit_theme_options',
                    ));

                    // Add Control for Category Link
                    $wp_customize->add_control(new WP_Customize_Category_Control($wp_customize, 'image_section_3_4_category_link', array(
                        'label'    => __('Link of Section 3 _ 4', 'mytheme'),
                        'section'  => 'front-page',
                        'settings' => 'image_section_3_4_category_link',
                    )));

                    $wp_customize->add_setting('section_3_4_heading', array(
                        'default' => __('Title', 'mytheme'),
                        'sanitize_callback' => 'sanitize_text_field',
                    ));


                    // Add controls for the section content
                    $wp_customize->add_control('section_3_4_heading_control', array(
                        'label' => __('Title Section 3_4', 'mytheme'),
                        'section' => 'front-page',
                        'settings' => 'section_3_4_heading',
                        'type' => 'text',
                    ));


}

add_action('customize_register', 'mytheme_customize_register');

if (class_exists('WP_Customize_Control')) {
    class WP_Customize_Category_Control extends WP_Customize_Control {
        public $type = 'dropdown-categories';

        public function render_content() {
            $dropdown = wp_dropdown_categories(
                array(
                    'name'              => '_customize-dropdown-categories-' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => __('&mdash; Select &mdash;'),
                    'option_none_value' => '0',
                    'selected'          => $this->value(),
                    'hide_empty'        => 0, // Show all categories including empty ones
                )
            );

            // Add the data link parameter to the select
            $dropdown = str_replace('<select', '<select ' . $this->get_link(), $dropdown);

            printf(
                '<label class="customize-control-select">%s<br />%s</label>',
                esc_html($this->label),
                $dropdown
            );
        }
    }
}


