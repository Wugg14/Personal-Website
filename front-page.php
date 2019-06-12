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
    about_me_section();
    featured_projects();
    open_ended_section();
};

function about_me_section(){
?>
    <div class="about-me front-page-inner-container">
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
    </div>
<?php
};

function featured_projects(){
    ?>
    <div class="featured-projects">
        <div class="front-page-inner-container">
            <h1>Featured Projects</h1>
            <div class="first one-half">
                <img src="https://i.redd.it/mfn69vdxgq331.jpg" />
            </div>
            <div class="one-half">
                <img src="https://i.redd.it/czusywvfjv331.jpg"/>
            </div>
        </div>
    </div>
<?php
};

function open_ended_section(){
    ?>
    <div class="open-ended__section front-page-inner-container">
        <div class="first two-thirds">
            <h1>Latest from My Blog:</h1>
            <div class="blog-preview">
                <div class="blog-preview__thumbnail-container">
                    <div class="blog-preview__thumbnail"><img src="https://i.redd.it/1tt0rq6yxy331.png"/></div>
                </div>
                <hr />
                <div class="blog-preview__header">
                    <h1>Game of Thrones is Bad, Don't @ Me <span class="blog-preview__header__post-date">| May 29th, 2019</span></h1>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut quis volutpat elit. Nam non rhoncus mauris. Proin non lacus non neque convallis iaculis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam lacinia a est non cursus. Suspendisse in leo purus. Maecenas elementum, ex ac porttitor commodo, magna sapien vestibulum quam, id vehicula felis risus ac tellus.</p>
                <button>Read More</button>
            </div>
        </div>
        <div class="one-third">
            <h1>Bangers of the Month</h1>
            <iframe src="https://open.spotify.com/embed/playlist/6UPB3v3OZlfwx4FKJETNWm" width="400" height="500" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
        </div>
    </div>
<?php
};

genesis();