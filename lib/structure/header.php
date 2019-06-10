<?php
/**
* Header Structure
*
* @package  	MarkSteininger\Developers
* @since		1.0.0
* @author		MarkSteininger
* @link			tbdx
* @license		GNU General Public License 2.0+
*/
namespace MarkSteininger\Developers;

function unregister_header_callbacks() {
    remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
    remove_action( 'genesis_header', 'genesis_do_header' );
    remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );
}

function mysite_header(){ ?>
    <div class="navigation-banner">
        <div class="navigation-banner__link"><div class="navigation-banner__link-inner"><a href="<?php echo esc_url(site_url('/#')); ?>">About</a></div></div>
        <div class="navigation-banner__link"><div class="navigation-banner__link-inner"><a href="<?php echo esc_url(site_url('/#')); ?>">Portfolio</a></div></div>
        <div class="navigation-banner_logo"><img src="<?php echo get_theme_file_uri('/assets/images/logo.png') ?>"/></div>
        <div class="navigation-banner__link"><div class="navigation-banner__link-inner"><a href="<?php echo esc_url(site_url('/#')); ?>">Blog</a></div></div>
        <div class="navigation-banner__link"><div class="navigation-banner__link-inner"><a href="<?php echo esc_url(site_url('/#')); ?>">Contact Me</a></div></div>
    </div>
    <?php
}

remove_action( 'genesis_after_header', 'genesis_do_nav' );

add_action( 'genesis_header', __NAMESPACE__ . '\mysite_header' );