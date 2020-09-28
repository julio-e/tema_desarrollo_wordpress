<?php 

//registrar nuevo menu
function agregar_menu(){
    register_nav_menu('principal', __('principal'));
}

add_action('init','agregar_menu');


function mostrar_menu(){
    wp_nav_menu([
        'principal' => 'principal'
    ]);
    
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
add_shortcode('firma', 'firma_guay')

?>