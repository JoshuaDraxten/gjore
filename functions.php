<?php
add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles', PHP_INT_MAX);
function enqueue_child_theme_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

/**
 * Declare explicit theme support for LifterLMS course and lesson sidebars
 * @return   void
 */
function my_llms_theme_support(){
	add_theme_support( 'lifterlms-sidebars' );
}
add_action( 'after_setup_theme', 'my_llms_theme_support' );

// unset(MAKE_Gutenberg_Manager);
// unset(MAKE_Gutenberg_ManagerInterface);
add_action('post_updated', 'disable_make_builder');
function disable_make_builder($post_id){
  update_post_meta( $post_id, "_ttfmake_block_editor", true );
}

function add_block_query_string() {
    global $pagenow;
    global $wp;
    $current_url = home_url(add_query_arg(array(),$wp->request));
    # Check current admin page.
    if( $pagenow == 'post-new.php' && !isset( $_GET['block-editor'] ) ){
      wp_redirect( $pagenow . "?post_type=".$_GET['post_type']."&block-editor=true", 301 );
      exit;
    }
}
add_action( 'admin_init', 'add_block_query_string' );
