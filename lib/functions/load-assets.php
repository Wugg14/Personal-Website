<?php
/**
 * Asset Loader Handler
 *
 * @package  	MarkSteininger\Developers
 * @since		1.0.0
 * @author		MarkSteininger
 * @link		marksteininger.com
 * @license		GNU General Public License 2.0+
 */
namespace MarkSteininger\Developers;

add_action('wp_enqueue_scripts',__NAMESPACE__ .  '\enqueue_assets');
/**
 * Enqueue Scripts and Styles
 *
 * @since 1.0.0
 *
 * @return int
 */
function enqueue_assets(){

    wp_enqueue_style(CHILD_TEXT_DOMAIN . '-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700', array(), CHILD_THEME_VERSION);
    wp_enqueue_style('dashicons');

    wp_enqueue_script( CHILD_TEXT_DOMAIN . '-responsive-menu', CHILD_URL . '/assets/js/responsive-menu.js', array( 'jquery' ), CHILD_THEME_VERSION, true );
    $localized_script_args = array(
        'mainMenu' => __('Menu', CHILD_TEXT_DOMAIN),
        'subMenu' => __('Menu', CHILD_TEXT_DOMAIN),
    );
    wp_localize_script(CHILD_TEXT_DOMAIN . '-responsive-menu', 'developersL10n', $localized_script_args);
    wp_enqueue_style( CHILD_TEXT_DOMAIN . '-FontAwesome', '//use.fontawesome.com/releases/v5.11.1/css/all.css', CHILD_THEME_VERSION);

}