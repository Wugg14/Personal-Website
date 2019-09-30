<?php
/**
* Comments structure handling
*
* @package  	MarkSteininger\Developer
* @since		1.0.0
* @author		MarkSteininger
* @link			marksteininger.com
* @license		GNU General Public License 2.0+
*/
namespace MarkSteininger\Developers;

//*
add_filter('genesis_comment_list_args', __NAMESPACE__ . '\setup_comments_gravatar');


/**
 * Modify size of the Gravatar in the entry comments
 *
 * @since 1.0.0
 *
 * @param array $args
 *
 * @return mixed
 */
function setup_comments_gravatar(array $args){

    $args['avatar_size'] = 60;

    return $args;

}