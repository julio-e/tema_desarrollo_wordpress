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

?>