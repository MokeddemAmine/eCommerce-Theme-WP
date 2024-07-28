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
        // Upper Bar Section 

            // create section
            $wp_customize->add_section('upper_bar_section', array(
                'title' => __('BB Upper Bar', 'mytheme'),
                'priority' => 200,
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
            // add back color for upperbar
            $wp_customize->add_setting( 'upper_bar_back_color', array(
                'default' => '#e0e722', // Default color
                'sanitize_callback' => 'sanitize_hex_color', // Sanitization callback
            ) );
        
            // Add back color control for upperbar
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'upper_bar_back_color', array(
                'label' => __( 'Upper Bar Back Color', 'myTheme' ),
                'section' => 'upper_bar_section',
                'settings' => 'upper_bar_back_color',
                'type'  => 'color'
            ) ) );
            // add color for upperbar
            $wp_customize->add_setting( 'upper_bar_color', array(
                'default' => '#000000', // Default color
                'sanitize_callback' => 'sanitize_hex_color', // Sanitization callback
            ) );
        
            // Add color control for upperbar
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'upper_bar_color', array(
                'label' => __( 'Upper Bar Color', 'myTheme' ),
                'section' => 'upper_bar_section',
                'settings' => 'upper_bar_color',
                'type'  => 'color'
            ) ) );

        /////////////////////////////
        // Header Section

                $wp_customize->add_section('header_settings', array(
                    'title'    => __('BB Header Settings', 'mytheme'),
                    'priority' => 201,
                ));
                // add back color for header
                $wp_customize->add_setting( 'header_back_color', array(
                    'default' => '#f8f9fa', // Default color
                    'sanitize_callback' => 'sanitize_hex_color', // Sanitization callback
                ) );
            
                // Add back color control for header
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_back_color', array(
                    'label' => __( 'Header Back Color', 'myTheme' ),
                    'section' => 'header_settings',
                    'settings' => 'header_back_color',
                    'type'  => 'color'
                ) ) );

                // add color for header title
                $wp_customize->add_setting( 'header_title_color', array(
                    'default' => '#000000', // Default color
                    'sanitize_callback' => 'sanitize_hex_color', // Sanitization callback
                ) );
            
                // Add color control for header title
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_title_color', array(
                    'label' => __( 'Header Title Color', 'myTheme' ),
                    'section' => 'header_settings',
                    'settings' => 'header_title_color',
                    'type'  => 'color'
                ) ) );

                // add color for header
                $wp_customize->add_setting( 'header_color', array(
                    'default' => '#000000', // Default color
                    'sanitize_callback' => 'sanitize_hex_color', // Sanitization callback
                ) );
            
                // Add color control for header
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_color', array(
                    'label' => __( 'Header Color', 'myTheme' ),
                    'section' => 'header_settings',
                    'settings' => 'header_color',
                    'type'  => 'color'
                ) ) );

                // add color for icons in header
                $wp_customize->add_setting( 'header_icons_color', array(
                    'default' => '#000000', // Default color
                    'sanitize_callback' => 'sanitize_hex_color', // Sanitization callback
                ) );
            
                // Add color control for icons in header
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_icons_color', array(
                    'label' => __( 'Header Icons Color', 'myTheme' ),
                    'section' => 'header_settings',
                    'settings' => 'header_icons_color',
                    'type'  => 'color'
                ) ) );
            
                // Add Setting for Show/Hide Content
                $wp_customize->add_setting('header_show_content', array(
                    'default'           => 'show',
                    'sanitize_callback' => 'sanitize_text_field',
                    'capability'        => 'edit_theme_options',
                ));
            
                // Add Control for Show/Hide Content
                $wp_customize->add_control('header_show_content', array(
                    'label'    => __('Show Shop Now Button', 'mytheme'),
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

        // add section for front-page Gallery

        $wp_customize->add_section('front-page', array(
            'title'    => __('BB Front Page', 'mytheme'),
            'priority' => 202,
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


        ///////////////////////////////////////
        //  Add Body Section
            $wp_customize->add_section('body_settings', array(
                'title'    => __('BB Body Settings', 'mytheme'),
                'priority' => 203,
            ));

            // add back color for body
            $wp_customize->add_setting( 'body_back_color', array(
                'default' => '#ffffff', // Default color
                'sanitize_callback' => 'sanitize_hex_color', // Sanitization callback
            ) );
        
            // Add back color control for body
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_back_color', array(
                'label' => __( 'Body Back Color', 'myTheme' ),
                'section' => 'body_settings',
                'settings' => 'body_back_color',
                'type'  => 'color'
            ) ) );

            // add color for main heading
            $wp_customize->add_setting( 'body_main_heading_color', array(
                'default' => '#6c757d', // Default color
                'sanitize_callback' => 'sanitize_hex_color', // Sanitization callback
            ) );
        
            // Add color control for main heading
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_main_heading_color', array(
                'label' => __( 'Main Heading Color', 'myTheme' ),
                'section' => 'body_settings',
                'settings' => 'body_main_heading_color',
                'type'  => 'color'
            ) ) );

            // add color for buttons color
            $wp_customize->add_setting( 'button_color', array(
                'default' => '#000000', // Default color
                'sanitize_callback' => 'sanitize_hex_color', // Sanitization callback
            ) );
        
            // Add color control for buttons color
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_color', array(
                'label' => __( 'Button Color', 'myTheme' ),
                'section' => 'body_settings',
                'settings' => 'button_color',
                'type'  => 'color'
            ) ) );
            // add color for Buttons background
            $wp_customize->add_setting( 'button_back_color', array(
                'default' => '#ffffff', // Default color
                'sanitize_callback' => 'sanitize_hex_color', // Sanitization callback
            ) );
        
            // Add color control for Buttons background
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_back_color', array(
                'label' => __( 'Button Back Color', 'myTheme' ),
                'section' => 'body_settings',
                'settings' => 'button_back_color',
                'type'  => 'color'
            ) ) );
            // add color for button when hover
            $wp_customize->add_setting( 'button_hover_color', array(
                'default' => '#ffffff', // Default color
                'sanitize_callback' => 'sanitize_hex_color', // Sanitization callback
            ) );
        
            // Add color control for button when hover
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_hover_color', array(
                'label' => __( 'Button Hover Color', 'myTheme' ),
                'section' => 'body_settings',
                'settings' => 'button_hover_color',
                'type'  => 'color'
            ) ) );
            // add color for background button when hover
            $wp_customize->add_setting( 'button_hover_back_color', array(
                'default' => '#e0e722', // Default color
                'sanitize_callback' => 'sanitize_hex_color', // Sanitization callback
            ) );
        
            // Add color control for background button when hover
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_hover__backcolor', array(
                'label' => __('Btn Border & Hover Back Color', 'myTheme' ),
                'section' => 'body_settings',
                'settings' => 'button_hover_back_color',
                'type'  => 'color'
            ) ) );

        //////////////////////////////////////
        // Add Filter aside section

            $wp_customize->add_section('filter_aside_settings', array(
                'title'    => __('BB Filter Aside', 'mytheme'),
                'priority' => 203,
            ));

            // Add Setting for Show/Hide Content
            $wp_customize->add_setting('ordering_show', array(
                'default'           => 'left',
                'sanitize_callback' => 'sanitize_text_field',
                'capability'        => 'edit_theme_options',
            ));
        
            // Add Control for Show/Hide Content
            $wp_customize->add_control('ordering_show', array(
                'label'    => __('Show Ordering btn', 'mytheme'),
                'section'  => 'filter_aside_settings',
                'type'     => 'radio',
                'choices'  => array(
                    'left' => __('left', 'mytheme'),
                    'center' => __('center', 'mytheme'),
                    'right' => __('right', 'mytheme'),
                ),
            ));
            // add color for background aside filter 
            $wp_customize->add_setting( 'filter_back_color', array(
                'default' => '#ffffff', // Default color
                'sanitize_callback' => 'sanitize_hex_color', // Sanitization callback
            ) );
        
            // Add color control for background aside filter 
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'filter_back_color', array(
                'label' => __('Btn Border & Hover Back Color', 'myTheme' ),
                'section' => 'body_settings',
                'settings' => 'filter_back_color',
                'type'  => 'color'
            ) ) );
        //////////////////////////////////////
        // add settings for footer
            // create footer settings 1
                
            
                // Custom control to select categories, pages, and products
                class WP_Customize_Choose_Content_Control extends WP_Customize_Control {
                    public $type = 'choose_content';
                
                    public function render_content() {
                        $categories = get_terms(array(
                            'taxonomy' => 'product_cat',
                            'hide_empty' => false,
                        ));
                        $pages = get_pages();
                        $products = wc_get_products(array('status' => 'publish'));
                
                        ?>
                        <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                        <select <?php $this->link(); ?>>
                            <option value=""><?php _e('None', 'theme'); ?></option>
                            <optgroup label="Categories">
                                <?php foreach ($categories as $category) : ?>
                                    <option value="category_<?php echo $category->term_id; ?>"><?php echo $category->name; ?></option>
                                <?php endforeach; ?>
                            </optgroup>
                            <optgroup label="Pages">
                                <?php foreach ($pages as $page) : ?>
                                    <option value="page_<?php echo $page->ID; ?>"><?php echo $page->post_title; ?></option>
                                <?php endforeach; ?>
                            </optgroup>
                            <optgroup label="Products">
                                <?php foreach ($products as $product) : ?>
                                    <option value="product_<?php echo $product->get_id(); ?>"><?php echo $product->get_name(); ?></option>
                                <?php endforeach; ?>
                            </optgroup>
                        </select>
                        <script>
                            ( function( $ ) {
                                <?php foreach ($categories as $category) : ?>
                                    wp.customize('<?php echo $this->id; ?>').controls[0].container.find('option[value="category_<?php echo $category->term_id; ?>"]').data('link', '<?php echo get_term_link($category); ?>');
                                <?php endforeach; ?>
                
                                <?php foreach ($pages as $page) : ?>
                                    wp.customize('<?php echo $this->id; ?>').controls[0].container.find('option[value="page_<?php echo $page->ID; ?>"]').data('link', '<?php echo get_permalink($page->ID); ?>');
                                <?php endforeach; ?>
                
                                <?php foreach ($products as $product) : ?>
                                    wp.customize('<?php echo $this->id; ?>').controls[0].container.find('option[value="product_<?php echo $product->get_id(); ?>"]').data('link', '<?php echo $product->get_permalink(); ?>');
                                <?php endforeach; ?>
                            } )( jQuery );
                        </script>
                        <?php
                    }
                }
                
                

                $wp_customize->add_section('footer_settings_1', array(
                    'title'    => __('BB Footer Sections', 'mytheme'),
                    'priority' => 204,
                ));

                // heading 1
                $wp_customize->add_setting('footer_heading_1', array(
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field',
                ));
            
                $wp_customize->add_control('footer_heading_1', array(
                    'label' => __('Footer Heading 1', 'theme'),
                    'section' => 'footer_settings_1',
                    'type' => 'text',
                ));

                // links of heading 2
                $wp_customize->add_setting('footer_link_1_1', array(
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field',
                ));
            
                $wp_customize->add_control(new WP_Customize_Choose_Content_Control($wp_customize, 'footer_link_1_1', array(
                    'label' => __('Section 1 Link 1', 'theme'),
                    'section' => 'footer_settings_1',
                )));
                $wp_customize->add_setting('footer_link_1_2', array(
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field',
                ));
            
                $wp_customize->add_control(new WP_Customize_Choose_Content_Control($wp_customize, 'footer_link_1_2', array(
                    'label' => __('Section 1 Link 2', 'theme'),
                    'section' => 'footer_settings_1',
                )));
                $wp_customize->add_setting('footer_link_1_3', array(
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field',
                ));
            
                $wp_customize->add_control(new WP_Customize_Choose_Content_Control($wp_customize, 'footer_link_1_3', array(
                    'label' => __('Section 1 Link 3', 'theme'),
                    'section' => 'footer_settings_1',
                )));
                $wp_customize->add_setting('footer_link_1_4', array(
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field',
                ));
            
                $wp_customize->add_control(new WP_Customize_Choose_Content_Control($wp_customize, 'footer_link_1_4', array(
                    'label' => __('Section 1 Link 4', 'theme'),
                    'section' => 'footer_settings_1',
                )));
                $wp_customize->add_setting('footer_link_1_5', array(
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field',
                ));
            
                $wp_customize->add_control(new WP_Customize_Choose_Content_Control($wp_customize, 'footer_link_1_5', array(
                    'label' => __('Section 1 Link 5', 'theme'),
                    'section' => 'footer_settings_1',
                )));

                // footer heading 2
                $wp_customize->add_setting('footer_heading_2', array(
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field',
                ));
            
                $wp_customize->add_control('footer_heading_2', array(
                    'label' => __('Footer Heading 2', 'theme'),
                    'section' => 'footer_settings_1',
                    'type' => 'text',
                ));
                // links of heading 2
                $wp_customize->add_setting('footer_link_2_1', array(
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field',
                ));
            
                $wp_customize->add_control(new WP_Customize_Choose_Content_Control($wp_customize, 'footer_link_2_1', array(
                    'label' => __('Section 2 Link 1', 'theme'),
                    'section' => 'footer_settings_1',
                )));
                $wp_customize->add_setting('footer_link_2_2', array(
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field',
                ));
            
                $wp_customize->add_control(new WP_Customize_Choose_Content_Control($wp_customize, 'footer_link_2_2', array(
                    'label' => __('Section 2 Link 2', 'theme'),
                    'section' => 'footer_settings_1',
                )));
                $wp_customize->add_setting('footer_link_2_3', array(
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field',
                ));
            
                $wp_customize->add_control(new WP_Customize_Choose_Content_Control($wp_customize, 'footer_link_2_3', array(
                    'label' => __('Section 2 Link 3', 'theme'),
                    'section' => 'footer_settings_1',
                )));
                $wp_customize->add_setting('footer_link_2_4', array(
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field',
                ));
            
                $wp_customize->add_control(new WP_Customize_Choose_Content_Control($wp_customize, 'footer_link_2_4', array(
                    'label' => __('Section 2 Link 4', 'theme'),
                    'section' => 'footer_settings_1',
                )));
                $wp_customize->add_setting('footer_link_2_5', array(
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field',
                ));
            
                $wp_customize->add_control(new WP_Customize_Choose_Content_Control($wp_customize, 'footer_link_2_5', array(
                    'label' => __('Section 2 Link 5', 'theme'),
                    'section' => 'footer_settings_1',
                )));

                // footer heading 3
                $wp_customize->add_setting('footer_heading_3', array(
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field',
                ));
            
                $wp_customize->add_control('footer_heading_3', array(
                    'label' => __('Footer Heading 3', 'theme'),
                    'section' => 'footer_settings_1',
                    'type' => 'text',
                ));
                // links of heading 3
                $wp_customize->add_setting('footer_link_3_1', array(
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field',
                ));
            
                $wp_customize->add_control(new WP_Customize_Choose_Content_Control($wp_customize, 'footer_link_3_1', array(
                    'label' => __('Section 3 Link 1', 'theme'),
                    'section' => 'footer_settings_1',
                )));
                $wp_customize->add_setting('footer_link_3_2', array(
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field',
                ));
            
                $wp_customize->add_control(new WP_Customize_Choose_Content_Control($wp_customize, 'footer_link_3_2', array(
                    'label' => __('Section 3 Link 2', 'theme'),
                    'section' => 'footer_settings_1',
                )));
                $wp_customize->add_setting('footer_link_3_3', array(
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field',
                ));
            
                $wp_customize->add_control(new WP_Customize_Choose_Content_Control($wp_customize, 'footer_link_3_3', array(
                    'label' => __('Section 3 Link 3', 'theme'),
                    'section' => 'footer_settings_1',
                )));
                $wp_customize->add_setting('footer_link_3_4', array(
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field',
                ));
            
                $wp_customize->add_control(new WP_Customize_Choose_Content_Control($wp_customize, 'footer_link_3_4', array(
                    'label' => __('Section 3 Link 4', 'theme'),
                    'section' => 'footer_settings_1',
                )));
                $wp_customize->add_setting('footer_link_3_5', array(
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field',
                ));
            
                $wp_customize->add_control(new WP_Customize_Choose_Content_Control($wp_customize, 'footer_link_3_5', array(
                    'label' => __('Section 3 Link 5', 'theme'),
                    'section' => 'footer_settings_1',
                )));

                // footer heading 4
                $wp_customize->add_setting('footer_heading_4', array(
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field',
                ));
            
                $wp_customize->add_control('footer_heading_4', array(
                    'label' => __('Footer Heading 4', 'theme'),
                    'section' => 'footer_settings_1',
                    'type' => 'text',
                ));
                // links of heading 4
                $wp_customize->add_setting('footer_link_4_1', array(
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field',
                ));
            
                $wp_customize->add_control(new WP_Customize_Choose_Content_Control($wp_customize, 'footer_link_4_1', array(
                    'label' => __('Section 4 Link 1', 'theme'),
                    'section' => 'footer_settings_1',
                )));
                $wp_customize->add_setting('footer_link_4_2', array(
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field',
                ));
            
                $wp_customize->add_control(new WP_Customize_Choose_Content_Control($wp_customize, 'footer_link_4_2', array(
                    'label' => __('Section 4 Link 2', 'theme'),
                    'section' => 'footer_settings_1',
                )));
                $wp_customize->add_setting('footer_link_4_3', array(
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field',
                ));
            
                $wp_customize->add_control(new WP_Customize_Choose_Content_Control($wp_customize, 'footer_link_4_3', array(
                    'label' => __('Section 4 Link 3', 'theme'),
                    'section' => 'footer_settings_1',
                )));
                $wp_customize->add_setting('footer_link_4_4', array(
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field',
                ));
            
                $wp_customize->add_control(new WP_Customize_Choose_Content_Control($wp_customize, 'footer_link_4_4', array(
                    'label' => __('Section 4 Link 4', 'theme'),
                    'section' => 'footer_settings_1',
                )));
                $wp_customize->add_setting('footer_link_4_5', array(
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field',
                ));
            
                $wp_customize->add_control(new WP_Customize_Choose_Content_Control($wp_customize, 'footer_link_4_5', array(
                    'label' => __('Section 4 Link 5', 'theme'),
                    'section' => 'footer_settings_1',
                )));

        // add settings for footer 
            // create the section
                // Add section for footer settings
                $wp_customize->add_section('footer_settings', array(
                    'title'    => __('BB Footer Settings', 'mytheme'),
                    'priority' => 205,
                ));

                // add back color for first footer
                $wp_customize->add_setting( 'footer_back_color', array(
                    'default' => '#f8f9fa', // Default color
                    'sanitize_callback' => 'sanitize_hex_color', // Sanitization callback
                ) );
            
                // Add back color control for first footer
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_back_color', array(
                    'label' => __( 'Footer Back Color', 'myTheme' ),
                    'section' => 'footer_settings',
                    'settings' => 'footer_back_color',
                    'type'  => 'color'
                ) ) );
                // add color for heading first footer
                $wp_customize->add_setting( 'footer_heading_color', array(
                    'default' => '#000000', // Default color
                    'sanitize_callback' => 'sanitize_hex_color', // Sanitization callback
                ) );
            
                // Add color control for heading first footer
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_heading_color', array(
                    'label' => __( 'Footer Headings Color', 'myTheme' ),
                    'section' => 'footer_settings',
                    'settings' => 'footer_heading_color',
                    'type'  => 'color'
                ) ) );
                // add color for links first footer
                $wp_customize->add_setting( 'footer_links_color', array(
                    'default' => '#000000', // Default color
                    'sanitize_callback' => 'sanitize_hex_color', // Sanitization callback
                ) );
            
                // Add color control for links first footer
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_links_color', array(
                    'label' => __( 'Footer Links Color', 'myTheme' ),
                    'section' => 'footer_settings',
                    'settings' => 'footer_links_color',
                    'type'  => 'color'
                ) ) );

                 // add back color for second footer
                 $wp_customize->add_setting( 'last_footer_back_color', array(
                    'default' => '#212529', // Default color
                    'sanitize_callback' => 'sanitize_hex_color', // Sanitization callback
                ) );
            
                // Add back color control for second footer
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'last_footer_back_color', array(
                    'label' => __( 'Footer 2 Back Color', 'myTheme' ),
                    'section' => 'footer_settings',
                    'settings' => 'last_footer_back_color',
                    'type'  => 'color'
                ) ) );
                // add color for second footer
                $wp_customize->add_setting( 'last_footer_color', array(
                    'default' => '#ffffff', // Default color
                    'sanitize_callback' => 'sanitize_hex_color', // Sanitization callback
                ) );
            
                // Add color control for second footer
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'last_footer_color', array(
                    'label' => __( 'Footer 2 Color', 'myTheme' ),
                    'section' => 'footer_settings',
                    'settings' => 'last_footer_color',
                    'type'  => 'color'
                ) ) );

                // Add setting to select Privacy Policy page
                $wp_customize->add_setting('privacy_policy_page', array(
                    'default'           => '',
                    'sanitize_callback' => 'absint', // Ensure it's an integer (page ID)
                ));

                // Add control to select Privacy Policy page
                $wp_customize->add_control('privacy_policy_page', array(
                    'label'    => __('Select Privacy Policy Page', 'mytheme'),
                    'section'  => 'footer_settings',
                    'type'     => 'dropdown-pages',
                ));

                // Add setting to select terms and conditions page
                $wp_customize->add_setting('terms_and_conditions_page', array(
                    'default'           => '',
                    'sanitize_callback' => 'absint', // Ensure it's an integer (page ID)
                ));

                // Add control to select terms and conditions page
                $wp_customize->add_control('terms_and_conditions_page', array(
                    'label'    => __('Select Terms & Conditions Page', 'mytheme'),
                    'section'  => 'footer_settings',
                    'type'     => 'dropdown-pages',
                ));

                // Add setting and controls for social media links
                $social_media_sites = array(
                    'facebook'    => __('Facebook', 'mytheme'),
                    'instagram'   => __('Instagram', 'mytheme'),
                    'X-twitter'     => __('X-Twitter', 'mytheme'),
                    'Pinterest'     => __('Pinterest', 'mytheme'),
                    'TikTok'     => __('TikTok', 'mytheme'),
                    'Youtube'     => __('Youtube', 'mytheme'),
                    
                    // Add more social media platforms as needed
                );

                foreach ($social_media_sites as $site => $label) {
                    $wp_customize->add_setting($site . '_link', array(
                        'default'           => '',
                        'sanitize_callback' => 'esc_url_raw', // Sanitize as URL
                    ));

                    $wp_customize->add_control($site . '_link', array(
                        'label'    => sprintf(__('Enter %s URL', 'mytheme'), $label),
                        'section'  => 'footer_settings',
                        'type'     => 'url',
                    ));
                }
        

                



}

