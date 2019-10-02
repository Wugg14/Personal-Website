<?php
/**
 * Front Page Structure
 *
 * @package  	MarkSteininger\Developers
 * @since		1.0.0
 * @author		MarkSteininger
 * @link		marksteininger.com
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


/**
 * The About Me Section Content
 *
 * @since 1.0.0
 *
 * @return void
 */
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
                    <span id="quote-author__name"><strong>—Robert A. Heinlein, Science Fiction Writer, Aeronautical Engineer, and retired Naval Officer.</strong></span>
                </p>
            </div>
        </div>
    </div>
<?php
};


/**
 * The Featured Projects Content
 *
 * @since 1.0.0
 *
 * @return void
 */
function featured_projects(){
    ?>
    <div class="featured-projects">
        <div class="front-page-inner-container">
            <h1>Featured Projects:</h1>
            <?php
            $counter = 0;
            $args = array(
                'post_type' => 'projects',
                'posts_per_page' => 2
            );
            $featuredProjects = new \WP_Query($args);

            while ($featuredProjects->have_posts()) {
                $featuredProjects->the_post();

                //first project
                if($counter == 0 ){
                    ?>
                    <div class="first one-half">
                    <?php
                //second project
                } else {
                    ?>
                    <div class="one-half">
                    <?php
                }
                //no changes to this section
                ?>
                    <div class="featured-projects__container">
                        <h2><?php the_title(); ?></h2>
                        <hr />
                        <div class="featured-projects__inner-container">
                            <div class="featured-projects__inner-thumbnail first one-half">
                                <img alt="project-thumbnail" src="<?php the_post_thumbnail_url('medium'); ?>" />
                            </div>
                            <div class="one-half">
                               <?php echo wp_trim_words(get_the_content(), 28); ?>
                                <br/>
                               <a href="<?php echo esc_url(site_url('/projects/')); ?>">Read More</a>
                            </div>
                            <hr />
                            <div class="featured-projects__links">
                                <div class="first one-half">
                                    <div class="inner-link">
                                        <a href="<?php echo get_field("github_url"); ?>">
                                            <i class="fab fa-github"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="one-half">
                                    <div class="inner-link">
                                        <a href="<?php echo get_field("live_link"); ?>">
                                            <i class="fas fa-link"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $counter+= 1;
            }
            ?>
            </div>
        </div>
    <?php
};


/**
 * An Open Ended Section with Blog Content
 *
 * @since 1.0.0
 *
 * @return void
 */
function open_ended_section(){
    ?>
    <div class="open-ended__section front-page-inner-container">
        <div class="first two-thirds">
            <h1>Latest from My Blog:</h1>
            <div class="blog-preview">
                <?php
                $args = array(
                'posts_per_page' => 1,
            );
            $blogpost = new \WP_Query($args);
            while ($blogpost -> have_posts()) {
                $blogpost->the_post();

                //check for thumbnail
                if(has_post_thumbnail()){
                    ?>
                    <div class="blog-preview__thumbnail-container">
                        <div class="blog-preview__thumbnail"><img src="<?php the_post_thumbnail_url('medium'); ?>"/></div>
                    </div>
                    <hr />
                    <?php
                }
                ?>
                <div class="blog-preview__header">
                    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a><span class="blog-preview__header__post-date">| <?php echo get_the_date('F j, Y'); ?></span></h1>
                </div>

                <?php if (has_excerpt()) {
                    echo get_the_excerpt();
                } else {
                    echo wp_trim_words(get_the_content(), 36);
                }
                ?>
                <br />
                <br />
                <form action="<?php the_permalink(); ?>"><button>Read More</button></form>
            </div>
            <?php
            }
            ?>
        </div>
        <div class="open-ended-section--small one-third">
            <h1>Current Jams:</h1>
            <iframe src="https://open.spotify.com/embed/playlist/6UPB3v3OZlfwx4FKJETNWm" width="400" height="500" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
        </div>
    </div>
<?php
};

genesis();