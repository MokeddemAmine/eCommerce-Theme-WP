<?php get_header(); ?>
    <div class="container-fluid m-0 my-3 p-0">
        <div class="header-image">
            <img alt="header food" class="image-fluid w-100" style="min-height:300px;object-fit:cover" src="<?php header_image(); ?>" />
            <?php
            // Get the show/hide content setting
            $header_show_content = get_theme_mod('header_show_content', 'show');
            $header_category_id = get_theme_mod('header_image_link');
            $header_category_link = get_category_link($header_category_id);

            // Show or hide content based on the setting
            if ($header_show_content === 'show') {
                // Your content here
                echo '<a href="'.esc_url($header_category_link).'" class="header-btn">Shop Now</a>';
            }
            ?>
        </div>
    </div>
    <div class="row mx-0 section-2">
        <div class="col-md-6">
            <?php

                $homepage_image = get_theme_mod('image_section_1_1');
                $homepage_category_id = get_theme_mod('image_section_1_1_category_link');
                $homepage_category_link = get_category_link($homepage_category_id);

                if ($homepage_category_link) {
                    echo '<a href="' . esc_url($homepage_category_link) . '">';
                }

                if ($homepage_image) {
                    echo '<img src="' . esc_url($homepage_image) . '" alt="Homepage Image" class=" w-100 h-100">';
                }

                if($homepage_category_link){
                    echo '</a>';
                }

            ?>
        </div>
        <div class="col-md-6">
            <?php

                $homepage_image = get_theme_mod('image_section_1_2');
                $homepage_category_id = get_theme_mod('image_section_1_2_category_link');
                $homepage_category_link = get_category_link($homepage_category_id);

                if ($homepage_category_link) {
                    echo '<a href="' . esc_url($homepage_category_link) . '">';
                }

                if ($homepage_image) {
                    echo '<img src="' . esc_url($homepage_image) . '" alt="Homepage Image" class=" w-100 h-100">';
                }
                if($homepage_category_link){
                    echo '</a>';
                }

            ?>
        </div>
    </div>
    <div class="container-fluid m-0 my-3 p-0" >
        <div class="header-section-2 h-100">
        <?php

            $homepage_image = get_theme_mod('image_section_2');

            $homepage_category_id = get_theme_mod('image_section_2_category_link');
            $homepage_category_link = get_category_link($homepage_category_id);

            if ($homepage_category_link) {
                echo '<a href="' . esc_url($homepage_category_link) . '">';
            }

            if ($homepage_image) {
                echo '<img src="' . esc_url($homepage_image) . '" alt="Homepage Image" class=" w-100 h-100" style="object-fit:contain">';
            }

            if ($homepage_category_link){
                echo '</a>';
            }

        ?>
        </div>
    </div>
    <div class="container-fluid m-0 my-3 p-0">
        <div class="row mx-0">
            <div class="col-md-6 col-lg-3 p-3 mb-3 mb-lg-0" style="height:520px">
            <?php
                $homepage_image = get_theme_mod('image_section_3_1');
                $homepage_heading = get_theme_mod('section_3_1_heading');

                $homepage_category_id = get_theme_mod('image_section_3_1_category_link');
                $homepage_category_link = get_category_link($homepage_category_id);
                
                if ($homepage_category_link) {
                    echo '<a href="' . esc_url($homepage_category_link) . '" class="text-decoration-none">';
                }
    
                if ($homepage_image) {
                    echo '<img src="' . esc_url($homepage_image) . '" alt="Homepage Image" class=" w-100 h-100" style="object-fit:cover">';
                }
                if($homepage_heading){
                    echo '<h5 class="text-center text-dark my-2">'.esc_html($homepage_heading).' <i class="fa-solid fa-chevron-right fa-2xs"></i></h5>';
                }
    
                if ($homepage_category_link){
                    echo '</a>';
                }
            ?>
            </div>
            <div class="col-md-6 col-lg-3 p-3 mb-3 mb-lg-0" style="height:520px">
                <?php
                    $homepage_image = get_theme_mod('image_section_3_2');
                    $homepage_heading = get_theme_mod('section_3_2_heading');

                    $homepage_category_id = get_theme_mod('image_section_3_2_category_link');
                    $homepage_category_link = get_category_link($homepage_category_id);
                    
                    if ($homepage_category_link) {
                        echo '<a href="' . esc_url($homepage_category_link) . '" class="text-decoration-none">';
                    }
        
                    if ($homepage_image) {
                        echo '<img src="' . esc_url($homepage_image) . '" alt="Homepage Image" class=" w-100 h-100" style="object-fit:cover">';
                    }
                    if($homepage_heading){
                        echo '<h5 class="text-center text-dark my-2">'.esc_html($homepage_heading).' <i class="fa-solid fa-chevron-right fa-2xs"></i></h5>';
                    }
        
                    if ($homepage_category_link){
                        echo '</a>';
                    }
                ?>
            </div>
            <div class="col-md-6 col-lg-3 p-3 mb-3 mb-lg-0" style="height:520px">
                <?php
                    $homepage_image = get_theme_mod('image_section_3_3');
                    $homepage_heading = get_theme_mod('section_3_3_heading');

                    $homepage_category_id = get_theme_mod('image_section_3_3_category_link');
                    $homepage_category_link = get_category_link($homepage_category_id);
                    
                    if ($homepage_category_link) {
                        echo '<a href="' . esc_url($homepage_category_link) . '" class="text-decoration-none">';
                    }
        
                    if ($homepage_image) {
                        echo '<img src="' . esc_url($homepage_image) . '" alt="Homepage Image" class=" w-100 h-100" style="object-fit:cover">';
                    }
                    if($homepage_heading){
                        echo '<h5 class="text-center text-dark my-2">'.esc_html($homepage_heading).' <i class="fa-solid fa-chevron-right fa-2xs"></i></h5>';
                    }
        
                    if ($homepage_category_link){
                        echo '</a>';
                    }
                ?>
            </div>
            <div class="col-md-6 col-lg-3 p-3 mb-3 mb-lg-0" style="height:520px">
                <?php
                    $homepage_image = get_theme_mod('image_section_3_4');
                    $homepage_heading = get_theme_mod('section_3_4_heading');

                    $homepage_category_id = get_theme_mod('image_section_3_4_category_link');
                    $homepage_category_link = get_category_link($homepage_category_id);
                    
                    if ($homepage_category_link) {
                        echo '<a href="' . esc_url($homepage_category_link) . '" class="text-decoration-none">';
                    }
        
                    if ($homepage_image) {
                        echo '<img src="' . esc_url($homepage_image) . '" alt="Homepage Image" class=" w-100 h-100" style="object-fit:cover">';
                    }
                    if($homepage_heading){
                        echo '<h5 class="text-center text-dark my-2">'.esc_html($homepage_heading).' <i class="fa-solid fa-chevron-right fa-2xs"></i></h5>';
                    }
        
                    if ($homepage_category_link){
                        echo '</a>';
                    }
                ?>
            </div>
        </div>
    </div>
    
<?php get_footer() ?>