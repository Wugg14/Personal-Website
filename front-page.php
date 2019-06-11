<?php
/**
 * Front Page Structure
 *
 * @package  	MarkSteininger\Developers
 * @since		1.0.0
 * @author		MarkSteininger
 * @link			tbd
 * @license		GNU General Public License 2.0+
 */
namespace MarkSteininger\Developers;


// Remove Site Inner Markup for custom homepage
add_filter( 'genesis_markup_site-inner', '__return_null' );
add_filter( 'genesis_markup_content-sidebar-wrap_output', '__return_false' );
add_filter( 'genesis_markup_content', '__return_null' );


// remove Genesis default loop
remove_action( "genesis_loop", "genesis_do_loop" );


// add a custom loop
add_action( "genesis_loop",__NAMESPACE__  . "\custom_front_page_loop" );

/**
 * Creates new front page content
 *
 * @since 1.0.0
 *
 * @return void
 */
function custom_front_page_loop () {
    ?>
    <div class="front-page-inner-container">
            <?php
    about_me_section();
    ?>
    </div>
<?php
};

function about_me_section(){
?>
    <div class="first one-half">
        <div class="short-bio-box">
            <div class="bio-box__header">
                <img class="bio-box__image" src="<?php echo get_theme_file_uri('/assets/images/mark-pic-2018.jpg') ?>"/>
                <h1 class="bio-box__h1">Hi, I'm Mark</h1>
            </div>
            <div><p>I pride myself on having cross-disciplinary skills. I'm a web developer, digital political organizer, policy wonk and student of history. Currently a member of the American Promise team and proud graduate of Boston University&nbsp;(BA&nbsp;-&nbsp;History).</p>
                <button>Read More</button>
            </div>
        </div>
    </div>
    <div class="one-half">
        <div class="quote-box">
            <p><i>
                    A human being should be able to change a diaper, plan an invasion, butcher a hog, conn a ship, design a building, write a sonnet, balance accounts, build a wall, set a bone, comfort the dying, take orders, give orders, cooperate, act alone, solve equations, analyze a new problem, pitch manure, program a computer, cook a tasty meal, fight efficiently, die gallantly. Specialization is for insects.
                </i>
            <br/>
                <span id="quote-author__name"><strong>-Robert A. Heinlein</strong></span>
            </p>
        </div>
    </div>
<?php
};

genesis();