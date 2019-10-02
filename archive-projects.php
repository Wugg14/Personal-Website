<?php
/**
 * Portfolio Archive Structure
 *
 * @package  	MarkSteininger\Developers
 * @since		1.0.0
 * @author		MarkSteininger
 * @link		marksteininger.com
 * @license		GNU General Public License 2.0+
 */

// remove Genesis default loop
remove_action( "genesis_loop", "genesis_do_loop" );

// add a custom loop
add_action( 'genesis_loop',__NAMESPACE__  . '\custom_projects_loop' );

/**
 * Creates new project's archive page content
 *
 * @since 1.0.0
 *
 * @return void
 */
function custom_projects_loop(){
    ?>
    <h1>My Portfolio:</h1>
    <hr />
    <?php

    $counter = 0;
    $args = array(
        'post_type' => 'projects',
        'posts_per_page' => 6
    );
    $projects = new \WP_Query($args);
    while ($projects->have_posts()) {
        $projects->the_post();
        //determining if it is an odd or even project
        if ($counter % 2 == 0) {
            ?>
            <div class="first one-half">
            <?php
            //second project
        } else {
            ?>
            <div class="one-half">
            <?php
        }
        ?>
        <div class="featured-projects__container">
            <h2><?php the_title(); ?></h2>
            <hr/>
            <div class="featured-projects__inner-container">
                <div class="featured-projects__inner-thumbnail first one-third">
                    <img alt="project-thumbnail" src="<?php the_post_thumbnail_url('medium'); ?>"/>
                </div>
                <div class="two-thirds">
                    <?php echo get_the_content() ?>
                </div>
                <hr/>
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
        $counter += 1;

        echo paginate_links();

    }
}


genesis();
