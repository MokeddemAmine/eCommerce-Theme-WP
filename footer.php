    
    <style>
        #footer1{
            background-color: <?php echo get_theme_mod( 'footer_back_color', '#f8f9fa' ); ?>;
            color: <?php echo get_theme_mod( 'footer_heading_color', '#000000' ); ?>;
        }
        footer #footer1 li a{
            color: <?php echo get_theme_mod( 'footer_links_color', '#000000' ); ?> !important;
        }
        footer #footer2{
            background-color: <?php echo get_theme_mod( 'last_footer_back_color', '#212529' ); ?>;
            color: <?php echo get_theme_mod( 'last_footer_color', '#ffffff' ); ?>;
        }
        footer #footer2 li a{
            color: <?php echo get_theme_mod( 'last_footer_color', '#ffffff' ); ?>;
        }
        footer #footer2 span.copyright{
            color: <?php echo get_theme_mod( 'last_footer_color', '#ffffff' ); ?> !important;
        }
    </style>
    <div style="clear:both;"></div>
    <footer id="footer-mine" class=" bg-light mt-5">
        <div id="footer1" class="pt-4">
        <div class="container">
            <div id="footer1" class="row justify-content-between">
                
                <?php

                    // get headings with lists of links
                    for($i=1;$i < 5; $i++){

                        $footer_heading = get_theme_mod('footer_heading_'.$i, '');
                        $footer_link = array(get_theme_mod('footer_link_'.$i.'_1', ''),get_theme_mod('footer_link_'.$i.'_2', ''),get_theme_mod('footer_link_'.$i.'_3', ''),get_theme_mod('footer_link_'.$i.'_4', ''),get_theme_mod('footer_link_'.$i.'_5', ''));

                        $counter_footer_link=0;
                        foreach($footer_link as $link){
                            if(!empty($link)){
                                $counter_footer_link++;
                            }
                        }

                        if(!empty($footer_heading) || $counter_footer_link){
                            echo '<div class="col-sm-6 col-md-3 col-xl-2 text-center text-sm-start">';
                        }
                    
                        if (!empty($footer_heading)) {
                            echo '<h4>' . esc_html($footer_heading) . '</h4>';
                        }

                        if ($counter_footer_link) {
                            echo '<ul class="list-unstyled">';
                            foreach($footer_link as $link){
                                if(!empty($link)){
                                    $parts = explode('_', $link);
                                    $type = $parts[0];
                                    $id = $parts[1];

                                    $link = '';

                                    switch ($type) {
                                        case 'category':
                                            $category = get_term($id, 'product_cat');
                                            if ($category && !is_wp_error($category)) {
                                                $link = get_term_link($category, 'product_cat');
                                                $name = $category->name;
                                            }
                                            break;
                                        case 'page':
                                            $page = get_post($id);
                                            if ($page) {
                                                $link = get_permalink($page->ID);
                                                $name = $page->post_title;
                                            }
                                            break;
                                        case 'product':
                                            $product = wc_get_product($id);
                                            if ($product) {
                                                $link = $product->get_permalink();
                                                $name = $product->get_name();
                                            }
                                            break;
                                        default:
                                            break;
                                    }

                                    if (!empty($link) && !empty($name)) {
                                        echo '<li><a href="' . esc_url($link) . '" class="text-capitalize text-decoration-none text-dark">' . esc_html($name) . '</a></li>';
                                    }
                                }
                            }
                            echo '</ul>';
                        }
                        if(!empty($footer_heading) || $counter_footer_link){
                            echo '</div>';
                        }
                    }
                ?>

                <div class="col-sm-6 col-md-3 col-xl-2 text-center text-sm-start follow-us">
                    <h5 class="text-uppercase">follow us</h5>
                    <ul class="list-unstyled">
                    <?php if (get_theme_mod('facebook_link')) : ?>
                        <li class="mb-2">
                            <a href="<?php echo esc_url(get_theme_mod('facebook_link')); ?>" target="_blank" rel="nofollow" class="text-capitalize text-decoration-none text-dark">
                                <i class="fa-brands fa-facebook fa-xl rounded-circle"></i>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (get_theme_mod('instagram_link')) : ?>
                        <li class="mb-2">
                            <a href="<?php echo esc_url(get_theme_mod('instagram_link')); ?>" target="_blank" rel="nofollow" class="text-capitalize text-decoration-none text-dark">
                                <i class="fa-brands fa-square-instagram fa-xl rounded-circle"></i>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (get_theme_mod('X-twitter_link')) : ?>
                        <li class="mb-2">
                            <a href="<?php echo esc_url(get_theme_mod('X-twitter_link')); ?>" target="_blank" rel="nofollow" class="text-capitalize text-decoration-none text-dark">
                            <i class="fa-brands fa-square-x-twitter fa-xl rounded-circle"></i>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (get_theme_mod('Pinterest_link')) : ?>
                        <li class="mb-2">
                            <a href="<?php echo esc_url(get_theme_mod('Pinterest_link')); ?>" target="_blank" rel="nofollow" class="text-capitalize text-decoration-none text-dark">
                            <i class="fa-brands fa-square-pinterest fa-xl rounded-circle"></i>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (get_theme_mod('TikTok_link')) : ?>
                        <li class="mb-2">
                            <a href="<?php echo esc_url(get_theme_mod('TikTok_link')); ?>" target="_blank" rel="nofollow" class="text-capitalize text-decoration-none text-dark">
                            <i class="fa-brands fa-tiktok fa-xl rounded-circle"></i>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (get_theme_mod('Youtube_link')) : ?>
                        <li class="mb-2">
                            <a href="<?php echo esc_url(get_theme_mod('Youtube_link')); ?>" target="_blank" rel="nofollow" class="text-capitalize text-decoration-none text-dark">
                            <i class="fa-brands fa-square-youtube fa-xl rounded-circle"></i>
                            </a>
                        </li>
                    <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        </div>
        <div id="footer2" class="privacy-terms py-3 text-center">
            <ul class="list-unstyled d-flex justify-content-center gap-3">
            <?php
                $privacy_policy_page = get_theme_mod('privacy_policy_page');
                if ($privacy_policy_page) {
                    $privacy_policy_url = get_permalink($privacy_policy_page);
                    echo '<li><a class="text-capitalize text-decoration-none" href="' . esc_url($privacy_policy_url) . '">' . __('Privacy Policy', 'mytheme') . '</a></li>';
                } else {
                    echo '<li><a class="text-capitalize text-decoration-none" href="#">' . __('Privacy Policy', 'mytheme') . '</a></li>';
                }
            ?>
                <li class="">|</li>
            <?php
                $terms_conditions_page = get_theme_mod('terms_and_conditions_page');
                if ($terms_conditions_page) {
                    $terms_conditions_url = get_permalink($terms_conditions_page);
                    echo '<li><a class="text-capitalize text-decoration-none" href="' . esc_url($terms_conditions_url) . '">' . __('Terms & Conditions', 'mytheme') . '</a></li>';
                } else {
                    echo '<li><a class="text-capitalize text-decoration-none" href="#">' . __('Terms & Conditions', 'mytheme') . '</a></li>';
                }
            ?>
                <!-- <li><a href="#" class="text-white text-capitalize text-decoration-none">privacy policy</a></li> -->
                
                
            </ul>
            <span class="copyright">
                &copy; <?php echo date('Y') ?> <?php bloginfo('name') ?>, Inc.
            </span>
        </div>
    </footer>
    <?php wp_footer() ?>
    <script src="js/cart-woocommerce-mine.js"></script>
</body>
</html>