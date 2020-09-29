<?php 

//registrar nuevo menu
function agregar_menus(){
    register_nav_menus(
        array(
            'principal' => __('principal'),
            'footer' => __('footer')    
        )
        );
}

add_action('init','agregar_menus');


function mostrar_menu_principal(){
    wp_nav_menu(array(
        'principal' => 'principal',
    	'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
	'container'       => 'div',
	'container_class' => 'collapse navbar-collapse',
	'container_id'    => 'bs-example-navbar-collapse-1',
	'menu_class'      => 'navbar-nav mr-auto',
	'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
	'walker'          => new WP_Bootstrap_Navwalker(),
) );
    
}

function mostrar_menu_footer(){
    wp_nav_menu(array(
        'principal' => 'footer',
        'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
        'container'       => 'div',
        'container_class' => 'nav',
        'container_id'    => 'nav-footer',
        'menu_class'      => 'navbar',
        'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
        'walker'          => new WP_Bootstrap_Navwalker(),
    ) );
    
}

//funcion para controlar el excerpt
function excerpt_personalizado($length){
    return 20;
}
add_filter('excerpt_length','excerpt_personalizado');
//añadir soporte de thumbnails
add_theme_support('post-thumbnails');

function firma_guay(){
    return 'soy julio';
}
add_shortcode('firma', 'firma_guay');
//incluir clase walker para menus bootstrap
require_once get_template_directory()."/inc/wp_bootstrap_navwalker.php";

//agregar zonas de widgets
function agregar_widgets(){
    register_sidebar([
        'name' => 'widget-footer-1',
        'id' => 'wf1',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ]);
    register_sidebar([
        'name' => 'widget-footer-2',
        'id' => 'wf2',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ]);
    register_sidebar([
        'name' => 'widget-footer-3',
        'id' => 'wf3',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ]);
    register_sidebar([
        'name' => 'widget-lateral-derecho',
        'id' => 'ld',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ]);
}

add_action('widgets_init', 'agregar_widgets');

//estilos
//registrar estilos
wp_register_style(
    'bootstrap',
    get_theme_file_uri().'/inc/bootstrap.min.css'
);
wp_register_style(
    'dw_style',
    get_stylesheet_uri().'/style.css',
    ['bootstrap']
);
//encolar
function encolar_estilos(){
    wp_enqueue_style('dw_style');
}

//gancho
add_action('wp_enqueue_scripts', 'encolar_estilos');

