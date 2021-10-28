<?php

//ADICIONAR CLASSE AO EXCERPT QUE SERA O TEMPO EM MINUTOS DO FILME
function add_class_to_excerpt( $excerpt ){
    return '<div class="tempo-minutos">'.$excerpt.'</div>';
}
add_action('the_excerpt','add_class_to_excerpt');
//REMOVER CLASSE ATUAL DAS IMAGENS DO POST PARA ATUALIZAR NOVA CLASSE
function alterar_attr_wp($attr) {
    remove_filter('wp_get_attachment_image_attributes','alterar_attr_wp');
    $attr['class'] = 'post-thumbnail';
    return $attr;
  }
  add_filter('wp_get_attachment_image_attributes','alterar_attr_wp'); 

//SERIES TAXONOMIA
function registrar_taxonomia_series(){
    register_taxonomy(
       'categoria_series',
       'series',
       array(
           'label' => ('Categorias Séries'),
           'hierarchical' => true
       )

    );
}

add_action('init', 'registrar_taxonomia_series');

function play_registar_post_customizado_series(){
    register_post_type('series',
        array(
            'labels' => array('name' => 'Séries'),
            'public' => true,
            'menu_position' => 7,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt' ,'headway-seo'),
            'menu_icon' => 'dashicons-admin-site',
            
        )
    ); 
}
add_action('init', 'play_registar_post_customizado_series');
// CUSTOM POST FIELD
function vm_add_post_meta_boxes(){
    add_meta_box(
        "post_metadata_event_post",//div id
        "Tempo Filme",//heading
        "post_meta_box_event_post", //callback
        "series", //post type name
        "side", //local onde fica
        "low", //prioridade

    );
    add_meta_box(
        "post_metadata_event_post",//div id
        "Tempo Filme",//heading
        "post_meta_box_event_post", //callback
        "filmes", //post type name
        "side", //local onde fica
        "low", //prioridade

    );
    add_meta_box(
        "post_metadata_event_post",//div id
        "Tempo Filme",//heading
        "post_meta_box_event_post", //callback
        "documentarios", //post type name
        "side", //local onde fica
        "low", //prioridade

    );
    add_meta_box(
        "post_metadata_event_post",//div id
        "Tempo Filme",//heading
        "post_meta_box_event_post", //callback
        "destaques", //post type name
        "side", //local onde fica
        "low", //prioridade

    );
}
function vm_add_post_meta_boxes_url(){
    add_meta_box(
        "post_metadata_event_post_url",//div id
        "URL YouTube",//heading
        "post_meta_box_event_post_url", //callback
        "destaques", //post type name
        "side", //local onde fica
        "low", //prioridade

    );
    add_meta_box(
        "post_metadata_event_post_url",//div id
        "URL YouTube",//heading
        "post_meta_box_event_post_url", //callback
        "series", //post type name
        "side", //local onde fica
        "low", //prioridade
    );
    add_meta_box(
        "post_metadata_event_post_url",//div id
        "URL YouTube",//heading
        "post_meta_box_event_post_url", //callback
        "documentarios", //post type name
        "side", //local onde fica
        "low", //prioridade
    );
    add_meta_box(
        "post_metadata_event_post_url",//div id
        "URL YouTube",//heading
        "post_meta_box_event_post_url", //callback
        "filmes", //post type name
        "side", //local onde fica
        "low", //prioridade
    );
    
}
add_action('admin_init', 'vm_add_post_meta_boxes');
add_action('admin_init', 'vm_add_post_meta_boxes_url');

//salvar valor do campo
function vm_save_post_meta_boxes(){
    global $post;
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
        return;
    }
    update_post_meta($post->ID, "_event_date", sanitize_text_field($_POST["_event_date"]));

}
function vm_save_post_meta_boxes_url(){
    global $post;
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
        return;
    }
    update_post_meta($post->ID, "_event_date_url", sanitize_text_field($_POST["_event_date_url"]));

}
add_action("save_post", "vm_save_post_meta_boxes");
add_action("save_post", "vm_save_post_meta_boxes_url");

//gerar campo input
function post_meta_box_event_post(){
    global $post;
    $custom = get_post_custom($post->ID);
    $fielData = $custom["_event_date"][0];
    echo "<input type='text' name='_event_date' id='custom_post_series' value='$fielData' placeholder='Tempo em Min'>";
  
}
function post_meta_box_event_post_url(){
    global $post;
    $custom = get_post_custom($post->ID);
    $fielData = $custom["_event_date_url"][0];
    echo "<input type='text' name='_event_date_url' id='custom_post_series' value='$fielData' placeholder='URL EMBED'>";
  
}

//FILMES TAXONOMIA
function registrar_taxonomia_filmes(){
    register_taxonomy(
       'cat',
       'filmes',
       array(
           'label' => ('Categorias Filmes'),
           'hierarchical' => true
       )

    );
}

add_action('init', 'registrar_taxonomia_filmes');

function play_registar_post_customizado_filmes(){
    register_post_type('filmes',
        array(
            'labels' => array('name' => 'Filmes'),
            'public' => true,
            'menu_position' => 6,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt' ,'headway-seo'),
            'menu_icon' => 'dashicons-admin-site',
            
        )
    );
   
}
add_action('init', 'play_registar_post_customizado_filmes');

//DOCUMENTARIOS TAXONOMIA
function registrar_taxonomia_documentarios(){
    register_taxonomy(
       'categorias',
       'documentarios',
       array(
           'label' => ('Categorias Documentários'),
           'hierarchical' => true
       )

    );
}

add_action('init', 'registrar_taxonomia_documentarios');


function play_registar_post_customizado_documentarios(){
    register_post_type('documentarios',
        array(
            'labels' => array('name' => 'Documentarios'),
            'public' => true,
            'menu_position' => 5,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt' ,'headway-seo'),
            'menu_icon' => 'dashicons-admin-site',
            
        )
    );
   
}
add_action('init', 'play_registar_post_customizado_documentarios');

//destaques
function registrar_taxonomia_destaques(){
    register_taxonomy(
       'categoria_destaques',
       'destaques',
       array(
           'label' => ('Categorias destaques'),
           'hierarchical' => true
       )

    );
}

add_action('init', 'registrar_taxonomia_destaques');

function play_registar_post_customizado_destaques(){
    register_post_type('destaques',
        array(
            'labels' => array('name' => 'Destaques'),
            'public' => true,
            'menu_position' => 5,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt' ,'headway-seo'),
            'menu_icon' => 'dashicons-admin-site',
            
        )
    );
   
}
add_action('init', 'play_registar_post_customizado_destaques');


function play_add_recursos_tema(){
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}


add_action('after_setup_theme', 'play_add_recursos_tema');

function play_menu(){
    register_nav_menus(
        array(
            'top_menu' => 'Menu'
        )
    );
}
//Essa action hook abaixo peguei 
//do codex.wordpress - Peguei de lá =)

add_action('init', 'play_menu');