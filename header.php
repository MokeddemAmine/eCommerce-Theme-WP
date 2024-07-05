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


    
