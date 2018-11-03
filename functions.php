<?php 

require_once get_theme_file_path('/inc/wp-bootstrap-navwalker.php');

function balita_setup_theme(){
    load_theme_textdomain('balita', false, get_template_directory().'languages/');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );
    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
    ) );

    add_image_size('catagory-image', 350, 234, true);
    register_nav_menu('top-menu',__('Top Menu','balita'));
}
add_action('after_setup_theme','balita_setup_theme');


function balita_assets(){
    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700');
    wp_enqueue_style('bootstrap', get_theme_file_uri('/css/bootstrap.css'));
    wp_enqueue_style('animate', get_theme_file_uri('/css/animate.css'));
    wp_enqueue_style('owl.carousel', get_theme_file_uri('/css/owl.carousel.min.css'));
    wp_enqueue_style('ionicons', get_theme_file_uri('/fonts/ionicons/css/ionicons.min.css'));
    wp_enqueue_style('fontawesome', get_theme_file_uri('/fonts/fontawesome/css/font-awesome.min.css'));
    wp_enqueue_style('flaticon', get_theme_file_uri('/fonts/flaticon/font/flaticon.css'));
    wp_enqueue_style('balita-style', get_theme_file_uri('/css/style.css'));
    wp_enqueue_style('balita-main', get_stylesheet_uri());


    wp_enqueue_script('popper', get_theme_file_uri('/js/popper.min.js'), array('jquery'),'4.0', true);
    wp_enqueue_script('bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array('jquery'),'4.0', true);
    wp_enqueue_script('owl.carousel', get_theme_file_uri('/js/owl.carousel.min.js'), array('jquery'),'4.0', true);
    wp_enqueue_script('waypoints', get_theme_file_uri('/js/jquery.waypoints.min.js'), array('jquery'),'4.0', true);
    wp_enqueue_script('stellar', get_theme_file_uri('/js/jquery.stellar.min.js'), array('jquery'),'4.0', true);
    wp_enqueue_script('main', get_theme_file_uri('/js/main.js'), array('jquery'),'4.0', true);
}
add_action('wp_enqueue_scripts','balita_assets');


function balita_commdent_default_change($arg){
    $arg['comment_notes_before'] = '';
    $arg['title_reply'] = __('Leave a comment','balita');
    return $arg;
}
add_filter('comment_form_defaults','balita_commdent_default_change');

function balita_comment_fields($fields){
    $comment_field = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter('comment_form_fields','balita_comment_fields');

function balita_menu_li_class( $classes , $item, $args ) {
    if ( 'top-menu' === $args->theme_location ) {
        $classes[] = 'nav-item';
        
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'balita_menu_li_class', 10, 3 );

function balita_menu_link_class( $atts, $item, $args ) {
    if ( 'top-menu' === $args->theme_location ){
        if($args->link_class) {
            $atts['class'] = $args->link_class;
        }
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'balita_menu_link_class', 1, 3 );

function balita_widgets(){
    register_sidebar( array(
        'name'          => __( 'Right Sidebar', 'balita' ),
        'id'            => 'right-sidebar',
        'description'   => __( 'Right Sidebar', 'balita' ),
        'before_widget' => '<div id="%1s" class="widget sidebar-box %2s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle heading">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Top Left', 'balita' ),
        'id'            => 'footer-top-left',
        'description'   => __( 'Footer Top Left Widgest.', 'balita' ),
        'before_widget' => '<div id="%1s" class="widget %2s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widgettitle">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Top Middle', 'balita' ),
        'id'            => 'footer-top-middle',
        'description'   => __( 'Footer Top Middle Widgets.', 'balita' ),
        'before_widget' => '<div id="%1s" class="widget %2s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widgettitle">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Top Right', 'balita' ),
        'id'            => 'footer-top-right',
        'description'   => __( 'Footer Top Right Widgets.', 'balita' ),
        'before_widget' => '<div id="%1s" class="widget %2s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widgettitle">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer ', 'balita' ),
        'id'            => 'footer',
        'description'   => __( 'Footer  Widgets.', 'balita' ),
        'before_widget' => '<div id="%1s" class="widget %2s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => __( 'Header Left ', 'balita' ),
        'id'            => 'header-left',
        'description'   => __( 'Header Left  Widgets.', 'balita' ),
        'before_widget' => '<div id="%1s" class="widget %2s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => __( 'Header Right ', 'balita' ),
        'id'            => 'header-right',
        'description'   => __( 'Header Right  Widgets.', 'balita' ),
        'before_widget' => '<div id="%1s" class="widget %2s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );
    
        

}
add_action('widgets_init','balita_widgets');

function baita_category_widgets_count($cat_post_count) {
    $cat_post_count = str_replace('(', '<span class="post_count pull-right"> (', $cat_post_count);
    $cat_post_count = str_replace(')', ' )</span>', $cat_post_count);
    return $cat_post_count;
}
add_filter('wp_list_categories','baita_category_widgets_count');