add_action('customize_register', 'mytheme_customize_register');

if (class_exists('WP_Customize_Control')) {
    class WP_Customize_Category_Control extends WP_Customize_Control {
        public $type = 'dropdown-product-categories';

        public function render_content() {
            $dropdown = wp_dropdown_categories(
                array(
                    'taxonomy'          => 'product_cat', // WooCommerce product category taxonomy
                    'name'              => '_customize-dropdown-product-categories-' . $this->id,
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

function custom_enqueue_woocommerce_cart_styles() {
    if (is_cart()) {
        wp_enqueue_style('custom-cart-woocommerce-css', get_template_directory_uri() . '/cart-woocomerce-mine.css', array(), '1.0', 'all');
        wp_enqueue_script('custom-cart-woocommerce-js',get_template_directory_uri().'/js/cart-woocommerce-mine.js',array('bootstrap-jquery'),'1.0',true);
    }
    if(is_checkout()){
        wp_enqueue_style('custom-checkout-woocommerce-css',get_template_directory_uri().'/checkout-woocommerce-mine.css',array(),'1.0','all');
        wp_enqueue_script('custom-checkout-woocommerce-js',get_template_directory_uri().'/js/checkout-woocommerce-mine.js',array('bootstrap-jquery'),'1.0',true);
    }
    if(is_account_page()){
        wp_enqueue_style('custom-account-woocommerce-css',get_template_directory_uri().'/account-woocommerce-mine.css',array(),'1.0','all');
        wp_enqueue_script('custom-account-woocommerce-js',get_template_directory_uri().'/js/account-woocommerce-mine.js',array('bootstrap-jquery'),'1.0',true);
    }
}

add_action('wp_enqueue_scripts', 'custom_enqueue_woocommerce_cart_styles');

// hooks to edit the style of woocommerce 

add_action('woocommerce_single_product_summary','info_woocommerce_single_product',5);
function info_woocommerce_single_product(){
    if (is_product()) {
        global $post;
        $product_title = get_the_title($post->ID);
        echo '<h2 class="product-title fs-4" style="color:#545469">' . esc_html($product_title) . '</h2>';
    }
}

// Function to get all parent categories of a product
function get_product_parent_categories($product_id) {
    $categories = wp_get_post_terms($product_id, 'product_cat');
    $parents = array();

    foreach ($categories as $category) {
        $parents = array_merge($parents, get_parent_categories($category->term_id));
    }

    // Remove duplicate categories
    $parents = array_unique($parents, SORT_REGULAR);

    // Sort parents by depth
    usort($parents, function($a, $b) {
        return get_ancestors($a->term_id, 'product_cat') <=> get_ancestors($b->term_id, 'product_cat');
    });

    return $parents;
}

// Helper function to recursively get parent categories
function get_parent_categories($term_id) {
    $parents = array();
    $parent_id = get_term_by('id', $term_id, 'product_cat')->parent;

    while ($parent_id != 0) {
        $parent = get_term_by('id', $parent_id, 'product_cat');
        $parents[] = $parent;
        $parent_id = $parent->parent;
    }

    return $parents;
}

// Function to display custom breadcrumb
function display_custom_breadcrumb() {
    if (is_product()) {
        global $post;
        $product_id = $post->ID;
        $parent_categories = get_product_parent_categories($product_id);

        echo '<nav class="mam-woocommerce-breadcrumb" aria-label="breadcrumb">';
        echo '<a href="' . home_url() . '" class="home">Home</a> <i class="fa-solid fa-chevron-right fa-xs"></i> ';

        foreach ($parent_categories as $parent_category) {
            echo '<a href="' . get_term_link($parent_category) . '">' . $parent_category->name . '</a> <i class="fa-solid fa-chevron-right fa-xs"></i> ';
        }

        echo '<span>' . get_the_title($product_id) . '</span>';
        echo '</nav>';
    }
}
add_action('woocommerce_before_single_product', 'display_custom_breadcrumb', 5);

// Function to display the attributes of the current single product page
function display_product_attributes() {
    if (is_product()) {
        global $product;
        $product_id = $product->get_id();
        // Ensure we have a valid product object
        if ( ! $product instanceof WC_Product ) {
            return;
        }

        // Get the product attributes
        $attributes = $product->get_attributes();
        if ( ! empty( $attributes ) ) {
            echo '<div class="single-product-attributes">';

            foreach ( $attributes as $attribute ) {
                $attribute_name = $attribute->get_name(); // Attribute name

                 echo '<h6 class="text-secondary text-capitalize">select a ' . wc_attribute_label( $attribute_name ) . '</h6>';

                // Check if the attribute is a taxonomy
                if ( strpos( $attribute_name, 'pa_' ) === 0 && taxonomy_exists( $attribute_name ) ) {
                    // Get the terms (options) for the attribute
                    $options = wp_get_post_terms( $product_id, $attribute_name );

                    // Extract term names
                    $options_names = wp_list_pluck( $options, 'name' );
                    echo '<div class="options">';

                    foreach($options_names as $option){
                        echo '<input type="radio" id="'.$attribute->get_name().'-'.$option.'" name="attributes-option-'.$attribute->get_name().'" value="'.$option.'" /><label for="'.$attribute->get_name().'-'.$option.'">'.$option.'</label>';
                    }
                    echo '</div>';

                    // Output or process attribute names as needed
                    // echo "Product ID: $product_id, Attribute Name: $attribute_name, Attribute Values: " . implode( ', ', $term_names ) . "<br>";
                }
            }

            echo '</div>';
        }
    }
}
add_action('woocommerce_before_add_to_cart_button', 'display_product_attributes', 25);

// remove product meta of categories of the product
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

add_action('woocommerce_after_add_to_cart_form','add_description_single_product');
function add_description_single_product(){
    // Get the global product object
    global $product;

    // Ensure product is available
    if ( $product ) {
        // Get the product description
        $description = $product->get_description();

        // Display the product description
        echo '<div class="product-description text-secondary pe-3">' . $description . '</div>';
    }

}

// Remove WooCommerce tabs from single product page
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );


function custom_remove_woocommerce_notices_on_category() {
    if (is_product_category()) {
        remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);
    }
}
add_action('wp', 'custom_remove_woocommerce_notices_on_category');

// Remove the "Edit" button on WooCommerce category pages
add_filter( 'edit_post_link', 'remove_edit_post_link_on_wc_category', 10, 3 );

function remove_edit_post_link_on_wc_category( $link, $post_id, $text ) {
    if ( is_product_category() || is_cart() || is_checkout() || is_account_page()) {
        return ''; // Return an empty string to remove the link
    }

    return $link; // Otherwise, return the original link
}

// Register the custom shortcode
add_shortcode('custom_price_filter', 'custom_filter_shortcode');

function custom_filter_shortcode($atts) {
    if (is_product_category()) {
        $current_category = get_queried_object();
        $current_category_url = get_term_link($current_category);
    } else {
        $current_category_url = home_url('/');
    }

    $colors = get_terms(array(
        'taxonomy' => 'pa_color',
        'hide_empty' => true,
    ));

    // Get all sizes
    $sizes = get_terms(array(
        'taxonomy' => 'pa_size',
        'hide_empty' => true,
    ));
    ob_start();
    ?>
    <form id="filter-form" method="GET" action="<?php echo esc_url($current_category_url); ?>" class="px-3 filter-form" style="width:414px;">
        <div class="filter-group text-center text-md-start">
        <div class="size-filter filter-section">
                <h6 >Size <i class="fa-solid fa-chevron-down fa-xs"></i></h6>
                <div class="size-content">
                    <div class="row">
                    <?php foreach ($sizes as $size) : ?>
                        <div class="col-4 mb-3">
                            <input type="radio" class="d-none" name="size" class="" value="<?php echo esc_attr($size->slug); ?>" id="<?php echo esc_html($size->name); ?>" <?php if(isset($_GET['size']) && $_GET['size']==$size->slug) echo 'checked'; ?>><label for="<?php echo esc_html($size->name); ?>" <?php if(isset($_GET['size']) && $_GET['size']==$size->slug) echo 'class="size-label-checked"'; ?>><?php echo esc_html($size->name); ?></label>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <hr>
            <div class="price-filter filter-section">
                <h6 >Price <i class="fa-solid fa-chevron-down fa-xs"></i></h6>
                <div class="price-content ps-3">
                    <div class="form-group">
                        <label for="min_price" class="d-block text-secondary">Min Price</label>
                        <input type="number" class="form-control" id="min_price" name="min_price" value="<?php echo isset($_GET['min_price']) ? esc_attr($_GET['min_price']) : ''; ?>" /> 
                    </div>
                    <div class="form-group my-3">
                        <label for="max_price" class="d-block text-secondary">Max Price</label>
                        <input type="number" class="form-control" id="max_price" name="max_price" value="<?php echo isset($_GET['max_price']) ? esc_attr($_GET['max_price']) : ''; ?>" />
                    </div>
                </div>
            </div>
            <hr>
            <div class="color-filter filter-section">
                <h6 >Color <i class="fa-solid fa-chevron-down fa-xs"></i></h6>
                <div class="color-content">
                    <?php foreach ($colors as $color) : ?>
                        <input type="radio" class="d-none" value="<?php echo esc_attr($color->slug); ?>" name="color" id="<?php echo esc_attr($color->slug); ?>" <?php selected(isset($_GET['color']) ? $_GET['color'] : '', $color->slug); ?> /> <label for="<?php echo esc_attr($color->slug); ?>" data-color="<?php echo esc_attr($color->slug); ?>" style="background-color: <?php echo esc_attr($color->slug); ?>;" <?php if(isset($_GET['color']) && $_GET['color']==$color->slug) echo 'class="color-label-checked"'; ?>></label>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="d-grid gap-2 mt-3">
                <button type="submit" class="btn btn-dark filter-btn">Filter</button>
            </div>
        </div>
    </form>
    <div class="form-reset">
        <div class="d-grid gap-2 mt-3 px-3">
            <a href="<?php echo esc_url($current_category_url); ?>" class="btn btn-main">Reset</a>
        </div>
    </div>
    
    <?php
    return ob_get_clean();
}

add_action('pre_get_posts', 'custom_pre_get_posts_price_filter');

function custom_pre_get_posts_price_filter($query) {
    if (!is_admin() &&  is_product_category()) {
        $meta_query = array('relation' => 'AND');
        $tax_query = array('relation' => 'AND');

        // Filter by min price
        if (isset($_GET['min_price']) && !empty($_GET['min_price'])) {
            $min_price = floatval($_GET['min_price']);
            $meta_query[] = array(
                'key' => '_price',
                'value' => $min_price,
                'compare' => '>=',
                'type' => 'NUMERIC'
            );
        }

        // Filter by max price
        if (isset($_GET['max_price']) && !empty($_GET['max_price'])) {
            $max_price = floatval($_GET['max_price']);
            $meta_query[] = array(
                'key' => '_price',
                'value' => $max_price,
                'compare' => '<=',
                'type' => 'NUMERIC'
            );
        }

        // Filter by color
        if (isset($_GET['color']) && !empty($_GET['color'])) {
            $tax_query[] = array(
                'taxonomy' => 'pa_color',
                'field' => 'slug',
                'terms' => sanitize_text_field($_GET['color']),
            );
        }

        // Filter by size
        if (isset($_GET['size']) && !empty($_GET['size'])) {
            $tax_query[] = array(
                'taxonomy' => 'pa_size',
                'field' => 'slug',
                'terms' => sanitize_text_field($_GET['size']),
            );
        }

        if (count($meta_query) > 1) {
            $query->set('meta_query', $meta_query);
        }

        if (count($tax_query) > 1) {
            $query->set('tax_query', $tax_query);
        }
    }
}



//Add an aside for feltring before the product loop
add_action( 'woocommerce_before_shop_loop', 'add_custom_aside_before_products', 15 );
function add_custom_aside_before_products() {
    if ( is_product_category() ) {
        
        echo '<aside class="custom-aside rounded p-2 me-2">';
        echo do_shortcode('[custom_price_filter]');
        echo '</aside>';
    }
}
// customize woocommerce account
// Add content before WooCommerce account navigation
add_action( 'woocommerce_before_account_navigation', 'custom_content_before_account_navigation' );

function custom_content_before_account_navigation() {
    echo '<div class="navigation-account">';
}

add_action('woocommerce_after_account_navigation','custom_content_after_account_navigation');
function custom_content_after_account_navigation(){
    echo '</div>';
}



// customize woocommerce cart

// Add custom class to WooCommerce add to cart button on archive pages
add_filter('woocommerce_loop_add_to_cart_link', 'custom_add_to_cart_class');
function custom_add_to_cart_class($button) {
    // Add your custom class to the button
    $button = str_replace('class="button', 'class="button btn-main', $button);
    return $button;
}

// Remove dashboard section from my account page
add_filter('woocommerce_account_menu_items', 'remove_dashboard_from_my_account', 999);
function remove_dashboard_from_my_account($items) {
    // Remove Dashboard item
    unset($items['dashboard']);
    
    // Optionally, you can unset other items as needed
    // unset($items['downloads']); // example to remove Downloads
    
    return $items;
}


// set attribute color and size in shopping , checkout and order

// Step 1: Add custom fields to cart item
function add_cart_item_data( $cart_item_data, $product_id, $variation_id ) {
    $product = wc_get_product( $product_id );
    
    // Get selected attributes (e.g., color and size)
    $color = isset( $_POST['attributes-option-pa_color'] ) ? sanitize_text_field( $_POST['attributes-option-pa_color'] ) : '';
    $size = isset( $_POST['attributes-option-pa_size'] ) ? sanitize_text_field( $_POST['attributes-option-pa_size'] ) : '';

    // Set custom data to cart item
    if ( ! empty( $color ) ) {
        $cart_item_data['color'] = $color;
    }
    if ( ! empty( $size ) ) {
        $cart_item_data['size'] = $size;
    }

    return $cart_item_data;
}
add_filter( 'woocommerce_add_cart_item_data', 'add_cart_item_data', 10, 3 );

// Step 2: Display custom data in cart
function display_cart_item_data( $cart_data, $cart_item ) {
    $custom_items = array();

    // Color
    if ( ! empty( $cart_item['color'] ) ) {
        $custom_items[] = array(
            'name' => __( 'Color', 'your-text-domain' ),
            'value' => sanitize_text_field( $cart_item['color'] )
        );
    }

    // Size
    if ( ! empty( $cart_item['size'] ) ) {
        $custom_items[] = array(
            'name' => __( 'Size', 'your-text-domain' ),
            'value' => sanitize_text_field( $cart_item['size'] )
        );
    }
    return $custom_items;
}
add_filter( 'woocommerce_get_item_data', 'display_cart_item_data', 10, 2 );

// Step 3: Save custom data to order
function save_order_item_meta( $item_id, $cart_item ) {
    if ( isset( $cart_item['color'] ) ) {
        wc_add_order_item_meta( $item_id, 'Color', $cart_item['color'] );
    }
    if ( isset( $cart_item['size'] ) ) {
        wc_add_order_item_meta( $item_id, 'Size', $cart_item['size'] );
    }
}
add_action( 'woocommerce_add_order_item_meta', 'save_order_item_meta', 10, 2 );










