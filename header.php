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

    <nav class="navbar navbar-expand-lg bg-body-tertiary py-0">
        <div class="container-fluid py-0">
            <a href="<?php echo get_home_url() ?>" class="my-0 py-0 navbar-brand d-flex align-items-center gap-2">
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
                $main_categories = get_categories(array(
                    'parent'  => 0,
                    'hide_empty' => false, // Set to true to hide categories with no posts
                ));

                if (!empty($main_categories)) {
                    echo '<ul class="navbar-nav mx-auto text-uppercase">';
                        foreach ($main_categories as $category) {

                            $subcategories = get_categories(array(
                                'parent'  => $category->term_id,
                                'hide_empty' => false,
                            ));
                            if($category->name != 'Uncategorized'){
                                if (!empty($subcategories)) {
                                    
                                    echo '<li class="nav-item dropdown-mine mx-4">';
                                        echo '<a class="py-3 nav-link dropdown-toggle-mine" role="button" href="' . get_category_link($category->term_id) . '">' . esc_html($category->name) . '</a>';
                                        echo '<div class="dropdown-menu-mine">';
                                        echo '<ul class="list-unstyled dropdown-menu-list-mine container ">';
                                            $i = 1;
                                            foreach ($subcategories as $subcategory) {

                                                $second_subcategories = get_categories(array(
                                                    'parent'    => $subcategory->term_id,
                                                    'hide_empty'=> false,
                                                ));

                                                echo '<li class="dropdown-mine-second d-flex flex-column justify-items-start">';
                                                    if(!empty($second_subcategories)){
                                                        echo '<ul class=" dropdown-menu-list-second list-unstyled">';
                                                                echo '<li class="mb-3"><a class="dropdown-head-mine-second d-inline-block" href="' . get_category_link($subcategory->term_id) . '">' . esc_html($subcategory->name) . '</a></li>';
                                                        foreach($second_subcategories as $subcat){
                                                            echo '<li class="mb-2"><a class="dropdown-item-second" href="'.get_category_link($subcat->term_id).'">'.esc_html($subcat->name).'</a></li>';
                                                        }
                                                        echo '</ul>';
                                                    }else{
                                                        echo '<a class="dropdown-head-mine-second d-inline-block" href="' . get_category_link($subcategory->term_id) . '">' . esc_html($subcategory->name) . '</a>';
                                                    }
                                                echo '</li>';
                                                if($i%4 == 0){
                                                    echo '<br/>';
                                                }
                                                $i++;
                                            }
                                        echo '</ul>';
                                        echo '</div>';
                                    echo '</li>';
                                }
                                else{
                                    echo '<li class="nav-item mx-4"><a class="nav-link" href="' . get_category_link($category->term_id) . '">' . esc_html($category->name) . '</a></li>';
                                }
                            }   

                            
                        }
                    echo '</ul>';
                } else {
                    echo 'No main categories found.';
                }
                ?>
                <div class="d-flex align-items-center justify-content-center my-3 my-lg-0 gap-4 me-4">
                    <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ) ?>" class="text-dark">
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


    
