<?php
if ( ! defined( 'ABSPATH' ) ){ exit; }

if (!function_exists('white_setup')) {

    function white_setup()
    {
        register_sidebar(array(
            'name' => 'Right sidebar',
            'id' => 'sidebar-right',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h1 class="widget-title">',
            'after_title' => '</h1>',
        ));


        // allow the use of html5 markup
        // @link https://codex.wordpress.org/Theme_Markup
        add_theme_support('html5', array('caption', 'comment-form', 'comment-list', 'gallery', 'search-form'));

        // add support menu
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'bootstrap-basic'),
        ));

        // TODO add post formats support
        //  add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));
        // TODO enable support for post thumbnail or feature image on posts and pages
        //add_theme_support('post-thumbnails');


    }
}
add_action('after_setup_theme', 'white_setup');

if (!function_exists('white_scripts')) {

    function white_scripts() {

        wp_enqueue_style('bootstrap-base',get_template_directory_uri().'/css/bootstrap.min.css',array(),'3.3.7');
        wp_enqueue_style('fontawesome',get_template_directory_uri().'/css/font-awesome.min.css',array(),'4.7.0');

        wp_enqueue_style('white-board',get_template_directory_uri().'/style.css');

        wp_enqueue_script('bootstrap-js',get_template_directory_uri().'/js/bootstrap.min.js',array('jquery'),'3.3.7');


    }
}
add_action('wp_enqueue_scripts', 'white_scripts');


if (!function_exists('white_comments_popup_link')) {
    /**
     * Custom comment popup link
     *
     * @return string
     */
    function white_comments_popup_link()
    {
        $comment_icon = '<span class="comment-icon glyphicon glyphicon-comment"><small class="comment-total">%d</small></span>';
        $comments_icon = '<span class="comment-icon glyphicon glyphicon-comment"><small class="comment-total">%s</small></span>';
        return comments_popup_link(sprintf($comment_icon, ''), sprintf($comment_icon, '1'), sprintf($comments_icon, '%'), 'btn btn-default btn-xs');
    }
}

if (!function_exists('white_edit_post_link')) {
    /**
     * Display edit post link
     */
    function white_edit_post_link()
    {
        $edit_post_link = get_edit_post_link();
        if ($edit_post_link != null) {
            $edit_btn = '<a class="post-edit-link btn btn-default btn-xs" href="'.$edit_post_link.'" title="Edit"><i class="edit-post-icon glyphicon glyphicon-pencil" title="Edit"></i></a>';
            unset($edit_post_link);
            echo $edit_btn;
        }
    }
}

if( !function_exists('white_post_created_time')){
    function white_post_created_time(){

        echo get_the_date();

    }

}

if (!function_exists('white_full_width_search_form')) {
    /**
     * Display full page search form
     *
     * @return string the search form element
     */
    function white_full_width_search_form()
    {
        $output = '<form class="form-horizontal" method="get" action="' . esc_url(home_url('/')) . '" role="form">';
        $output .= '<div class="form-group">';
        $output .= '<div class="col-xs-10">';
        $output .= '<input type="text" name="s" value="' . esc_attr(get_search_query()) . '" placeholder="Search &hellip;" title="Search &hellip;" class="form-control" />';
        $output .= '</div>';
        $output .= '<div class="col-xs-2">';
        $output .= '<button type="submit" class="btn btn-default">Search</button>';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</form>';

        return $output;
    }
}

if (!function_exists('bootstrapBasicPagination')) {
    /**
     * display pagination (1 2 3 ...) instead of previous, next of wordpress style.
     *
     * @param string $pagination_align_class
     * @return string the content already echo
     */
    function bootstrapBasicPagination($pagination_align_class = 'pagination-center pagination-row')
    {
        global $wp_query;
        $big = 999999999;
        $pagination_array = paginate_links(array(
            'base' => str_replace($big, '%#%', get_pagenum_link($big)),
            'format' => '/page/%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $wp_query->max_num_pages,
            'prev_text' => '&laquo;',
            'next_text' => '&raquo;',
            'type' => 'array'
        ));

        unset($big);

        if (is_array($pagination_array) && !empty($pagination_array)) {
            echo '<nav class="' . $pagination_align_class . '">';
            echo '<ul class="pagination">';
            foreach ($pagination_array as $page) {
                echo '<li';
                if (strpos($page, '<a') === false && strpos($page, '&hellip;') === false) {
                    echo ' class="active"';
                }
                echo '>';
                if (strpos($page, '<a') === false && strpos($page, '&hellip;') === false) {
                    echo '<span>' . $page . '</span>';
                } else {
                    echo $page;
                }
                echo '</li>';
            }
            echo '</ul>';
            echo '</nav>';
        }

        unset($page, $pagination_array);
    }// bootstrapBasicPagination
}

if(! function_exists('white_excerpt_more')){
    function white_excerpt_more($more) {
        global $post;
        return '<a class="moretag" href="'. get_permalink($post->ID) . '"> &hellip; Full article </a>';
    }
}
add_filter('excerpt_more', 'white_excerpt_more');