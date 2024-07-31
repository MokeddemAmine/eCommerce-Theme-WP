<?php 
/**
 * All our header stuff comes here
 */
?>
<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <?php wp_head(); ?>
    <style>
        #upper-bar{
            background-color: <?php echo get_theme_mod( 'upper_bar_back_color', '#e0e722' ); ?>;
        }
        #upper-bar{
            color:<?php echo get_theme_mod('upper_bar_color','#000000') ?>
        }
        nav#navbar{
             background-color: <?php echo get_theme_mod( 'header_back_color', '#f8f9fa' ); ?>;
        }
        #header-title{
            color:<?php echo get_theme_mod('header_title_color','#000000') ?> !important;
        }
        .dropdown-menu-mine{
            background-color: <?php echo get_theme_mod( 'header_back_color', '#f8f9fa' ); ?> !important;
        }
        nav li a{
            color:<?php echo get_theme_mod('header_color','#000000') ?> !important;
        }
        #header-icons a, #search-header-icon i{
            color: <?php echo get_theme_mod( 'header_icons_color', '#000000' ); ?> !important;
        }
        nav li a.bg-header-chosen{
            background-color: <?php echo get_theme_mod( 'header_back_color', '#f8f9fa' ); ?> !important;
        }
        body{
            
            background-color: <?php echo get_theme_mod( 'body_back_color', '#ffffff' ); ?> !important;
        }
        #primary .entry-header .entry-title{
            color: <?php echo get_theme_mod( 'body_main_heading_color', '#6c757d' ); ?> !important;
        }
        .btn-main{
            color: <?php echo get_theme_mod( 'button_color', '#000000' ); ?> !important;
            border: 1px solid <?php echo get_theme_mod( 'button_hover_back_color', '#e0e722' ); ?> !important;
            background-color: <?php echo get_theme_mod( 'button_back_color', '#ffffff' ); ?> !important;
            border-radius:1rem !important;
            transition:.3s !important;
        }
        .btn-main:hover{
            background-color: <?php echo get_theme_mod( 'button_hover_back_color', '#e0e722' ); ?> !important;
            color:<?php echo get_theme_mod( 'button_hover_color', '#ffffff' ); ?> !important;
        }
        .wc-block-components-button{    
            text-decoration: none !important;
            background-color:<?php echo get_theme_mod( 'button_hover_back_color', '#e0e722' ); ?> !important;
            color:<?php echo get_theme_mod( 'button_hover_color', '#ffffff' ); ?> !important;
            text-transform: uppercase !important;
            border-radius:1rem !important;
            font-weight: bold !important;
            transition:.3s !important;
            border:1px solid <?php echo get_theme_mod( 'button_hover_back_color', '#e0e722' ); ?> !important;
        }
        .wc-block-components-button:hover{
            background-color: <?php echo get_theme_mod( 'button_back_color', '#ffffff' ); ?> !important;
            color:<?php echo get_theme_mod( 'button_color', '#000000' ); ?> !important;
        }
        <?php 
            $ordering_show = get_theme_mod('ordering_show', 'left');
            if($ordering_show === 'right'){
                ?>
                .woocommerce-ordering{
                    text-align: right;
                }
                <?php
            }else if($ordering_show === 'center'){
                ?>
                .woocommerce-ordering{
                    text-align:center;
                }
                <?php
            }
        ?>

        /* aside filter */

        #aside-filter{
            background-color: <?php echo get_theme_mod( 'filter_back_color', '#ffffff' ); ?> !important;
            color:<?php echo get_theme_mod( 'filter_text_color', '#000000' ); ?> !important;
            border:1px dashed <?php echo get_theme_mod( 'filter_border_color', '#ffffff' ); ?> !important;
        }
        #aside-filter .filter-title{
            color:<?php echo get_theme_mod( 'filter_heading_color', '#000000' ); ?> !important;
        }
        #aside-filter hr{
            border-color:<?php echo get_theme_mod( 'filter_lines_color', '#000000' ); ?> !important;
        }
        <?php
            $custom_number = get_theme_mod( 'filter_label_size_border_size_color', '16' );
        ?>
        #aside-filter .size-filter label{
                color:<?php echo get_theme_mod( 'filter_label_size_color', '#000000' ); ?> !important;
                border:1px solid <?php echo get_theme_mod( 'filter_label_size_border_color', '#cccccc' ); ?> !important;
                
                border-radius:<?php echo esc_html( $custom_number ).'px' ?> !important;
                display:block;
                text-align: center;
                padding:.5rem;
                font-size:.8rem;
                transition: .3s;
                cursor:pointer;
                
        }
        #aside-filter .size-filter label:hover{
            background-color: <?php echo get_theme_mod( 'hover_filter_label_size_back_color', '#222222' ); ?> !important;
            color:<?php echo get_theme_mod( 'hover_filter_label_size_color', '#ffffff' ); ?> !important;
        }
        #aside-filter .size-filter label.size-label-checked{
            background-color: <?php echo get_theme_mod( 'hover_filter_label_size_back_color', '#222222' ); ?> !important;
            color:<?php echo get_theme_mod( 'hover_filter_label_size_color', '#ffffff' ); ?> !important;
        }
        #aside-filter .btn-filter{
            border:1px solid <?php echo get_theme_mod( 'filter_btn_border_color', '#333333' ); ?> !important;
            border-radius:1rem;
            background-color: <?php echo get_theme_mod( 'filter_btn_back_color', '#333333' ); ?> !important;
            color:<?php echo get_theme_mod( 'filter_btn_text_color', '#eeeeee' ); ?> !important;
            transition:.3s;
        }
        #aside-filter .btn-filter:hover{
            background-color: <?php echo get_theme_mod( 'hover_filter_btn_back_color', '#666666' ); ?> !important;
            border-color:<?php echo get_theme_mod( 'hover_filter_btn_border_color', '#666666' ); ?> !important;
            color:<?php echo get_theme_mod( 'hover_filter_btn_text_color', '#cccccc' ); ?> !important;
        }
    </style>
