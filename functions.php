<?php

/**
 * @package ltc-theme-info-widget
 * @since  1.0.0
 * @author gabelloyd
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Add theme info box into WordPress Dashboard
// Function that outputs the contents of the dashboard widget
function ltc_theme_info() {
    $my_theme = wp_get_theme();
    echo "<p><strong>" . $my_theme . "</strong> was developed by <a href=".esc_html( $my_theme->get( 'AuthorURI' ) ).">Long Tail Creative</a>. Currently running Version ".$my_theme->get( 'Version' ).".</p>
        <p><strong>Contact:</strong>&nbsp;<a href=\"mailto:webmaster@longtailcreative.com?subject=Dashboard Message from ". $my_theme ."&cc=info@longtailcreative.com\"><i class=\"fa fa-envelope-o\"></i>&nbsp;Gabe Lloyd</a></p>";

}

// Function used in the action hook
function ltc_add_dashboard_widgets() {
  wp_add_dashboard_widget('wp_dashboard_widget', 'Theme Details', 'ltc_theme_info');
}

// Register the new dashboard widget with the 'wp_dashboard_setup' action
add_action('wp_dashboard_setup', 'ltc_add_dashboard_widgets' );