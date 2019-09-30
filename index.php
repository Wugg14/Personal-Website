<?php
/**
 * Blog Archive Structure
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
add_action( 'genesis_loop',__NAMESPACE__  . '\blog_loop' );

//remove Genesis Archive Title block
remove_action( 'genesis_before_loop', 'genesis_do_posts_page_heading' );

/**
 * Creates new project's archive page content
 *
 * @since 1.0.0
 *
 * @return void
 */
function blog_loop(){
    ?> <h1>Blog Posts:</h1> <?php
    //init counter
    $counter = 0;
    //args for WP Query
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 6
    );
    $blogposts = new \WP_Query($args);
    while ($blogposts->have_posts()) {
        $blogposts->the_post();

        //determining if it is an odd or even post
        if ($counter % 2 == 0) {
            ?>
            <div class="first one-half blog-preview">
            <?php
        } else {
            ?>
            <div class="one-half blog-preview">
            <?php
        }
                //check for thumbnail
                if(has_post_thumbnail()){
                ?>
                <div class="blog-preview__thumbnail-container">
                    <div class="blog-preview__thumbnail"><img src="<?php the_post_thumbnail_url('medium'); ?>"/></div>
                </div>
                <hr />
                <?php } ?>


                <div class="blog-preview__header">
                    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span class="blog-preview__header__post-date">| <?php echo get_the_date('F j, Y'); ?></span></h1>
                </div>

                <?php
                //check header
                if (has_excerpt()) {
                    echo get_the_excerpt();
                } else {
                    echo wp_trim_words(get_the_content(), 36);
                } ?>

                <br />
                <br />
                <form action="<?php the_permalink(); ?>"><button>Read More</button></form>
            </div>
        <?php
        $counter += 1;
        echo paginate_links();
    }
}
genesis();