</head>
<body>

    <?php if (get_theme_mod('show_custom_section', 'yes') === 'yes') : ?>
        <section id="upper-bar" class="text-center py-1">
            <h5 class="m-0"><?php echo esc_html(get_theme_mod('custom_section_heading', __('Default Heading', 'mytheme'))); ?></h5>
        </section>
    <?php endif; ?>
    <div class="search-product-woocommerce">
        <?php if ( function_exists( 'aws_get_search_form' ) ) : ?>
            <?php aws_get_search_form(); ?>
        <?php endif; ?>
        <span class="close">&times;</span>
    </div>


    <nav id="navbar" class="our-nav navbar navbar-expand-lg py-0">
        <div class="container-fluid py-0">
            <a id="header-title" href="<?php echo get_home_url() ?>" class="my-0 py-0 navbar-brand d-flex align-items-center gap-2">
            <?php 
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src($custom_logo_id,'full');
                if(has_custom_logo()){
                    echo '<img src="'. esc_url($logo[0]) .'" alt="'.get_bloginfo('name').'" id="image-logo" />';
                }
                echo '<h1 class="fs-3 m-0">'. get_bloginfo('name') .'</h1>';
            ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <?php
                $main_categories = get_terms( array(
                    'taxonomy'   => 'product_cat',
                    'hide_empty' => false,
                    'parent'     => 0, // Retrieve only categories that do not have a parent
                ) );

                if (!empty($main_categories)) {
                    echo '<ul class="navbar-nav mx-auto text-uppercase">';
                        foreach ($main_categories as $category) {

                            $subcategories = get_terms(array(
                                'taxonomy'   => 'product_cat',
                                'parent'  => $category->term_id,
                                'hide_empty' => false,
                            ));
                            if($category->name != 'Uncategorized'){
                                if (!empty($subcategories)) {
                                    
                                    echo '<li class="nav-item dropdown-mine mx-4">';
                                        echo '<a class="py-4 nav-link dropdown-toggle-mine" role="button" href="' . get_term_link($category) . '">' . esc_html($category->name) . '</a>';
                                        echo '<div class="dropdown-menu-mine">';
                                        echo '<ul class="list-unstyled dropdown-menu-list-mine container ">';

                                            foreach ($subcategories as $subcategory) {

                                                $second_subcategories = get_terms(array(
                                                    'taxonomy'   => 'product_cat',
                                                    'parent'    => $subcategory->term_id,
                                                    'hide_empty'=> false,
                                                ));

                                                echo '<li class="dropdown-mine-second d-flex flex-column justify-items-start">';
                                                    if(!empty($second_subcategories)){
                                                        echo '<ul class=" dropdown-menu-list-second list-unstyled">';
                                                                echo '<li class="mb-3"><a class="dropdown-head-mine-second d-inline-block bg-header-chosen" href="' . get_term_link($subcategory->term_id) . '">' . esc_html($subcategory->name) . '</a></li>';
                                                        foreach($second_subcategories as $subcat){
                                                            echo '<li class="mb-2"><a class="dropdown-item-second" href="'.get_term_link($subcat).'">'.esc_html($subcat->name).'</a></li>';
                                                        }
                                                        echo '</ul>';
                                                    }else{
                                                        echo '<a class="dropdown-head-mine-second d-inline-block bg-header-chosen" href="' . get_term_link($subcategory) . '">' . esc_html($subcategory->name) . '</a>';
                                                    }
                                                echo '</li>';
                                            
                                            }
                                        echo '</ul>';
                                        echo '</div>';
                                    echo '</li>';
                                }
                                else{
                                    echo '<li class="nav-item mx-4"><a class="nav-link" href="' . get_term_link($category) . '">' . esc_html($category->name) . '</a></li>';
                                }
                            }   

                            
                        }
                    echo '</ul>';
                } else {
                    echo 'No main categories found.';
                }
                ?>
                <div id="header-icons" class="d-flex align-items-center justify-content-center my-3 my-lg-0 gap-4 me-4">
                    <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ) ?>/orders" class="text-dark">
                        <i class="fa-solid fa-user"></i>
                    </a>
                    <span id="search-header-icon" style="cursor:pointer">
                        <i class="fa-solid fa-search"></i>
                    </span>
                    <a href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>" class=" text-dark text-decoration-none shopping-cart-icon">
                        <i class="fa-solid fa-shopping-cart "></i>
                        <?php
                            if ( function_exists( 'WC' ) ) {
                                $cart_count = WC()->cart->get_cart_contents_count();
                                if($cart_count)
                                    echo '<span class="cart-count">' . $cart_count . '</span>';
                            }
                        ?>
                    </a>
                </div>
            </div>
            
        </div>
    </nav>


    
