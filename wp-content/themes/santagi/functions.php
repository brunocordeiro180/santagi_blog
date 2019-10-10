<?php

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

    function add_estilos(){
        wp_enqueue_style ('bootstrap', get_template_directory_uri().'/css/bootstrap.css', 99);
        wp_enqueue_style ('animate', get_template_directory_uri().'/css/animate.css', array('bootstrap', 98));
        wp_enqueue_style ('owl-carousel', get_template_directory_uri().'/css/owl.carousel.min.css', array('bootstrap'), 97);
        wp_enqueue_style ('ionicons', get_template_directory_uri().'/fonts/ionicons/css/ionicons.min.css', array('bootstrap'), 96);
        wp_enqueue_style ('fas', get_template_directory_uri().'/fonts/fontawesome/css/font-awesome.min.css', array('bootstrap'), 95);
        wp_enqueue_style ('flaticon', get_template_directory_uri().'/fonts/flaticon/font/flaticon.css', array('bootstrap'), 94);
        wp_enqueue_style ('style', get_template_directory_uri().'/css/style.css', array('bootstrap'), 93);
    }

    function add_scripts(){
        wp_deregister_script( 'jquery-core' );
        wp_register_script( 'jquery-core', "https://code.jquery.com/jquery-3.2.1.min.js", array(), '3.2.1', true );
        wp_deregister_script( 'jquery-migrate' );
        wp_register_script( 'jquery-migrate', "https://code.jquery.com/jquery-migrate-3.0.0.min.js", array(), '3.0.0' );

        
        wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.2.1.min.js',  array(), '1.0.0', true);
        wp_enqueue_script( 'jquery-migrate', get_template_directory_uri() . '/js/jquery-migrate-3.0.0.js',  array('jquery'), '1.0.0', true);
        wp_enqueue_script( 'pooper', get_template_directory_uri() . '/js/popper.min.js',  array('jquery'), '1.0.0', true);
        wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js',  array('jquery'), '1.0.0', true);
        wp_enqueue_script( 'owl', get_template_directory_uri() . '/js/owl.carousel.min.js',  array('jquery'), '1.0.0', true);
        wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/js/jquery.waypoints.min.js',  array('jquery'), '1.0.0', true);
        wp_enqueue_script( 'jquery-stellar', get_template_directory_uri() . '/js/jquery.stellar.min.js',  array('jquery'), '1.0.0', true);
        wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js',  array('jquery'), '1.0.0', true);        
    }

    add_action('wp_enqueue_scripts', 'add_estilos');
    add_action('wp_enqueue_scripts', 'add_scripts');

    function count_post_visits() {
        if( is_single() ) {
            global $post;
            $views = get_post_meta( $post->ID, 'my_post_viewed', true );
            if( $views == '' ) {
                update_post_meta( $post->ID, 'my_post_viewed', '1' ); 
            } else {
                $views_no = intval( $views );
                update_post_meta( $post->ID, 'my_post_viewed', ++$views_no );
            }
        }
    }
    
    add_action( 'wp_head', 'count_post_visits' );

    add_filter('comment_reply_link', 'replace_reply_link_class');


    function replace_reply_link_class($class){
        $class = str_replace("class='comment-reply-link", "class='reply rounded", $class);
        return $class;
    }

    // add_filter( 'comments_clauses', 'wpse_78490_child_comments_only' );

    // function wpse_78490_child_comments_only( $clauses )
    // {
    //     $clauses['where'] .= ' AND comment_parent != 0';
    //     return $clauses;
    // }


?>

