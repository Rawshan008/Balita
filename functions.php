<?php 


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